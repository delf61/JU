<?php

namespace App\Services;

class PropertyManagementService
{
    /**
     * Calculates A_sum for pDomacnost
     */
    public function calculateASum(array $bytRecord): float
    {
        $fields = ['a1', 'a2a', 'a2b', 'a2c', 'a2d', 'a2e', 'a2f', 'a2g', 'a2h', 'a3', 'a4', 'a5'];
        $sum = 0.0;
        foreach ($fields as $field) {
            $sum += (float) ($bytRecord[$field] ?? 0.0);
        }
        return $sum;
    }

    /**
     * Calculates B_sum for pDomacnost
     */
    public function calculateBSum(array $bytRecord): float
    {
        $fields = ['b1', 'b2', 'b3', 'b4', 'b5', 'b6', 'b7', 'b8', 'b9', 'b10'];
        $sum = 0.0;
        foreach ($fields as $field) {
            $sum += (float) ($bytRecord[$field] ?? 0.0);
        }
        return $sum;
    }

    /**
     * Calculates electricity consumption and total price for pVyuctSSE
     */
    public function calculateVyuctSSE(array $currentRecord, array $previousRecord = null): array
    {
        $el_v = (int) ($currentRecord['el_v'] ?? 0);


        $el_na_konci_v = 0;



        if ($previousRecord !== null) {
            $el_na_konci_v = (int) ($previousRecord['el_v'] ?? 0);
        }

        $spotreba_v = max(0, $el_v - $el_na_konci_v);

        $sk_v = (float) ($currentRecord['sk_v'] ?? 0.0);
        $dph = (float) ($currentRecord['dph'] ?? 19.0);

        // spotreba_v * sk_v * (1+(dph/100))
        $sk_spolu_v = $spotreba_v * $sk_v * (1 + ($dph / 100));

        // Pausal rules from PRINTER.TXT
        $rok = (int) ($currentRecord['rok'] ?? date('Y', strtotime($currentRecord['mr'] ?? '')));
        if (!$rok && isset($currentRecord['mr'])) {
            $rok = (int) date('Y', strtotime($currentRecord['mr']));
        }

        $pausal = 0.0;
        if ($rok <= 2006 && $rok >= 2005) {
            $pausal = 510.0;
        } elseif ($rok == 2007) {
            $pausal = 178.5;
        } elseif ($rok == 2008) {
            $pausal = 375.0;
        } elseif ($rok == 2010) {
            $pausal = 332.6;
        } elseif ($rok == 2011 || $rok == 2012) {
            $pausal = 339.52;
        } elseif ($rok == 2013) {
            $pausal = 303.67;
        } elseif ($rok == 2014) {
            $pausal = 314.52;
        } elseif ($rok == 2015) {
            $pausal = 294.93;
        } elseif ($rok < 2007 && $rok > 0) {
             $pausal = 510.0;
        }

        // Apply Real48 rounding tolerance to the total if applicable, typically we just return the exact math
        return [
            'spotreba_v' => (float)$spotreba_v,
            'sk_spolu_v' => round($sk_spolu_v, 2),
            'pausal' => $pausal
        ];
    }

    /**
     * Calculates water consumption and total price for pVyucH2OSasa
     */
    public function calculateVyucH2OSasa(array $currentRecord, array $previousRecord = null): array
    {
        $h2o_v = (int) ($currentRecord['h2o_v'] ?? 0);
        $h2o_na_konci_v = 0;

        if ($previousRecord !== null) {
            $h2o_na_konci_v = (int) ($previousRecord['h2o_v'] ?? 0);
        }

        // Logic from PRINTER.TXT: h2o_na_konci_v := cond(h2o_v > h2osa_K.h2o_v : h2osa_K.h2o_v, else : 0)
        if ($h2o_v <= $h2o_na_konci_v) {
            $h2o_na_konci_v = 0; // Meter replacement scenario
        }

        $spotreba = max(0, $h2o_v - $h2o_na_konci_v);

        $sk_v = (float) ($currentRecord['sk_v'] ?? 0.0);
        $dph = (float) ($currentRecord['dph'] ?? 20.0);

        // spotreba * sk_v * (1+(dph/100))
        $sk_spolu_v = $spotreba * $sk_v * (1 + ($dph / 100));

        return [
            'spotreba' => (float)$spotreba,
            'sk_spolu_v' => round($sk_spolu_v, 2)
        ];
    }
}
