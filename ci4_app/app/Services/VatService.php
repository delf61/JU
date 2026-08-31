<?php

namespace App\Services;

use App\Models\PdModel;
use App\Models\KpModel;
use App\Models\KzModel;
use App\Models\SadzbdphModel;
use App\Models\DphModel;

class VatService
{
    protected $pdModel;
    protected $kpModel;
    protected $kzModel;
    protected $sadzbdphModel;
    protected $dphModel;

    public function __construct()
    {
        $this->pdModel = new PdModel();
        $this->kpModel = new KpModel();
        $this->kzModel = new KzModel();
        $this->sadzbdphModel = new SadzbdphModel();
        $this->dphModel = new DphModel();
    }

    /**
     * Look up VAT rates for a given date.
     * Separated for easier testing.
     * @param string $date
     * @param array $ratesList array of rate records from SADZBDPH
     * @return array|null ['lower' => float, 'upper' => float]
     */
    public function determineRatesForDate(string $date, array $ratesList): ?array
    {
        foreach ($ratesList as $rate) {
            // Legacy inclusive date boundaries
            if ($date >= $rate['od'] && $date <= $rate['do']) {
                return [
                    'lower' => (float)$rate['dph_dol'],
                    'upper' => (float)$rate['dph_hor'],
                ];
            }
        }
        return null;
    }

    /**
     * Fetch and determine VAT rates from the database.
     */
    public function getRatesForDate(string $date): ?array
    {
        $allRates = $this->sadzbdphModel->findAll();
        return $this->determineRatesForDate($date, $allRates);
    }

    /**
     * Calculate VAT return for a specific period by fetching data from MariaDB
     * and passing it to the pure accumulation method.
     */
    public function calculateVatForPeriod(string $dateFrom, string $dateTo, string $year, string $currencyMode = 'EUR'): array
    {
        // 1. Fetch Rates
        $rates = $this->getRatesForDate($dateTo);
        if (!$rates) {
            throw new \Exception("No active VAT rates found for date: $dateTo");
        }

        // 2. Fetch KP (Outgoing)
        $kpRecords = $this->kpModel
            ->where('zp >=', $dateFrom)
            ->where('zp <=', $dateTo)
            ->where('dph !=', 0)
            ->findAll();

        // 3. Fetch KZ (Incoming)
        $kzQuery = $this->kzModel
            ->where('zp >=', $dateFrom)
            ->where('zp <=', $dateTo);

        // Optimization: The U_H='U' legacy rule can be filtered at DB level for pre-April 2003
        if ($dateTo < '2003-04-01') {
            $kzQuery = $kzQuery->where('u_h', 'U');
        }
        $kzRecords = $kzQuery->findAll();

        // 4. Fetch PD (Cashbook)
        $pdRecords = $this->pdModel
            ->where('a >=', $dateFrom)
            ->where('a <=', $dateTo)
            ->where('dph >', 0)
            ->where('vydaj !=', 't')
            ->findAll();

        // 5. Calculate
        return $this->accumulatePeriod($dateFrom, $dateTo, $rates, $pdRecords, $kpRecords, $kzRecords, $currencyMode);
    }

