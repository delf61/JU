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
            return $this->pdModel->where('_year', $year)->findAll();
        }
        return $this->pdModel->findAll();
    }

    /**
     * Safely get a single entry by composite key
     */
    public function getEntry($b, $year)
    {
        return $this->pdModel->where(['b' => $b, '_year' => $year])->first();
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
}
