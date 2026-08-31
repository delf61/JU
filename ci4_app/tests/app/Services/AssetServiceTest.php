<?php

namespace Tests\App\Services;

use App\Services\AssetService;
use CodeIgniter\Test\CIUnitTestCase;

class AssetServiceTest extends CIUnitTestCase
{
    protected AssetService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new AssetService();
    }

    public function testCalculateIkzpDepreciationR_Auto_Post2003()
    {
        $record = [
            'h' => 2299.00,
            'hz' => 1869.10,
            'dph' => 23.0,
            'oprava' => 0.0,
            'ro' => 0,
            'so' => 'R',
            'os' => '1',
            'n' => 'AUTOMOBIL Luba',
            'sv' => '1',
        ];

        // obstar_Bez_DPH = 2299 * 100 / 123 = 1869.1
        // oo = obstar_Bez_DPH = 1869.1 (because paramcat.rok > 2002)
        // voO = oo / 4 = 1869.1 / 4 = 467.275
        // vo = ceil(voO) = 468

        $result = $this->service->calculateIkzp($record, 2026);

        $this->assertEqualsWithDelta(1869.1, $result['obstar_Bez_DPH'], 0.01);
        $this->assertEqualsWithDelta(467.275, $result['voO'], 0.01);
        $this->assertEquals(468.0, $result['vo']);
    }

    public function testCalculateIkzpDepreciationZ_RO1()
    {
        $record = [
            'h' => 1000.0,
            'hz' => 0.0,
            'dph' => 20.0, // bez_dph = 833.3
            'ro' => 1,
            'so' => 'Z',
            'os' => '2',
            'n' => 'Machine',
            'sv' => '',
        ];

        // obstar_Bez_DPH = 1000 * 100 / 120 = 833.3
        // oo = 833.3
        // voO = 833.3 / 8 = 104.1625
        // vo = ceil(104.1625) = 105

        $result = $this->service->calculateIkzp($record, 2026);
        $this->assertEqualsWithDelta(833.3, $result['obstar_Bez_DPH'], 0.01);
        $this->assertEqualsWithDelta(104.1625, $result['voO'], 0.01);
        $this->assertEquals(105.0, $result['vo']);
    }

    public function testCalculateIkzpOS0()
    {
        $record = [
            'h' => 1000.0,
            'hz' => 0.0,
            'dph' => 20.0, // bez_dph = 833.3
            'ro' => 1,
            'so' => 'Z',
            'os' => '0',
            'n' => 'Machine',
            'sv' => '50.5',
        ];

        // vo = val(sv) = 50.5

        $result = $this->service->calculateIkzp($record, 2026);
        $this->assertEquals(50.5, $result['vo']);
    }

    public function testCalculateIkdkpTotals()
    {
        $record = [
            'jc' => 120.0,
            'mn' => 5,
            'dph' => 20.0,
        ];

        // jc_mn = 600
        // bez_dph = 120 * 100 / 120 = 100
        // bez_dph_mn = 100 * 5 = 500
        // dph_sk = 120 - 100 = 20
        // dph_sk_mn = 20 * 5 = 100

        $result = $this->service->calculateIkdkp($record);
        $this->assertEquals(600.0, $result['jc_mn']);
        $this->assertEquals(100.0, $result['bez_dph']);
        $this->assertEquals(500.0, $result['bez_dph_mn']);
        $this->assertEquals(20.0, $result['dph_sk']);
        $this->assertEquals(100.0, $result['dph_sk_mn']);
    }
}
