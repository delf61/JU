<?php

namespace Tests\Services;

use App\Services\VatService;
use CodeIgniter\Test\CIUnitTestCase;

class VatServiceTest extends CIUnitTestCase
{
    protected $vatService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->vatService = new VatService();
    }

    public function testDetermineRatesForDate()
    {
        $ratesList = [
            ['od' => '2000-01-01', 'do' => '2002-12-31', 'dph_dol' => '10.0', 'dph_hor' => '23.0'],
            ['od' => '2003-01-01', 'do' => '2003-12-31', 'dph_dol' => '14.0', 'dph_hor' => '20.0'],
            ['od' => '2004-01-01', 'do' => '2007-12-31', 'dph_dol' => '19.0', 'dph_hor' => '19.0'],
            ['od' => '2025-01-01', 'do' => '2100-12-31', 'dph_dol' => '19.0', 'dph_hor' => '23.0'],
        ];

        // 2002
        $res2002 = $this->vatService->determineRatesForDate('2002-06-15', $ratesList);
        $this->assertEquals(10.0, $res2002['lower']);
        $this->assertEquals(23.0, $res2002['upper']);

        // 2003 exact boundaries
        $res2003_start = $this->vatService->determineRatesForDate('2003-01-01', $ratesList);
        $this->assertEquals(14.0, $res2003_start['lower']);
        $this->assertEquals(20.0, $res2003_start['upper']);

        // 2025
        $res2025 = $this->vatService->determineRatesForDate('2025-09-01', $ratesList);
        $this->assertEquals(19.0, $res2025['lower']);
        $this->assertEquals(23.0, $res2025['upper']);

        // No matching rate
        $resNone = $this->vatService->determineRatesForDate('1990-01-01', $ratesList);
        $this->assertNull($resNone);
    }

    public function testRoundVat()
    {
        // SKK (round 1 / integer)
        $this->assertEquals(23, $this->vatService->roundVat(23.4, 'SKK'));
        $this->assertEquals(24, $this->vatService->roundVat(23.5, 'SKK'));
        $this->assertEquals(24, $this->vatService->roundVat(23.6, 'SKK'));

        // EUR (round 2 / 2 decimals)
        $this->assertEquals(23.44, $this->vatService->roundVat(23.444, 'EUR'));
        $this->assertEquals(23.45, $this->vatService->roundVat(23.445, 'EUR'));
    }

    public function testAccumulatePeriodKpVystup()
    {
        $rates = ['lower' => 10.0, 'upper' => 20.0];
        $kpRecords = [
            ['z' => 100, 'dph' => 10], // Lower
            ['z' => 200, 'dph' => 20], // Upper
            ['z' => 50,  'dph' => 10]  // Lower
        ];

        // Using EUR rounding
        $res = $this->vatService->accumulatePeriod('2020-01-01', '2020-01-31', $rates, [], $kpRecords, [], 'EUR');

        $this->assertEquals(150, $res['sum1vystup']);
        $this->assertEquals(15, $res['dph1vystup']);

        $this->assertEquals(200, $res['sum2vystup']);
        $this->assertEquals(40, $res['dph2vystup']);
    }

    public function testAccumulatePeriodPdVstup()
    {
        $rates = ['lower' => 10.0, 'upper' => 20.0];
        $pdRecords = [
            // Valid expense, has a6
            ['a6' => 100, 'a2' => 100, 'a4' => 0, 'b' => 'xxx', 'vydaj' => 'V', 'dph' => 10],
            // Valid expense, a6 missing but a4 present
            ['a2' => 0, 'a4' => 200, 'b' => 'xxx', 'vydaj' => 'V', 'dph' => 20],
            // Ignore vydaj = 't'
            ['a6' => 500, 'a2' => 500, 'a4' => 0, 'b' => 'xxx', 'vydaj' => 't', 'dph' => 20],
            // Ignore deleted
            ['_fand_deleted' => true, 'a6' => 500, 'a2' => 500, 'a4' => 0, 'b' => 'xxx', 'vydaj' => 'V', 'dph' => 20],
            // Ignore '50' prefix if cash (a2=0, a4<>0)
            ['a2' => 0, 'a4' => 300, 'b' => '50x', 'vydaj' => 'V', 'dph' => 20]
        ];

        $res = $this->vatService->accumulatePeriod('2020-01-01', '2020-01-31', $rates, $pdRecords, [], [], 'EUR');

        // Lower rate (10% on 100)
        $this->assertEquals(100, $res['sum1vstup']);
        $this->assertEquals(10, $res['dph1vstup']);

        // Upper rate (20% on 200, ignoring 500(t), 500(deleted), 300('50' prefix on bank))
        $this->assertEquals(200, $res['sum2vstup']);
        $this->assertEquals(40, $res['dph2vstup']);
    }

    public function testAccumulatePeriodKzVstup1999()
    {
        $rates = ['lower' => 10.0, 'upper' => 23.0];
        $kzRecords = [
            // Valid (U_H = 'U')
            ['u_h' => 'U', 'y' => 100, 'dph_1' => 10, 'z' => 0, 'dph' => 0],
            // Valid Upper (U_H = 'U')
            ['u_h' => 'U', 'y' => 0, 'dph_1' => 0, 'z' => 200, 'dph' => 23],
            // Ignored because before 2003-04-01 and U_H != 'U'
            ['u_h' => 'N', 'y' => 50, 'dph_1' => 10, 'z' => 0, 'dph' => 0]
        ];

        $res = $this->vatService->accumulatePeriod('1999-01-01', '1999-01-31', $rates, [], [], $kzRecords, 'SKK');

        $this->assertEquals(100, $res['sum1vstup']);
        $this->assertEquals(10, $res['dph1vstup']);
        $this->assertEquals(200, $res['sum2vstup']);
        $this->assertEquals(46, $res['dph2vstup']);
    }

    public function testAccumulatePeriodKzVstup2004()
    {
        // Post 1.4.2003 rule dropped U_H='U'
        $rates = ['lower' => 19.0, 'upper' => 19.0];
        $kzRecords = [
            // Missing U_H but post 2003-04-01 so it should be included
            ['u_h' => 'N', 'y' => 100, 'dph_1' => 19, 'z' => 0, 'dph' => 0],
        ];

        $res = $this->vatService->accumulatePeriod('2004-01-01', '2004-01-31', $rates, [], [], $kzRecords, 'SKK');

        // Both go to upper rate in reality if rate > 15
        $this->assertEquals(100, $res['sum2vstup']);
        $this->assertEquals(19, $res['dph2vstup']);
    }

    public function testAccumulatePeriodKzVstup2025ReverseCharge()
    {
        $rates = ['lower' => 19.0, 'upper' => 23.0];
        $kzRecords = [
            ['y' => 100, 'dph_1' => 19, 'z' => 0, 'dph' => 0], // Par 69 lower
            ['y' => 0, 'dph_1' => 0, 'z' => 200, 'dph' => 23]  // Par 69 upper
        ];

        // 2025-09-01 triggers §69 mapping for KZ
        $res = $this->vatService->accumulatePeriod('2025-09-01', '2025-09-30', $rates, [], [], $kzRecords, 'EUR');

        // Normal vstup should be 0
        $this->assertEquals(0, $res['sum1vstup']);
        $this->assertEquals(0, $res['sum2vstup']);

        // Par 69 fields should aggregate both (100 + 200 = 300)
        $this->assertEquals(300, $res['sum_par_69']);
        $this->assertEquals(65, $res['dph_par_69']); // 19 + 46
    }
}
