<?php

namespace App\Services;

use CodeIgniter\Test\CIUnitTestCase;

class TripServiceTest extends CIUnitTestCase
{
    protected TripService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new TripService();
    }

    public function testScCalculationPre2004NonFir()
    {
        $scRow = [
            'koniec' => '2003-12-31',
            'benkm' => 100,
            'pockm' => 0,
            'konst' => 5.2,
            'cebenz' => 30.5,
            'ces' => 0,
            'uby' => 150
        ];
        $autoRow = [
            'fir' => false,
            'ps' => 7.5
        ];

        // calc = 100 * (5.2 + (30.5 * 7.5 / 100)) = 100 * (5.2 + 2.2875) = 100 * 7.4875 = 748.75
        // spolu = 748.75 + 150 = 898.75
        $result = $this->service->calculateScTotals($scRow, $autoRow);

        $this->assertEquals(748.75, $result['cestsm']);
        $this->assertEquals(898.75, $result['spolu']);
        $this->assertEquals(100.0, $result['sumkm']);
    }

    public function testScCalculationPre2004Fir()
    {
        $scRow = [
            'koniec' => '2003-12-31',
            'benkm' => 100,
            'pockm' => 0,
            'konst' => 5.2,
            'cebenz' => 30.5,
            'ces' => 0,
            'uby' => 0
        ];
        $autoRow = [
            'fir' => true,
            'ps' => 7.5
        ];

        // calc = 100 * (30.5 * 7.5 / 100) = 100 * 2.2875 = 228.75
        $result = $this->service->calculateScTotals($scRow, $autoRow);

        $this->assertEquals(228.75, $result['cestsm']);
    }

    public function testScCalculationPost2004()
    {
        $scRow = [
            'koniec' => '2005-01-01',
            'benkm' => 300,
            'pockm' => 0, // lpg km
            'cebenz' => 35.0,
            'ces' => 0,
            'uby' => 0,
            'benpocetmi' => 5 // 5 cities visited
        ];
        $autoRow = [
            'fir' => false, // >= 2004 doesn't explicitly branch on fir for calculation, uses mesto/mimo splits
            'ps' => 6.0
        ];

        // benMesto = 10 * 5 = 50
        // benMimo = 300 - 50 = 250
        // calc = (50 * (35.0 * (6.0 * 1.4) / 100)) + (250 * (35.0 * 6.0 / 100))
        // 50 * (35 * 8.4 / 100) = 50 * 2.94 = 147
        // 250 * (35 * 6 / 100) = 250 * 2.1 = 525
        // 147 + 525 = 672
        $result = $this->service->calculateScTotals($scRow, $autoRow);

        $this->assertEquals(672.0, $result['cestsm']);
    }

    public function testScCalculationCesOverride()
    {
        $scRow = [
            'koniec' => '2005-01-01',
            'benkm' => 300,
            'ces' => 999.5, // should override calc
            'uby' => 10.0
        ];
        $result = $this->service->calculateScTotals($scRow, []);
        $this->assertEquals(999.5, $result['cestsm']);
        $this->assertEquals(1009.5, $result['spolu']);
    }

    public function testEviAutoCalculationPre2004NonFir()
    {
        $eviRow = [
            'datum' => '2003-12-31',
            'zac_km' => 1000,
            'kon_km' => 1150,
            'konst' => 5.2,
            'cena_phm' => 30.5,
            'dph' => 0
        ];
        $autoRow = [
            'fir' => false,
            'ps' => 7.5
        ];

        // poc_km = 150
        // phm = 30.5
        // spolu = 150 * (5.2 + (30.5 * 7.5 / 100)) = 150 * 7.4875 = 1123.125 -> 1123.13
        $result = $this->service->calculateEviAutoTotals($eviRow, $autoRow);

        $this->assertEquals(150, $result['poc_km']);
        $this->assertEquals(1123.13, $result['spolu']);
    }

    public function testEviAutoCalculationPre2004Fir()
    {
        $eviRow = [
            'datum' => '2003-12-31',
            'zac_km' => 1000,
            'kon_km' => 1150,
            'konst' => 5.2,
            'cena_phm' => 30.5,
            'dph' => 0
        ];
        $autoRow = [
            'fir' => true,
            'ps' => 7.5
        ];

        // spolu = 150 * (30.5 * 7.5 / 100) = 150 * 2.2875 = 343.125 -> 343.13
        $result = $this->service->calculateEviAutoTotals($eviRow, $autoRow);

        $this->assertEquals(343.13, $result['spolu']);
    }

    public function testEviAutoCalculationPre2005MestoLogic()
    {
        // 2004 (pre 2005) uses fixed mesto limits
        $eviRow = [
            'datum' => '2004-06-01',
            'zac_km' => 1000,
            'kon_km' => 1250, // poc_km = 250 -> mesto = 20
            'cena_phm' => 30.5,
            'dph' => 0
        ];
        $autoRow = [
            'ps' => 7.5,
            'ms' => 9.0
        ];

        // mesto = 20, mimo = 230
        // phm = 30.5
        // spolu = (20 * (30.5 * 9.0 / 100)) + (230 * (30.5 * 7.5 / 100))
        // 20 * 2.745 = 54.9
        // 230 * 2.2875 = 526.125
        // 54.9 + 526.125 = 581.025 -> 581.03
        $result = $this->service->calculateEviAutoTotals($eviRow, $autoRow);

        $this->assertEquals(20, $result['mesto']);
        $this->assertEquals(230, $result['mimo']);
        $this->assertEquals(581.03, $result['spolu']);
    }

    public function testEviAutoCalculationPost2005MestoLogic()
    {
        // Post 2005 uses explicit counts
        $eviRow = [
            'datum' => '2006-06-01',
            'zac_km' => 1000,
            'kon_km' => 1250, // poc_km = 250
            'mesto_2_km' => 1,
            'mesto_5_km' => 2,
            'mesto_10_k' => 1, // mesto = 2 + 10 + 10 = 22
            'cena_phm' => 30.5,
            'dph' => 0
        ];
        $autoRow = [
            'ps' => 7.5,
            'ms' => 9.0
        ];

        // mesto = 22, mimo = 228
        // phm = 30.5
        // spolu = (22 * 2.745) + (228 * 2.2875) = 60.39 + 521.55 = 581.94
        $result = $this->service->calculateEviAutoTotals($eviRow, $autoRow);

        $this->assertEquals(22, $result['mesto']);
        $this->assertEquals(228, $result['mimo']);
        $this->assertEquals(581.94, $result['spolu']);
    }
}