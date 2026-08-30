<?php

namespace App\Services;

use App\Models\KpModel;
use App\Models\KppolModel;

class ReceivableService
{
    protected $kpModel;
    protected $kppolModel;

    public function __construct()
    {
        $this->kpModel = new KpModel();
        $this->kppolModel = new KppolModel();
    }

    /**
     * Get a single receivable by its composite key (a, b)
     */
    public function getReceivable($a, $b)
    {
        return $this->kpModel->where(['a' => $a, 'b' => $b])->first();
    }

    /**
     * Get all items for a receivable
     */
    public function getItems($c, $d)
    {
        return $this->kppolModel->where(['c' => $c, 'd' => $d])->findAll();
    }

    /**
     * Get a receivable with its items
     */
    public function getReceivableWithItems($a, $b)
    {
        $invoice = $this->getReceivable($a, $b);
        if ($invoice) {
            $invoice['items'] = $this->getItems($a, $b);
        }
        return $invoice;
    }

    /**
     * Fetch all receivables
     */
    public function getAllReceivables()
    {
        return $this->kpModel->findAll();
    }

    /**
     * Create a receivable with items
     */
    public function createReceivable($header, $items = [])
    {
        $db = \Config\Database::connect();
        $db->transStart();

        $this->kpModel->insert($header);

        foreach ($items as $item) {
            $item['c'] = $header['a'];
            $item['d'] = $header['b'];
            $this->kppolModel->insert($item);
        }

        $db->transComplete();

        return $db->transStatus();
    }

    /**
     * Calculate totals and payment status according to legacy logic
     * zn = z + (z * dph/100) + vyrovn
     */
    public function calculateStatus($invoice, $year)
    {
        $z = (float)($invoice['z'] ?? 0);
        $vyrovn = (float)($invoice['vyrovn'] ?? 0);
        $dph = (float)($invoice['dph'] ?? 0);
        $pc = (float)($invoice['pc'] ?? 0);

        if ($year < 2009) {
            $dph_sk = round($z * ($dph / 100)); // round 1 (in FAND context often integer or near)
        } else {
            $dph_sk = round($z * ($dph / 100), 2);
        }

        $zn = $z + $dph_sk + $vyrovn;
        $uhrada = $pc;

        $status = '>'; // Default fallback

        // FAND logic approximation
        if ($uhrada == 0 && $zn != 0) {
            $status = '';
        } elseif ($zn == $uhrada && $z != 0) {
            $status = '■';
        } elseif ($zn > $uhrada) {
            $status = '<';
        } elseif ($zn == $uhrada && $zn == 0 && ($invoice['zamok'] ?? '') == 'a') {
            $status = '■';
        }
        // ignoring date logic for closed records for simplicity, strictly keeping numerical checks

        return [
            'zn' => $zn,
            'dph_sk' => $dph_sk,
            'uhrada' => $uhrada,
            'status' => $status
        ];
    }

    /**
     * Update receivable
     */
    public function updateReceivable($a, $b, $data)
    {
        return $this->kpModel->where(['a' => $a, 'b' => $b])->set($data)->update();
    }

    /**
     * Delete receivable and its items
     */
    public function deleteReceivable($a, $b)
    {
        $db = \Config\Database::connect();
        $db->transStart();
        $this->kppolModel->where(['c' => $a, 'd' => $b])->delete();
        $this->kpModel->where(['a' => $a, 'b' => $b])->delete();
        $db->transComplete();
        return $db->transStatus();
    }
}
