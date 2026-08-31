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

        // Define expected ZN for specific historical FAND exceptions reported in forensic analysis
        $fixedCases = [
            '016/2026' => 83.17,
            '024/2026' => 8.64,
            '025/2026' => 39.87,
            '031/2026' => 133.38,
        ];

        foreach ($kzs as $kz) {
            $result = $liabilityService->calculateStatus($kz, 2026);
            $doc = $kz['b'];

            // Assert against specific cases we fixed
            if (isset($fixedCases[$doc])) {
                $this->assertEqualsWithDelta($fixedCases[$doc], $result['zn'], 0.001, "Discrepancy found in KZ document $doc");
            }

            // Verify other fields if they exist in DB, but kz/kp don't store zn natively in FAND format, they are dynamically computed.
            // But we can check pc -> uhrada mapping
            $this->assertEqualsWithDelta((float)($kz['pc'] ?? 0), $result['uhrada'], 0.001, "Discrepancy in uhrada for KZ document $doc");
        }

        foreach ($kps as $kp) {
            $result = $receivableService->calculateStatus($kp, 2026);
            $doc = $kp['b'];
            $this->assertNotNull($result);

            // Verify fields
            $this->assertEqualsWithDelta((float)($kp['pc'] ?? 0), $result['uhrada'], 0.001, "Discrepancy in uhrada for KP document $doc");
        }
    }
}
