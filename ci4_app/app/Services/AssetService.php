<?php

namespace App\Services;

class AssetService
{
    /**
     * Calculates dynamic fields for an IKZP (Tangible/Intangible Asset) record.
     * Reconstructs logic from PRINTER.TXT (pHm_a_Nehm).
     *
     * @param array $record The raw database record from `ikzp`
     * @param int   $currentYear The current processing year (e.g., from paramcat)
     * @return array The record with calculated fields appended
     */
    public function calculateIkzp(array $record, int $currentYear): array
    {
        $h = (float)($record['h'] ?? 0);
        $hz = (float)($record['hz'] ?? 0);
        $dph = (float)($record['dph'] ?? 0);
        $oprava = (float)($record['oprava'] ?? 0);
        $ro = (int)($record['ro'] ?? 0);
        $so = trim($record['so'] ?? '');
        $os = trim($record['os'] ?? '');
        $n = mb_strtoupper(trim($record['n'] ?? ''), 'UTF-8');
        $sv = trim($record['sv'] ?? '');

        // #C obstar_Bez_DPH := ((h * 100) / (100 + dph)) round 1
        $obstar_Bez_DPH = 0.0;
        if ((100 + $dph) != 0) {
            $obstar_Bez_DPH = round(($h * 100) / (100 + $dph), 1);
        }

        // DPH_Sk := cond ( h>0 : h - obstar_Bez_DPH, else : 0)
        $dph_sk = ($h > 0) ? ($h - $obstar_Bez_DPH) : 0.0;

        // o := cond(ro>0 : hz + oprava, else : 0)
        $o = ($ro > 0) ? ($hz + $oprava) : 0.0;

        // o_s:= hz + oprava
        $o_s = $hz + $oprava;

        // oo := cond(h>0 : cond(paramcat.rok<2002 : hz, else : obstar_Bez_DPH ) + oprava, else : hz)
        $oo = $hz;
        if ($h > 0) {
            $base_oo = ($currentYear < 2002) ? $hz : $obstar_Bez_DPH;
            $oo = $base_oo + $oprava;
        }

        // voO depreciation calculation
        $voO = 0.0;

        $isAuto = (mb_strpos($n, 'AUTOMOBIL') !== false);

        if ($so === 'R') {
            if ($isAuto && $currentYear > 2003) {
                if ($os === '0') {
                    $voO = $oo / 2;
                } else {
                    $voO = $oo / 4;
                }
            } elseif ($ro == 1) {
                if ($os === '1') $voO = 0.01 * 14.2 * $oo;
                elseif ($os === '2') $voO = 0.01 * 6.2 * $oo;
                elseif ($os === '3') $voO = 0.01 * 3.4 * $oo;
                elseif ($os === '4') $voO = 0.01 * 1.4 * $oo;
                elseif ($os === '5') $voO = 0.01 * 1.0 * $oo;
            } elseif ($ro > 1) {
                if ($os === '1') $voO = 0.01 * 28.6 * $oo;
                elseif ($os === '2') $voO = 0.01 * 13.4 * $oo;
                elseif ($os === '3') $voO = 0.01 * 6.9 * $oo;
                elseif ($os === '4') $voO = 0.01 * 3.4 * $oo;
            }
        } elseif ($so === 'Z') {
            if ($ro == 1) {
                if ($os === '1') $voO = $oo / 4;
                elseif ($os === '2') $voO = $oo / 8;
                elseif ($os === '3') $voO = $o / 15; // Note: FAND source says o / 15
                elseif ($os === '4') $voO = $oo / 30;
                elseif ($os === '5') $voO = $oo / 50;
            } elseif ($ro > 1) {
                if ($os === '1') $voO = 2 * $hz / (5 - ($ro - 1));
                elseif ($os === '2') $voO = 2 * $hz / (9 - ($ro - 1));
                elseif ($os === '3') $voO = 2 * $hz / (16 - ($ro - 1));
                elseif ($os === '4') $voO = 2 * $hz / (31 - ($ro - 1));
                elseif ($os === '5') $voO = 2 * $hz / (51 - ($ro - 1));
            }
        }

        // VO := cond(os = '0' : val(sv), voO >= o : o, else : INT(VOO) + COND( FRAC(VOO)>0 : 1 ))
        $vo = 0.0;
        if ($os === '0') {
            $vo = (float)$sv;
        } elseif ($voO >= $o && $o > 0) { // FAND formula assumes o > 0 if it caps it, but let's stick closely. Actually if ro=0, o=0, voO=0, 0>=0 -> vo=0
            $vo = $o;
        } else if ($voO > 0) {
            // INT(VOO) + COND(FRAC(VOO)>0 : 1) -> Ceil
            $vo = ceil($voO);
        }

        $vooO = $oo;

        // z := cond(ro>0 : o - vo, else : hz)
        $z = ($ro > 0) ? ($o - $vo) : $hz;

        // zo := oo - vooo
        $zo = $oo - $vooO;

        $record['obstar_Bez_DPH'] = $obstar_Bez_DPH;
        $record['dph_sk'] = $dph_sk;
        $record['o'] = $o;
        $record['o_s'] = $o_s;
        $record['oo'] = $oo;
        $record['voO'] = $voO;
        $record['vo'] = $vo;
        $record['z'] = $z;
        $record['zo'] = $zo;

        return $record;
    }

    /**
     * Calculates dynamic fields for an IKDKP (Minor Asset) record.
     * Reconstructs logic from PRINTER.TXT (pNaklady).
     *
     * @param array $record The raw database record from `ikdkp`
     * @return array The record with calculated fields appended
     */
    public function calculateIkdkp(array $record): array
    {
        $jc = (float)($record['jc'] ?? 0);
        $mn = (float)($record['mn'] ?? 0);
        $dph = (float)($record['dph'] ?? 0);

        // #C jc_mn := mn * jc
        $jc_mn = round($mn * $jc, 2);

        // Bez_DPH := ((jc * 100) / (100 + dph)) round 1
        $bez_dph = 0.0;
        if ((100 + $dph) != 0) {
            $bez_dph = round(($jc * 100) / (100 + $dph), 1);
        }

        // Bez_DPH_mn := Bez_DPH * mn
        $bez_dph_mn = round($bez_dph * $mn, 2);

        // DPH_Sk := jc - Bez_DPH
        $dph_sk = round($jc - $bez_dph, 2);

        // DPH_Sk_mn := DPH_Sk * mn
        $dph_sk_mn = round($dph_sk * $mn, 2);

        $record['jc_mn'] = $jc_mn;
        $record['bez_dph'] = $bez_dph;
        $record['bez_dph_mn'] = $bez_dph_mn;
        $record['dph_sk'] = $dph_sk;
        $record['dph_sk_mn'] = $dph_sk_mn;

        return $record;
    }
}
