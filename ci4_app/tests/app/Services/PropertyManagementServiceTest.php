<?php

namespace Tests\App\Services;

use CodeIgniter\Test\CIUnitTestCase;
use App\Services\PropertyManagementService;

class PropertyManagementServiceTest extends CIUnitTestCase
{
    protected $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new PropertyManagementService();
    }

    public function testCalculateASum()
    {
        $record = [
            'a1' => 10.5,
            'a2a' => 5.0,
            'a5' => 4.5
        ];
        $this->assertEquals(20.0, $this->service->calculateASum($record));
    }

    public function testCalculateBSum()
    {
        $record = [
            'b1' => 100,
            'b10' => 50
        ];
        $this->assertEquals(150.0, $this->service->calculateBSum($record));
    }

    public function testCalculateElectricityConsumption()
    {
        $current = [
            'el_v' => 1000,
            'sk_v' => 0.5,
            'dph' => 20.0,
            'rok' => 2007
        ];
        $previous = [
            'el_v' => 800
        ];

        $result = $this->service->calculateVyuctSSE($current, $previous);

        $this->assertEquals(200.0, $result['spotreba_v']);
        // 200 * 0.5 * 1.20 = 120.0
        $this->assertEquals(120.0, $result['sk_spolu_v']);
        $this->assertEquals(178.5, $result['pausal']);
    }

    public function testCalculateElectricityMeterReplacement()
    {
        $current = [
            'el_v' => 50,
            'vymena' => true
        ];
        $previous = [
            'el_v' => 9999
        ];

        $result = $this->service->calculateVyuctSSE($current, $previous);
        $this->assertEquals(0.0, $result['spotreba_v']);
    }

    public function testCalculateWaterConsumption()
    {
        $current = [
            'h2o_v' => 500,
            'sk_v' => 2.0,
            'dph' => 20.0
        ];
        $previous = [
            'h2o_v' => 400
        ];

        $result = $this->service->calculateVyucH2OSasa($current, $previous);

        $this->assertEquals(100.0, $result['spotreba']);
        // 100 * 2.0 * 1.20 = 240.0
        $this->assertEquals(240.0, $result['sk_spolu_v']);
    }

    public function testCalculateWaterMeterReplacement()
    {
        $current = [
            'h2o_v' => 10
        ];
        $previous = [
            'h2o_v' => 400
        ];

        // When current is less than previous, previous is treated as 0
        $result = $this->service->calculateVyucH2OSasa($current, $previous);
        $this->assertEquals(10.0, $result['spotreba']);
    }
}
