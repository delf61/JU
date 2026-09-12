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
     * Fetch all liabilities for a given year and append calculated totals
     */
    public function getAllLiabilities($year = null)
    {
        if ($year) {
            $this->kzModel->where('YEAR(a)', $year);
        }

        $invoices = $this->kzModel->findAll();

        $attachmentModel = new \App\Models\KzAttachmentModel();
        // Načítajme si zoznam dokladov, ktoré majú aspoň 1 prílohu na minimalizáciu DB queries
        $dokladySPrilohou = [];
        if (!empty($invoices)) {
            $doklady = array_column($invoices, 'b');
            if (!empty($doklady)) {
                $prilohy = $attachmentModel->select('kz_b')->whereIn('kz_b', $doklady)->groupBy('kz_b')->findAll();
                $dokladySPrilohou = array_column($prilohy, 'kz_b');
            }
        }

        foreach ($invoices as &$invoice) {
            $invYear = $year ? $year : (int)date('Y', strtotime($invoice['a']));
            $statusData = $this->calculateStatus($invoice, $invYear);

            $invoice['zn'] = $statusData['zn'];
            $invoice['dph_sk'] = $statusData['dph_sk'];
            $invoice['uhrada'] = $statusData['uhrada'];
            $invoice['uhr'] = $statusData['status'];
            $invoice['has_attachment'] = in_array($invoice['b'], $dokladySPrilohou);
        }

        return $invoices;
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
        $vyrovn = (float)($invoice['vyrovn'] ?? 0);
        $par_69 = (int)($invoice['par_69'] ?? 0);

        if ($year < 2009) {
            $dph_sk1 = round($y * ($dph_1 / 100));
            $dph_sk = round($z * ($dph / 100));
        } else {
            $dph_sk1 = round($y * ($dph_1 / 100), 2);
            if ($par_69) {
                $dph_sk = 0.0;
            } else {
                $dph_sk = round($z * ($dph / 100), 2);
            }
        }

        $zn_x = $x;
        $zn_y = $y + $dph_sk1;
        $zn_z = $z + $dph_sk;

        $zn = $zn_x + $zn_y + $zn_z + $vyrovn;
        $uhrada = $pc;

        $status = '>';

        if ($uhrada == 0 && $zn != 0) {
            $status = '';
        } elseif (abs($zn - $uhrada) < 0.1) {
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