    /**
     * Process pure accumulation of records for a given period.
     * Separated from DB calls to allow strict deterministic unit testing.
     * @param string $dateFrom
     * @param string $dateTo
     * @param array $rates array with 'lower' and 'upper' keys
     * @param array $pdRecords array of Cashbook records
     * @param array $kpRecords array of Outgoing Invoice records
     * @param array $kzRecords array of Incoming Invoice records
     * @param string $currencyMode e.g., 'SKK' or 'EUR' to determine rounding
     * @return array The accumulated 67-byte DPH schema structure
     */
    public function accumulatePeriod(
        string $dateFrom,
        string $dateTo,
        array $rates,
        array $pdRecords,
        array $kpRecords,
        array $kzRecords,
        string $currencyMode
    ): array {
        $result = [
            'od' => $dateFrom,
            'do' => $dateTo,
            'dph1' => $rates['lower'],
            'dph2' => $rates['upper'],
            'sum1vstup' => 0.0,
            'dph1vstup' => 0.0,
            'sum2vstup' => 0.0,
            'dph2vstup' => 0.0,
            'sum1vystup' => 0.0,
            'dph1vystup' => 0.0,
            'sum2vystup' => 0.0,
            'dph2vystup' => 0.0,
            'dphpar4' => 0,
            'sum_par_69' => 0.0,
            'dph_par_69' => 0.0,
            'odpocet_pa' => 0.0,
            'r13' => 0
        ];

        // Based on DPH_DEEP_ANALYSIS.md: "Rate Selection: dph field (<15 is lower rate, >=15 is upper rate)."
        $rateThreshold = 15;

        // 1. Outgoing Invoices (KP) -> Vystup
        // DPH_DEEP_ANALYSIS: Base is 'z'. Tax is calculated or from 'dph_sk'. We calculate.
        foreach ($kpRecords as $kp) {
            $base = (float)$kp['z'];
            $rate = (float)$kp['dph'];
            $tax = $this->roundVat($base * ($rate / 100), $currencyMode);

            if ($rate < $rateThreshold) {
                $result['sum1vystup'] += $base;
                $result['dph1vystup'] += $tax;
            } else {
                $result['sum2vystup'] += $base;
                $result['dph2vystup'] += $tax;
            }
        }

        // 2. Incoming Invoices (KZ) -> Vstup
        // DPH_DEEP_ANALYSIS: "distinction between y and z"
        // Lower rate logic uses 'y' and 'dph_1'. Upper uses 'z' and 'dph'.
        foreach ($kzRecords as $kz) {
            // Apply 1.4.2003 rule: Pre-2003-04-01 requires U_H = 'U'
            if ($dateTo < '2003-04-01' && ($kz['u_h'] ?? '') !== 'U') {
                continue;
            }

            // Apply 2025 rule: >= 2025-09-01 -> §69 Reverse Charge logic (rDPH_vstKZ69)
            // It routes specific values into sum_par_69
            $isReverseCharge2025 = ($dateFrom >= '2025-09-01');

            // Lower rate (y)
            if ((float)$kz['dph_1'] > 0) {
                $base1 = (float)$kz['y'];
                $rate1 = (float)$kz['dph_1'];
                $tax1 = $this->roundVat($base1 * ($rate1 / 100), $currencyMode);

                if ($isReverseCharge2025) {
                    $result['sum_par_69'] += $base1;
                    $result['dph_par_69'] += $tax1;
                } else {
                    if ($rate1 < $rateThreshold) {
                        $result['sum1vstup'] += $base1;
                        $result['dph1vstup'] += $tax1;
                    } else {
                        $result['sum2vstup'] += $base1;
                        $result['dph2vstup'] += $tax1;
                    }
                }
            }

            // Upper rate (z)
            if ((float)$kz['dph'] > 0) {
                $base2 = (float)$kz['z'];
                $rate2 = (float)$kz['dph'];
                $tax2 = $this->roundVat($base2 * ($rate2 / 100), $currencyMode);

                if ($isReverseCharge2025) {
                    $result['sum_par_69'] += $base2;
                    $result['dph_par_69'] += $tax2;
                } else {
                    if ($rate2 < $rateThreshold) {
                        $result['sum1vstup'] += $base2;
                        $result['dph1vstup'] += $tax2;
                    } else {
                        $result['sum2vstup'] += $base2;
                        $result['dph2vstup'] += $tax2;
                    }
                }
            }
        }

        // 3. Cashbook (PD) -> Vstup
        // DPH_DEEP_ANALYSIS: Base is 'a6'. Exclude vydaj='t' and specific '50' prefixes on 'b'.
        foreach ($pdRecords as $pd) {
            if (isset($pd['_fand_deleted']) && $pd['_fand_deleted']) {
                continue;
            }

            $vydaj = $pd['vydaj'] ?? '';
            if ($vydaj === 't') {
                continue;
            }

            $a2 = (float)($pd['a2'] ?? 0);
            $a4 = (float)($pd['a4'] ?? 0);
            $b = $pd['b'] ?? '';

            if ($a2 != 0 || ($a4 != 0 && substr($b, 0, 2) !== '50')) {
                // Determine base: schema might lack a6, fallback to sdph or calculated.
                // However, the rule says "correctly implement the documented a6 base handling".
                // We prioritize 'a6'.
                $base = (float)($pd['a6'] ?? $pd['sdph'] ?? ($a2 + $a4));
                $rate = (float)$pd['dph'];
                $tax = $this->roundVat($base * ($rate / 100), $currencyMode);

                if ($rate < $rateThreshold) {
                    $result['sum1vstup'] += $base;
                    $result['dph1vstup'] += $tax;
                } else {
                    $result['sum2vstup'] += $base;
                    $result['dph2vstup'] += $tax;
                }
            }
        }

        return $result;
    }

    /**
     * Helper to perform exact legacy FAND rounding.
     * @param float $tax
     * @param string $currencyMode 'SKK' or 'EUR'
     * @return float
     */
    public function roundVat(float $tax, string $currencyMode): float
    {
        if ($currencyMode === 'SKK') {
            // Legacy FAND "round 1" or integer rounding for SKK pre-2009.
            return round($tax);
        } else {
            // EUR rounding is to 2 decimals.
            return round($tax, 2);
        }
    }
}
