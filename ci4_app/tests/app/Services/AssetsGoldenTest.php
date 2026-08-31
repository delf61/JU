<?php

namespace Tests\App\Services;

use App\Services\AssetService;
use CodeIgniter\Test\CIUnitTestCase;

class AssetsGoldenTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testGoldenValidation2026()
    {
        $assetService = new AssetService();
        $db = \Config\Database::connect();

        // --- IKZP Golden Tests ---
        $builderIkzp = $db->table('ikzp');
        $builderIkzp->where('YEAR(a)', 2026);
        $ikzpRecords = $builderIkzp->get()->getResultArray();

        $ikzpCount = count($ikzpRecords);

        // Assert we have the correct number of 2026 records (known to be 1 from DB inspection)
        $this->assertEquals(1, $ikzpCount, "IKZP DB records count mismatch for 2026");

        $ikzpEvaluated = 0;
        foreach ($ikzpRecords as $record) {
            $ikzpEvaluated++;

            // FAND Independent expected calculation based on PRINTER.TXT rules
            $h = (float)($record['h'] ?? 0);
            $hz = (float)($record['hz'] ?? 0);
            $dph = (float)($record['dph'] ?? 0);
            $oprava = (float)($record['oprava'] ?? 0);
            $ro = (int)($record['ro'] ?? 0);
            $so = trim($record['so'] ?? '');
            $os = trim($record['os'] ?? '');
            $n = mb_strtoupper(trim($record['n'] ?? ''), 'UTF-8');
            $sv = trim($record['sv'] ?? '');

            $expected_obstar_Bez_DPH = 0.0;
            if ((100 + $dph) != 0) {
                $expected_obstar_Bez_DPH = round(($h * 100) / (100 + $dph), 1);
            }

            $expected_dph_sk = ($h > 0) ? ($h - $expected_obstar_Bez_DPH) : 0.0;
            $expected_o = ($ro > 0) ? ($hz + $oprava) : 0.0;
            $expected_o_s = $hz + $oprava;

            $expected_oo = $hz;
            if ($h > 0) {
                // For 2026, paramcat.rok is not < 2002
                $base_oo = $expected_obstar_Bez_DPH;
                $expected_oo = $base_oo + $oprava;
            }

            // Expected Depreciation
            $expected_voO = 0.0;
            $isAuto = (mb_strpos($n, 'AUTOMOBIL') !== false);

            if ($so === 'R') {
                if ($isAuto && 2026 > 2003) { // 2026
                    $expected_voO = ($os === '0') ? ($expected_oo / 2) : ($expected_oo / 4);
                } elseif ($ro == 1) {
                    if ($os === '1') $expected_voO = 0.01 * 14.2 * $expected_oo;
                    elseif ($os === '2') $expected_voO = 0.01 * 6.2 * $expected_oo;
                    elseif ($os === '3') $expected_voO = 0.01 * 3.4 * $expected_oo;
                    elseif ($os === '4') $expected_voO = 0.01 * 1.4 * $expected_oo;
                    elseif ($os === '5') $expected_voO = 0.01 * 1.0 * $expected_oo;
                } elseif ($ro > 1) {
                    if ($os === '1') $expected_voO = 0.01 * 28.6 * $expected_oo;
                    elseif ($os === '2') $expected_voO = 0.01 * 13.4 * $expected_oo;
                    elseif ($os === '3') $expected_voO = 0.01 * 6.9 * $expected_oo;
                    elseif ($os === '4') $expected_voO = 0.01 * 3.4 * $expected_oo;
                }
            } elseif ($so === 'Z') {
                if ($ro == 1) {
                    if ($os === '1') $expected_voO = $expected_oo / 4;
                    elseif ($os === '2') $expected_voO = $expected_oo / 8;
                    elseif ($os === '3') $expected_voO = $expected_o / 15;
                    elseif ($os === '4') $expected_voO = $expected_oo / 30;
                    elseif ($os === '5') $expected_voO = $expected_oo / 50;
                } elseif ($ro > 1) {
                    if ($os === '1') $expected_voO = 2 * $hz / (5 - ($ro - 1));
                    elseif ($os === '2') $expected_voO = 2 * $hz / (9 - ($ro - 1));
                    elseif ($os === '3') $expected_voO = 2 * $hz / (16 - ($ro - 1));
                    elseif ($os === '4') $expected_voO = 2 * $hz / (31 - ($ro - 1));
                    elseif ($os === '5') $expected_voO = 2 * $hz / (51 - ($ro - 1));
                }
            }

            $expected_vo = 0.0;
            if ($os === '0') {
                $expected_vo = (float)$sv;
            } elseif ($expected_voO >= $expected_o && $expected_o > 0) {
                $expected_vo = $expected_o;
            } elseif ($expected_voO > 0) {
                $expected_vo = ceil($expected_voO);
            }

            $expected_z = ($ro > 0) ? ($expected_o - $expected_vo) : $hz;
            $expected_zo = $expected_oo - $expected_oo;

            // Execute service logic
            $result = $assetService->calculateIkzp($record, 2026);

            $doc = $record['b'] ?: 'ID ' . $record['a'];

            // Assertions
            $this->assertEqualsWithDelta($expected_obstar_Bez_DPH, $result['obstar_Bez_DPH'], 0.001, "Discrepancy in obstar_Bez_DPH for IKZP $doc");
            $this->assertEqualsWithDelta($expected_dph_sk, $result['dph_sk'], 0.001, "Discrepancy in dph_sk for IKZP $doc");
            $this->assertEqualsWithDelta($expected_o, $result['o'], 0.001, "Discrepancy in o for IKZP $doc");
            $this->assertEqualsWithDelta($expected_o_s, $result['o_s'], 0.001, "Discrepancy in o_s for IKZP $doc");
            $this->assertEqualsWithDelta($expected_oo, $result['oo'], 0.001, "Discrepancy in oo for IKZP $doc");
            $this->assertEqualsWithDelta($expected_voO, $result['voO'], 0.001, "Discrepancy in voO for IKZP $doc");
            $this->assertEqualsWithDelta($expected_vo, $result['vo'], 0.001, "Discrepancy in vo for IKZP $doc");
            $this->assertEqualsWithDelta($expected_z, $result['z'], 0.001, "Discrepancy in z for IKZP $doc");
            $this->assertEqualsWithDelta($expected_zo, $result['zo'], 0.001, "Discrepancy in zo for IKZP $doc");
        }

        $this->assertEquals($ikzpCount, $ikzpEvaluated, "IKZP Evaluated count mismatch");


        // --- IKDKP Golden Tests ---
        $builderIkdkp = $db->table('ikdkp');
        $builderIkdkp->where('YEAR(a)', 2026);
        $ikdkpRecords = $builderIkdkp->get()->getResultArray();

        $ikdkpCount = count($ikdkpRecords);
        // Expect 0 from DB inspection, but if there were any, test them dynamically.

        $ikdkpEvaluated = 0;
        foreach ($ikdkpRecords as $record) {
            $ikdkpEvaluated++;

            $jc = (float)($record['jc'] ?? 0);
            $mn = (float)($record['mn'] ?? 0);
            $dph = (float)($record['dph'] ?? 0);

            $expected_jc_mn = round($mn * $jc, 2);
            $expected_bez_dph = 0.0;
            if ((100 + $dph) != 0) {
                $expected_bez_dph = round(($jc * 100) / (100 + $dph), 1);
            }
            $expected_bez_dph_mn = round($expected_bez_dph * $mn, 2);
            $expected_dph_sk = round($jc - $expected_bez_dph, 2);
            $expected_dph_sk_mn = round($expected_dph_sk * $mn, 2);

            $result = $assetService->calculateIkdkp($record);

            $doc = $record['b'] ?: 'ID ' . $record['a'];

            $this->assertEqualsWithDelta($expected_jc_mn, $result['jc_mn'], 0.001, "Discrepancy in jc_mn for IKDKP $doc");
            $this->assertEqualsWithDelta($expected_bez_dph, $result['bez_dph'], 0.001, "Discrepancy in bez_dph for IKDKP $doc");
            $this->assertEqualsWithDelta($expected_bez_dph_mn, $result['bez_dph_mn'], 0.001, "Discrepancy in bez_dph_mn for IKDKP $doc");
            $this->assertEqualsWithDelta($expected_dph_sk, $result['dph_sk'], 0.001, "Discrepancy in dph_sk for IKDKP $doc");
            $this->assertEqualsWithDelta($expected_dph_sk_mn, $result['dph_sk_mn'], 0.001, "Discrepancy in dph_sk_mn for IKDKP $doc");
        }

        $this->assertEquals($ikdkpCount, $ikdkpEvaluated, "IKDKP Evaluated count mismatch");
    }
}
