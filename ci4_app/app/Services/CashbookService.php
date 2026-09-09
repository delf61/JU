<?php

namespace App\Services;

use App\Models\PdModel;
use App\Models\ParamcatModel;

class CashbookService
{
    protected $pdModel;
    protected $paramcatModel;

    public function __construct()
    {
        $this->pdModel = new PdModel();
        $this->paramcatModel = new ParamcatModel();
    }

    /**
     * Get entries optionally filtered by year
     */
    public function getEntries($year = null)
    {
        if ($year) {
            return $this->pdModel->where('YEAR(a)', $year)->findAll();
        }
        return $this->pdModel->findAll();
    }

    /**
     * Safely get a single entry by composite key
     */
    public function getEntry($b, $year)
    {
        return $this->pdModel->where(['b' => $b, 'YEAR(a)' => $year])->first();
    }

    /**
     * Legacy VAT calculation (dph_sk logic)
     */
    public function calculateVat($hod_vyd, $dph_rate, $year)
    {
        $hod_vyd = (float)$hod_vyd;
        $dph_rate = (float)$dph_rate;

        // legacy formula: cond(rok < 2009 : (hod_vyd * (dph/100)) round 1, else : (hod_vyd * (dph/100)) round 2)
        if ($year < 2009) {
            return round($hod_vyd * ($dph_rate / 100)); // FAND 'round 1' often refers to near integer or 1 decimal, we use integer rounding for <2009 (SKK)
        } else {
            return round($hod_vyd * ($dph_rate / 100), 2); // EUR rounding
        }
    }

    /**
     * Calculate totals by aggregating a1-a4 and a7-a17
     * Note: Leasing and StraDoch integrations are unverified and thus stubbed/excluded.
     */
    public function calculateTotals($year)
    {
        $entries = $this->getEntries($year);

        $totals = [
            'income_cash' => 0.0,    // a1
            'expense_cash' => 0.0,   // a2
            'income_bank' => 0.0,    // a3
            'expense_bank' => 0.0,   // a4
            'breakdown' => [
                'a7' => 0.0,
                'a8' => 0.0,
                'a9' => 0.0,
                'a10' => 0.0,
                'a11' => 0.0,
                'a12' => 0.0,
                'a13' => 0.0,
                'a14' => 0.0,
                'a15' => 0.0,
                'a16' => 0.0,
                'a17' => 0.0
            ]
        ];

        foreach ($entries as $entry) {
            // Only non-deleted
            if (isset($entry['_fand_deleted']) && $entry['_fand_deleted']) {
                continue;
            }

            $totals['income_cash'] += (float)($entry['a1'] ?? 0);
            $totals['expense_cash'] += (float)($entry['a2'] ?? 0);
            $totals['income_bank'] += (float)($entry['a3'] ?? 0);
            $totals['expense_bank'] += (float)($entry['a4'] ?? 0);

            for ($i = 7; $i <= 17; $i++) {
                $key = "a{$i}";
                $totals['breakdown'][$key] += (float)($entry[$key] ?? 0);
            }
        }

        return $totals;
    }

    public function calculateStatistics($year)
    {
        $entries = $this->getEntries($year);

        $months = array_fill(1, 12, ['income' => 0, 'expense' => 0]);

        foreach ($entries as $entry) {
            if (isset($entry['_fand_deleted']) && $entry['_fand_deleted']) continue;

            $month = (int)date('n', strtotime($entry['a']));
            if ($month >= 1 && $month <= 12) {
                $months[$month]['income'] += (float)($entry['a1'] ?? 0) + (float)($entry['a3'] ?? 0);
                $months[$month]['expense'] += (float)($entry['a2'] ?? 0) + (float)($entry['a4'] ?? 0);
            }
        }

        return $months;
    }

