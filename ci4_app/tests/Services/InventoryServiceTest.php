<?php

namespace Tests\Services;

use CodeIgniter\Test\CIUnitTestCase;
use App\Services\InventoryService;

class InventoryServiceTest extends CIUnitTestCase
{
    public function testCalculateDerivedFields()
    {
        $service = new InventoryService();

        $item = [
            'nakupcena' => '100.00',
            'dph' => '20.0',
            'mnozstvo' => '5.0',
            'a' => '2026-01-01',
            'mes' => '12'
        ];

        $result = $service->calculateDerivedFields($item);

        // DPH_Sk := (nakupcena * (dph/100)) round 1
        // 100 * 0.20 = 20.0
        $this->assertEquals(20.0, $result['DPH_Sk']);

        // s_DPH := nakupcena + DPH_Sk
        // 100 + 20.0 = 120.0
        $this->assertEquals(120.0, $result['s_DPH']);

        // spolu := nakupcena * mnozstvo
        // 100 * 5 = 500
        $this->assertEquals(500.0, $result['spolu']);

        // zaruka_do := addmonth(a, mes)
        // 2026-01-01 + 12 months = 2027-01-01
        $this->assertEquals('2027-01-01', $result['zaruka_do']);
    }
}
