<?php

namespace App\Services;

use App\Models\ScModel;
use App\Models\EviAutoModel;
use App\Models\TrasyModel;
use App\Models\AutoModel;
use CodeIgniter\Database\Exceptions\DataException;

class TripService
{
    protected ScModel $scModel;
    protected EviAutoModel $eviAutoModel;
    protected TrasyModel $trasyModel;
    protected AutoModel $autoModel;

    public function __construct()
    {
        $this->scModel = new ScModel();
        $this->eviAutoModel = new EviAutoModel();
        $this->trasyModel = new TrasyModel();
        $this->autoModel = new AutoModel();
    }

    /**
     * Replicates the calculation of 'cestsm' and 'spolu' for the SC table based on FAND rules.
     */
    public function calculateScTotals(array $scRow, array $autoRow = []): array
    {
        $koniec = $scRow['koniec'] ?? '';
        $benkm = (float)($scRow['benkm'] ?? 0);
        $pockm = (float)($scRow['pockm'] ?? 0);
        $konst = (float)($scRow['konst'] ?? 0);
        $ceBenz = (float)($scRow['cebenz'] ?? 0);
        $ceLpg = (float)($scRow['celpg'] ?? 0);
        $ces = (float)($scRow['ces'] ?? 0);
        $uby = (float)($scRow['uby'] ?? 0);

        $benPocetMiest = (float)($scRow['benpocetmi'] ?? 0);
        $pocetMiest = (float)($scRow['pocetmiest'] ?? 0);

        $isFir = !empty($autoRow['fir']);
        $autoPS = (float)($autoRow['ps'] ?? $this->calculateAutoPS($autoRow));
        $autoLPG = (float)($autoRow['lpg'] ?? 0);

        // Date comparison rule from FAND
        $isPre2004 = false;
        if (!empty($koniec)) {
            $dateKoniec = strtotime($koniec);
            $dateThreshold = strtotime('2004-01-01');
            if ($dateKoniec !== false && $dateKoniec < $dateThreshold) {
                $isPre2004 = true;
            }
        }

        $cestSM = 0.0;

        if ($ces > 0) {
            $cestSM = $ces;
        } else {
            if ($isPre2004 && !$isFir) {
                $calc = ($benkm * ($konst + ($ceBenz * $autoPS / 100.0))) +
                        ($pockm * ($konst + ($ceLpg * $autoLPG / 100.0)));
                $cestSM = round($calc, 2);
            } elseif ($isPre2004 && $isFir) {
                $calc = ($benkm * ($ceBenz * $autoPS / 100.0)) +
                        ($pockm * ($ceLpg * $autoLPG / 100.0));
                $cestSM = round($calc, 2);
            } else {
                // >= 2004 logic
                $benMesto = 10.0 * $benPocetMiest;
                $benMimo = $benkm - $benMesto;
                $mesto = 10.0 * $pocetMiest;
                $mimo = $pockm - $mesto;

                $calc = ($benMesto * ($ceBenz * ($autoPS * 1.4) / 100.0)) +
                        ($benMimo * ($ceBenz * $autoPS / 100.0)) +
                        ($mesto * ($ceLpg * ($autoLPG * 1.4) / 100.0)) +
                        ($mimo * ($ceLpg * $autoLPG / 100.0));
                $cestSM = round($calc, 2);
            }
        }

        $spolu = $cestSM + $uby;

        return [
            'sumkm'  => round($pockm + $benkm, 2),
            'cestsm' => $cestSM,
            'spolu'  => round($spolu, 2)
        ];
    }

