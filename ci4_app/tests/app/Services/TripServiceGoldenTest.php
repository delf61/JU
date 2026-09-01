<?php

namespace App\Services;

use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;

class TripServiceGoldenTest extends CIUnitTestCase
{
    protected TripService $service;
    protected $db;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new TripService();
        $this->db = Database::connect();
    }

    public function testScDataset()
    {
        // 1. Determine exact 2015 dataset independently
        $query = $this->db->query("SELECT * FROM sc WHERE YEAR(zaciatok) = 2015");
        $scRows = $query->getResultArray();

        // Assert we have the exact number of records the DB told us directly (268)
        $this->assertCount(268, $scRows, "Expected exactly 268 SC records for the 2015 dataset.");

        $totalTested = 0;
        $skipped = 0;
        $differences = 0;
        $diffDetails = [];

        foreach ($scRows as $scRow) {
            $kod = $scRow['kod'] ?? '';
            $autoRow = $this->db->query("SELECT * FROM auto WHERE kod = ?", [$kod])->getRowArray();
            if (!$autoRow) {
                $autoRow = [];
            }

            // FAND legacy calculation evaluation purely from rules, independent of TripService
            $koniec = $scRow['koniec'] ?? '';
            $benkm = (float)($scRow['benkm'] ?? 0);
            $pockm = (float)($scRow['pockm'] ?? 0);
            $konst = (float)($scRow['konst'] ?? 0);
            $ceBenz = (float)($scRow['cebenz'] ?? 0);
            $ceLpg = (float)($scRow['celpg'] ?? 0);
            $ces = (float)($scRow['ces'] ?? 0);
            $uby = (float)($scRow['uby'] ?? 0);

            $benPocetMiest = (float)($scRow['benpocetmi'] ?? 0);
            $pocetMiest = (float)($scRow['pocetmiest'] ?? 0);

            $isFir = !empty($autoRow['fir']);
            $autoLPG = (float)($autoRow['lpg'] ?? 0);

            // Calculate independent PS
            $esmi = (float)($autoRow['esmi'] ?? 0);
            $esko = (float)($autoRow['esko'] ?? 0);
            $eh90 = (float)($autoRow['eh90'] ?? 0);
            $eh120 = (float)($autoRow['eh120'] ?? 0);
            $stn = (float)($autoRow['stn'] ?? 0);
            $autoPS = 0.0;
            if ($esmi != 0) {
                $autoPS = $esko;
            } elseif ($eh90 != 0 && $eh120 != 0) {
                $autoPS = ($eh90 + $eh120) / 2.0;
            } else {
                $autoPS = $stn;
            }

            // Historical rules
            $isPre2004 = false;
            if (!empty($koniec)) {
                $dateKoniec = strtotime($koniec);
                if ($dateKoniec !== false && $dateKoniec < strtotime('2004-01-01')) {
                    $isPre2004 = true;
                }
            }

            $expectedCestSM = 0.0;
            if ($ces > 0) {
                $expectedCestSM = $ces;
            } else {
                if ($isPre2004 && !$isFir) {
                    $calc = ($benkm * ($konst + ($ceBenz * $autoPS / 100.0))) +
                            ($pockm * ($konst + ($ceLpg * $autoLPG / 100.0)));
                    $expectedCestSM = round($calc, 2);
                } elseif ($isPre2004 && $isFir) {
                    $calc = ($benkm * ($ceBenz * $autoPS / 100.0)) +
                            ($pockm * ($ceLpg * $autoLPG / 100.0));
                    $expectedCestSM = round($calc, 2);
                } else {
                    $benMesto = 10.0 * $benPocetMiest;
                    $benMimo = $benkm - $benMesto;
                    $mesto = 10.0 * $pocetMiest;
                    $mimo = $pockm - $mesto;

                    $calc = ($benMesto * ($ceBenz * ($autoPS * 1.4) / 100.0)) +
                            ($benMimo * ($ceBenz * $autoPS / 100.0)) +
                            ($mesto * ($ceLpg * ($autoLPG * 1.4) / 100.0)) +
                            ($mimo * ($ceLpg * $autoLPG / 100.0));
                    $expectedCestSM = round($calc, 2);
                }
            }
            $expectedSpolu = round($expectedCestSM + $uby, 2);
            $expectedSumkm = round($pockm + $benkm, 2);

            // Skip zero-generated records as FAND would
            if ($expectedSpolu == 0 && $expectedCestSM == 0 && $expectedSumkm == 0) {
                $skipped++;
                continue;
            }

            $totalTested++;

            // Generate actual values via Service
            $actual = $this->service->calculateScTotals($scRow, $autoRow);

            $diffSpolu = abs($actual['spolu'] - $expectedSpolu);
            $diffCestsm = abs($actual['cestsm'] - $expectedCestSM);
            $diffSumkm = abs($actual['sumkm'] - $expectedSumkm);

            if ($diffSpolu > 0.1 || $diffCestsm > 0.1 || $diffSumkm > 0.1) {
                $differences++;
                $diffDetails[] = [
                    'bb' => $scRow['bb'] ?? 'N/A',
                    'kod' => $kod,
                    'expected_spolu' => $expectedSpolu,
                    'actual_spolu' => $actual['spolu'],
                    'expected_cestsm' => $expectedCestSM,
                    'actual_cestsm' => $actual['cestsm'],
                    'expected_sumkm' => $expectedSumkm,
                    'actual_sumkm' => $actual['sumkm']
                ];
            }
        }

        file_put_contents(WRITEPATH . 'logbook_sc_coverage.json', json_encode([
            'year' => 2015,
            'total' => count($scRows),
            'tested' => $totalTested,
            'skipped' => $skipped,
            'differences' => $differences,
            'details' => $diffDetails
        ], JSON_PRETTY_PRINT));

        if ($differences > 0) {
            print_r($diffDetails);
        }

        $this->assertEquals(0, $differences, "SC golden test found differences between independent rules and TripService output.");
        // Assert we actually tested records, preventing 0-record false pass
        $this->assertGreaterThan(0, $totalTested, "Expected to test more than 0 records for SC 2015.");
    }

    public function testEviAutoDataset()
    {
        $query = $this->db->query("SELECT * FROM eviauto");
        $eviRows = $query->getResultArray();

        if (count($eviRows) === 0) {
            file_put_contents(WRITEPATH . 'logbook_eviauto_coverage.json', json_encode([
                'total' => 0,
                'tested' => 0,
                'skipped' => 0,
                'differences' => 0,
                'status' => 'OPEN ISSUE',
                'reason' => 'eviauto contains no records in the available migration test dataset. Golden validation cannot be performed without source records.'
            ], JSON_PRETTY_PRINT));

            $this->markTestSkipped("OPEN ISSUE: eviauto contains no records in the available migration test dataset. Golden validation cannot be performed without source records.");
            return;
        }

        // If populated, logic goes here
        $this->assertTrue(false, "Unexpectedly found EviAuto records, independent test logic must be implemented here.");
    }
}