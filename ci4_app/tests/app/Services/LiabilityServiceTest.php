<?php

namespace Tests\App\Services;

use App\Services\LiabilityService;
use CodeIgniter\Test\CIUnitTestCase;

class LiabilityServiceTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testCalculateStatusPar69Is0()
    {
        $service = new LiabilityService();
        $invoice = [
            'x' => 0,
            'y' => 0,
            'z' => 100,
            'dph' => 20,
            'dph_1' => 10,
            'pc' => 0,
            'vyrovn' => 0,
            'par_69' => 0,
        ];
        $result = $service->calculateStatus($invoice, 2026);

        $this->assertEquals(20.0, $result['dph_sk']);
        $this->assertEquals(120.0, $result['zn']);
    }

    public function testCalculateStatusPar69Is1()
    {
        $service = new LiabilityService();
        $invoice = [
            'x' => 0,
            'y' => 0,
            'z' => 100,
            'dph' => 20,
            'dph_1' => 10,
            'pc' => 0,
            'vyrovn' => 0,
            'par_69' => 1,
        ];
        $result = $service->calculateStatus($invoice, 2026);

        $this->assertEquals(0.0, $result['dph_sk']);
        $this->assertEquals(100.0, $result['zn']);
    }

    public function testCalculateStatusDoc016()
    {
        $service = new LiabilityService();
        $invoice = [
            'x' => 0,
            'y' => 0,
            'z' => 83.17,
            'dph' => 23,
            'dph_1' => 19,
            'pc' => 83.17,
            'vyrovn' => 0,
            'par_69' => 1,
        ];
        $result = $service->calculateStatus($invoice, 2026);

        $this->assertEquals(0.0, $result['dph_sk']);
        $this->assertEquals(83.17, $result['zn']);
    }

    public function testCalculateStatusDoc025()
    {
        $service = new LiabilityService();
        $invoice = [
            'x' => 0,
            'y' => 0,
            'z' => 39.87,
            'dph' => 23,
            'dph_1' => 19,
            'pc' => 39.87,
            'vyrovn' => 0,
            'par_69' => 1,
        ];
        $result = $service->calculateStatus($invoice, 2026);

        $this->assertEquals(0.0, $result['dph_sk']);
        $this->assertEquals(39.87, $result['zn']);
    }

    public function testCalculateStatusDoc031()
    {
        $service = new LiabilityService();
        $invoice = [
            'x' => 0,
            'y' => 0,
            'z' => 133.38,
            'dph' => 23,
            'dph_1' => 19,
            'pc' => 133.38,
            'vyrovn' => 0,
            'par_69' => 1,
        ];
        $result = $service->calculateStatus($invoice, 2026);

        $this->assertEquals(0.0, $result['dph_sk']);
        $this->assertEquals(133.38, $result['zn']);
    }

    public function testCalculateStatusVyrovn0()
    {
        $service = new LiabilityService();
        $invoice = [
            'x' => 0,
            'y' => 0,
            'z' => 10,
            'dph' => 20,
            'dph_1' => 10,
            'pc' => 0,
            'vyrovn' => 0,
            'par_69' => 0,
        ];
        $result = $service->calculateStatus($invoice, 2026);

        $this->assertEquals(12.0, $result['zn']);
    }

    public function testCalculateStatusVyrovn0_01()
    {
        $service = new LiabilityService();
        $invoice = [
            'x' => 0,
            'y' => 0,
            'z' => 10,
            'dph' => 20,
            'dph_1' => 10,
            'pc' => 0,
            'vyrovn' => 0.01,
            'par_69' => 0,
        ];
        $result = $service->calculateStatus($invoice, 2026);

        $this->assertEquals(12.01, $result['zn']);
    }

    public function testCalculateStatusDoc024()
    {
        $service = new LiabilityService();
        $invoice = [
            'x' => 0,
            'y' => 0,
            'z' => 7.02,
            'dph' => 23,
            'dph_1' => 19,
            'pc' => 8.64,
            'vyrovn' => 0.01,
            'par_69' => 0,
        ];
        $result = $service->calculateStatus($invoice, 2026);

        $this->assertEqualsWithDelta(8.64, $result['zn'], 0.001);
    }

    public function testCalculateStatusExactMatch()
    {
        $service = new LiabilityService();
        $invoice = [
            'x' => 0,
            'y' => 0,
            'z' => 100,
            'dph' => 20,
            'pc' => 120, // 100 + 20
        ];
        $result = $service->calculateStatus($invoice, 2026);

        $this->assertEquals('■', $result['status']);
    }

    public function testCalculateStatusDiffLessThan0_1()
    {
        $service = new LiabilityService();
        $invoice = [
            'x' => 0,
            'y' => 0,
            'z' => 100,
            'dph' => 20,
            'pc' => 119.95, // diff = 0.05
        ];
        $result = $service->calculateStatus($invoice, 2026);

        $this->assertEquals('■', $result['status']);
    }

    public function testCalculateStatusDiffMoreThan0_1()
    {
        $service = new LiabilityService();
        $invoice = [
            'x' => 0,
            'y' => 0,
            'z' => 100,
            'dph' => 20,
            'pc' => 119.8, // diff = 0.2
        ];
        $result = $service->calculateStatus($invoice, 2026);

        $this->assertEquals('<', $result['status']);
    }
}
