<?php

namespace App\Services;

use App\Models\KzModel;
use App\Models\KzpolModel;

class LiabilityService
{
    protected $kzModel;
    protected $kzpolModel;

    public function __construct()
    {
        $this->kzModel = new KzModel();
        $this->kzpolModel = new KzpolModel();
    }

    /**
     * Get a single liability by its composite key (a, b)
     */
    public function getLiability($a, $b)
    {
        return $this->kzModel->where(['a' => $a, 'b' => $b])->first();
    }

    /**
     * Get all items for a liability
     */
    public function getItems($a, $b)
    {
        return $this->kzpolModel->where(['a' => $a, 'b' => $b])->findAll();
    }

    /**
     * Get a liability with its items
     */
    public function getLiabilityWithItems($a, $b)
    {
        $invoice = $this->getLiability($a, $b);
        if ($invoice) {
            $invoice['items'] = $this->getItems($a, $b);
        }
        return $invoice;
    }

    /**
     * Fetch all liabilities
     */
    public function getAllLiabilities()
    {
        return $this->kzModel->findAll();
    }

    /**
     * Create a liability with items
     */
    public function createLiability($header, $items = [])
    {
        $db = \Config\Database::connect();
        $db->transStart();

        $this->kzModel->insert($header);

        foreach ($items as $item) {
            $item['a'] = $header['a'];
            $item['b'] = $header['b'];
            $this->kzpolModel->insert($item);
        }

        $db->transComplete();

        return $db->transStatus();
    }

    /**
     * Calculate totals and payment status according to legacy logic
     */
    public function calculateStatus($invoice, $year)
    {
        $x = (float)($invoice['x'] ?? 0);
        $y = (float)($invoice['y'] ?? 0);
        $z = (float)($invoice['z'] ?? 0);
        $dph = (float)($invoice['dph'] ?? 0);
        $dph_1 = (float)($invoice['dph_1'] ?? 0);
        $pc = (float)($invoice['pc'] ?? 0);

        if ($year < 2009) {
            $dph_sk1 = round($y * ($dph_1 / 100));
            $dph_sk = round($z * ($dph / 100));
        } else {
            $dph_sk1 = round($y * ($dph_1 / 100), 2);
            $dph_sk = round($z * ($dph / 100), 2);
        }

        $zn_x = $x;
        $zn_y = $y + $dph_sk1;
        $zn_z = $z + $dph_sk;

        $zn = $zn_x + $zn_y + $zn_z;
        $uhrada = $pc;

        $status = '>';

        if ($uhrada == 0 && $zn != 0) {
            $status = '';
        } elseif ($zn == $uhrada) {
            $status = '■';
        } elseif ($zn > $uhrada) {
            $status = '<';
        }

        return [
            'zn' => $zn,
            'dph_sk' => $dph_sk,
            'dph_sk1' => $dph_sk1,
            'uhrada' => $uhrada,
            'status' => $status
        ];
    }

    /**
     * Update liability
     */
    public function updateLiability($a, $b, $data)
    {
        return $this->kzModel->where(['a' => $a, 'b' => $b])->set($data)->update();
    }

    /**
     * Delete liability and its items
     */
    public function deleteLiability($a, $b)
    {
        $db = \Config\Database::connect();
        $db->transStart();
        $this->kzpolModel->where(['a' => $a, 'b' => $b])->delete();
        $this->kzModel->where(['a' => $a, 'b' => $b])->delete();
        $db->transComplete();
        return $db->transStatus();
    }
}