    /**
     * Replicates the calculation of 'poc_km', 'mesto', 'mimo' and 'spolu' for the evi_auto table based on FAND rules.
     */
    public function calculateEviAutoTotals(array $eviRow, array $autoRow = []): array
    {
        $datum = $eviRow['datum'] ?? '';
        $zacKm = (float)($eviRow['zac_km'] ?? 0);
        $konKm = (float)($eviRow['kon_km'] ?? 0);

        $mesto2KmPocet = (float)($eviRow['mesto_2_km'] ?? 0);
        $mesto5KmPocet = (float)($eviRow['mesto_5_km'] ?? 0);
        $mesto10KmPocet = (float)($eviRow['mesto_10_k'] ?? 0);

        $konst = (float)($eviRow['konst'] ?? 0);
        $cenaPhm = (float)($eviRow['cena_phm'] ?? 0);
        $dph = (float)($eviRow['dph'] ?? 0);

        $pocKm = $konKm - $zacKm;
        if ($pocKm < 0) {
            $pocKm = 0.0;
        }

        // Determine if Pre-2004 and Pre-2005 rules
        $isPre2004 = false;
        $isPre2005 = false;
        if (!empty($datum)) {
            $dateDatum = strtotime($datum);
            if ($dateDatum !== false && $dateDatum < strtotime('2004-01-01')) {
                $isPre2004 = true;
            }
            if ($dateDatum !== false && $dateDatum < strtotime('2005-01-01')) {
                $isPre2005 = true;
            }
        }

        // Mesto calculation
        $mesto = 0.0;
        if ($isPre2005) {
            if ($pocKm > 200) {
                $mesto = 20.0;
            } elseif ($pocKm > 100) {
                $mesto = 15.0;
            } else {
                $mesto = 10.0;
            }
        } else {
            $mesto = ($mesto2KmPocet * 2.0) + ($mesto5KmPocet * 5.0) + ($mesto10KmPocet * 10.0);
        }

        $mimo = $pocKm - $mesto;

        // Base values
        $phm = ($cenaPhm / 100.0) * (100.0 - $dph);

        $isFir = !empty($autoRow['fir']);
        $isLpg = !empty($autoRow['lpg']);
        // The FAND logic states PS := cond ( LPG : Auto.LPG, else : Auto.PS )
        // Let's rely on standard logic, and if it's an LPG trip (LPG boolean true in EviAuto), override.
        // In FAND, EviAuto has LPG as boolean (or B). Auto has LPG as F,2.1 value.
        $isTripLpg = !empty($eviRow['lpg']);

        // Dynamic PS and MS
        $autoPS = (float)($autoRow['ps'] ?? $this->calculateAutoPS($autoRow));
        if ($isTripLpg) {
             $autoPS = (float)($autoRow['lpg'] ?? 0);
        }

        $autoMS = (float)($autoRow['ms'] ?? $this->calculateAutoMS($autoRow));
        if ($isTripLpg) {
            $koef = (float)($autoRow['koef'] ?? 0);
            $autoMS = $autoPS * $koef; // Auto.LPGmesto
        }

        // Spolu calculation
        $spolu = 0.0;
        if ($isPre2004 && !$isFir) {
            $calc = $pocKm * ($konst + ($phm * $autoPS / 100.0));
            $spolu = round($calc, 2);
        } elseif ($isPre2004 && $isFir) {
            $calc = $pocKm * ($phm * $autoPS / 100.0);
            $spolu = round($calc, 2);
        } else {
            $calc = ($mesto * ($phm * $autoMS / 100.0)) + ($mimo * ($phm * $autoPS / 100.0));
            $spolu = round($calc, 2);
        }

        return [
            'poc_km' => $pocKm,
            'mesto'  => $mesto,
            'mimo'   => $mimo,
            'phm'    => $phm,
            'spolu'  => $spolu
        ];
    }

    /**
     * Derives PS if not directly available (FAND dynamic calculation).
     */
    public function calculateAutoPS(array $autoRow): float
    {
        $esmi = (float)($autoRow['esmi'] ?? 0);
        $esko = (float)($autoRow['esko'] ?? 0);
        $eh90 = (float)($autoRow['eh90'] ?? 0);
        $eh120 = (float)($autoRow['eh120'] ?? 0);
        $stn = (float)($autoRow['stn'] ?? 0);

        if ($esmi != 0) {
            return $esko;
        } elseif ($eh90 != 0 && $eh120 != 0) {
            return ($eh90 + $eh120) / 2.0;
        } else {
            return $stn;
        }
    }

    /**
     * Derives MS if not directly available (FAND dynamic calculation).
     */
    public function calculateAutoMS(array $autoRow): float
    {
        $esme = (float)($autoRow['esme'] ?? 0);
        $ehme = (float)($autoRow['ehme'] ?? 0);
        $stn = (float)($autoRow['stn'] ?? 0);
        $koef = (float)($autoRow['koef'] ?? 0);
        $stnMesto = $stn * $koef;

        if ($esme != 0) {
            return $esme;
        } elseif ($ehme != 0) {
            return $ehme;
        } else {
            return $stnMesto;
        }
    }
}