        public function calculateDetailedSummary($year, $upToB = null)
    {
        $entries = $this->getEntries($year);
        $db = \Config\Database::connect();

        $summary = [
            'P1' => 0, 'P2' => 0,
            'a1_priebezen' => 0, 'a1_ine' => 0, 'a1_celkove' => 0,
            'a2_priebezen' => 0, 'a2_ine' => 0, 'a2_celkove' => 0,
            'a3_priebezen' => 0, 'a3_ine' => 0, 'a3_celkove' => 0,
            'a4_priebezen' => 0, 'a4_ine' => 0, 'a4_celkove' => 0,
            'hot_prijem' => 0, 'hot_vydaj' => 0, 'ucet_prijem' => 0, 'ucet_vydaj' => 0,

            'phm_sc' => 0, 'os_ucet' => 0, 'dan_z_pr' => 0, 'dph' => 0, 'nak_hanim' => 0,
            'zdan_prijmy' => 0, 'dochodok' => 0, 'dopdochspor' => 0,
            'ine_vydaje' => 0, 'vseob' => 0, 'banka' => 0, 'rezia' => 0,
            'leasing' => 0, 'poistne' => 0, 'tovar' => 0, 'odpisy' => 0, 'd_han_m' => 0, 'vyk_prac' => 0,

            'akt_pol_p' => 0, 'akt_pol_i' => 0, 'akt_pol_c' => 0,
            'akt_pol_hotovost_ucet' => ''
        ];

        $pocstav_builder = $db->table('pocstav');
        $pocstav_row = $pocstav_builder->where('rok', $year)->get()->getRowArray();
        if ($pocstav_row) {
            $summary['P1'] = (float)$pocstav_row['ph'];
            $summary['P2'] = (float)$pocstav_row['pu'];
        }

        foreach ($entries as $entry) {
            if (isset($entry['_fand_deleted']) && $entry['_fand_deleted']) continue;

            $r = !empty($entry['r']);
            $p = !empty($entry['p']);

            $a1 = (float)($entry['a1'] ?? 0);
            $a2 = (float)($entry['a2'] ?? 0);
            $a3 = (float)($entry['a3'] ?? 0);
            $a4 = (float)($entry['a4'] ?? 0);
            $vydaj = $entry['vydaj'] ?? '';

            if ($p) {
                $summary['a1_priebezen'] += $a1; $summary['a2_priebezen'] += $a2;
                $summary['a3_priebezen'] += $a3; $summary['a4_priebezen'] += $a4;
            } elseif ($r) {
                $summary['a1_celkove'] += $a1; $summary['a2_celkove'] += $a2;
                $summary['a3_celkove'] += $a3; $summary['a4_celkove'] += $a4;
                $summary['hot_prijem'] += $a1; $summary['hot_vydaj'] += $a2;
                $summary['ucet_prijem'] += $a3; $summary['ucet_vydaj'] += $a4;
            } else {
                $summary['a1_ine'] += $a1; $summary['a2_ine'] += $a2;
                $summary['a3_ine'] += $a3; $summary['a4_ine'] += $a4;
            }

            $a13 = $a1 + $a3;
            $a24 = $a2 + $a4;

            if ($vydaj === 'h') $summary['phm_sc'] += $a24;
            elseif ($vydaj === '3') $summary['os_ucet'] += $a24;
            elseif ($vydaj === '8') $summary['dan_z_pr'] += $a24;
            elseif ($vydaj === 'd') $summary['dph'] += $a24;
            elseif ($vydaj === '6') $summary['nak_hanim'] += $a24;
            elseif ($vydaj === '1' || $vydaj === '2' || $vydaj === '7') $summary['rezia'] += $a24;
            elseif ($vydaj === 'u') $summary['banka'] += $a24;
            elseif ($vydaj === '4') $summary['poistne'] += $a24;
            elseif ($vydaj === 't') $summary['tovar'] += $a24;
            elseif ($vydaj === '5') $summary['d_han_m'] += $a24;
            elseif ($vydaj === 'a') $summary['vyk_prac'] += $a24;

            if (empty($vydaj) && $a24 > 0) $summary['ine_vydaje'] += $a24;

            if ($a13 > 0) {
                if ($vydaj === 'D') $summary['dochodok'] += $a13;
                else $summary['zdan_prijmy'] += $a13;
            }

            if ($upToB && $entry['b'] === $upToB) {
                $summary['akt_pol_p'] = $p ? ($a1 + $a2 + $a3 + $a4) : 0;
                $summary['akt_pol_i'] = (!$p && !$r) ? ($a1 + $a2 + $a3 + $a4) : 0;
                $summary['akt_pol_c'] = $r ? ($a1 + $a2 + $a3 + $a4) : 0;
                $summary['akt_pol_hotovost_ucet'] = ($a1 > 0 || $a2 > 0) ? 'Hotovosť' : (($a3 > 0 || $a4 > 0) ? 'Účet' : '');
            }
        }

        $summary['vseob'] = $summary['rezia'];
        $summary['odpoc_vyd'] = $summary['rezia'] + $summary['leasing'] + $summary['poistne'] + $summary['tovar'] + $summary['odpisy'] + $summary['d_han_m'] + $summary['vyk_prac'];
        $summary['zaklad_pre_vyp'] = $summary['zdan_prijmy'] - $summary['odpoc_vyd'];

        return $summary;
    }
}
