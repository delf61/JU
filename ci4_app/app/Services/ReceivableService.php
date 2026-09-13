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
     * Fetch all receivables for a given year and append calculated totals
     */
    public function getAllReceivables($year = null)
    {
        if ($year) {
            $this->kpModel->where('YEAR(a)', $year);
        }

        $invoices = $this->kpModel->findAll();

        foreach ($invoices as &$invoice) {
            $invYear = $year ? $year : (int)date('Y', strtotime($invoice['a']));
            $statusData = $this->calculateStatus($invoice, $invYear);

            $invoice['zn'] = $statusData['zn'];
            $invoice['dph_sk'] = $statusData['dph_sk'];
            $invoice['uhrada'] = $statusData['uhrada'];
            $invoice['uhr'] = $statusData['status'];
        }

        return $invoices;
    }

    /**
     * Create a receivable with items
     */

    public function generateNextB($year)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('kp');
        $builder->select('b');
        $builder->where('YEAR(a)', $year);
        $builder->orderBy('b', 'DESC');
        $builder->limit(1);
        $result = $builder->get()->getRowArray();

        if ($result && !empty($result['b'])) {
            $lastB = $result['b'];
            if (preg_match('/(\d+)$/', $lastB, $matches)) {
                $num = (int)$matches[1];
                $newNum = $num + 1;
                $len = strlen($matches[1]);
                return preg_replace('/(\d+)$/', str_pad($newNum, $len, '0', STR_PAD_LEFT), $lastB);
            }
        }
        $prefix = substr($year, 2, 2);
        return $prefix . '-0001';
    }

    public function createReceivable(&$header, $items = [])
    {
        if (empty($header['b'])) {
            $year = !empty($header['a']) ? date('Y', strtotime($header['a'])) : date('Y');
            $header['b'] = $this->generateNextB($year);
        }

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
