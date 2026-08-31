<?php

namespace Tests\App\Services;

use App\Services\LiabilityService;
use App\Services\ReceivableService;
use CodeIgniter\Test\CIUnitTestCase;

class InvoicesGoldenTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testGoldenValidation2026()
    {
        $liabilityService = new LiabilityService();
        $receivableService = new ReceivableService();

        $db = \Config\Database::connect();

        $builderKz = $db->table('kz');
        $builderKz->where('YEAR(a)', 2026);
        $kzs = $builderKz->get()->getResultArray();

        $builderKp = $db->table('kp');
        $builderKp->where('YEAR(a)', 2026);
        $kps = $builderKp->get()->getResultArray();

        $this->assertCount(33, $kzs, "Expected exactly 33 kz records in 2026.");
        $this->assertCount(6, $kps, "Expected exactly 6 kp records in 2026.");

        foreach ($kps as $kp) {
            $result = $receivableService->calculateStatus($kp, 2026);
            $doc = $kp['b'];

            // Re-calculate expected FAND values independently to ensure the CI4 service logic output matches exactly
            $z = (float)($kp['z'] ?? 0);
            $vyrovn = (float)($kp['vyrovn'] ?? 0);
            $dph = (float)($kp['dph'] ?? 0);
            $pc = (float)($kp['pc'] ?? 0);

            $dph_sk = round($z * ($dph / 100), 2);
            $dph_sk1 = 0.0;
            $zn = $z + $dph_sk + $vyrovn;
            $uhrada = $pc;

            $status = '>';
            if ($uhrada == 0 && $zn != 0) {
                $status = '';
            } elseif ($zn == $uhrada && $z != 0) {
                $status = '■';
            } elseif ($zn > $uhrada) {
                $status = '<';
            } elseif ($zn == $uhrada && $zn == 0 && ($kp['zamok'] ?? '') == 'a') {
                $status = '■';
            }

            $this->assertEqualsWithDelta($zn, $result['zn'], 0.001, "Discrepancy in zn for KP document $doc");
            $this->assertEqualsWithDelta($dph_sk, $result['dph_sk'], 0.001, "Discrepancy in dph_sk for KP document $doc");
            // dph_sk1 is not in the CI4 service output for kp
            $this->assertEqualsWithDelta($uhrada, $result['uhrada'], 0.001, "Discrepancy in uhrada for KP document $doc");
            $this->assertEquals($status, $result['status'], "Discrepancy in status for KP document $doc");
        }

        foreach ($kzs as $kz) {
            $result = $liabilityService->calculateStatus($kz, 2026);
            $doc = $kz['b'];

            $x = (float)($kz['x'] ?? 0);
            $y = (float)($kz['y'] ?? 0);
            $z = (float)($kz['z'] ?? 0);
            $dph = (float)($kz['dph'] ?? 0);
            $dph_1 = (float)($kz['dph_1'] ?? 0);
            $pc = (float)($kz['pc'] ?? 0);
            $vyrovn = (float)($kz['vyrovn'] ?? 0);
            $par_69 = (int)($kz['par_69'] ?? 0);

            $dph_sk1 = round($y * ($dph_1 / 100), 2);
            if ($par_69) {
                $dph_sk = 0.0;
            } else {
                $dph_sk = round($z * ($dph / 100), 2);
            }

            $zn = $x + ($y + $dph_sk1) + ($z + $dph_sk) + $vyrovn;
            $uhrada = $pc;

            $status = '>';
            if ($uhrada == 0 && $zn != 0) {
                $status = '';
            } elseif (abs($zn - $uhrada) < 0.1) {
                $status = '■';
            } elseif ($zn > $uhrada) {
                $status = '<';
            }

            $this->assertEqualsWithDelta($zn, $result['zn'], 0.001, "Discrepancy in zn for KZ document $doc");
            $this->assertEqualsWithDelta($dph_sk, $result['dph_sk'], 0.001, "Discrepancy in dph_sk for KZ document $doc");
            $this->assertEqualsWithDelta($dph_sk1, $result['dph_sk1'], 0.001, "Discrepancy in dph_sk1 for KZ document $doc");
            $this->assertEqualsWithDelta($uhrada, $result['uhrada'], 0.001, "Discrepancy in uhrada for KZ document $doc");
            $this->assertEquals($status, $result['status'], "Discrepancy in status for KZ document $doc");
        }
    }
}
