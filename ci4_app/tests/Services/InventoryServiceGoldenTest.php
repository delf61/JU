<?php

namespace Tests\Services;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Services\InventoryService;

class InventoryServiceGoldenTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    // We want to test against the real migration db.
    protected $migrate = false;
    protected $migrateOnce = false;
    protected $refresh = false;
    protected $seed = '';

    protected function setUp(): void
    {
        parent::setUp();

        // Ensure MariaDB is available, otherwise skip
        $db = \Config\Database::connect();
        try {
            $db->connect();
        } catch (\Exception $e) {
            $this->markTestSkipped('Database connection failed. Skipping golden tests.');
        }
    }

    public function testInventoryGoldenValidation()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sklad');
        $rawRecords = $builder->get()->getResultArray();

        $availableCount = count($rawRecords);
        if ($availableCount === 0) {
            $this->markTestSkipped('No records found in sklad for Golden validation.');
        }

        // We will test all records available, as there are no 2026 records.
        // We will verify the FAND logic holds true for the entire historical dataset.

        $service = new InventoryService();
        $testedCount = 0;
        $skippedCount = 0;
        $differences = [];

        foreach ($rawRecords as $raw) {
            // Recompute expected based on strictly FAND rules
            $nakupcena = (float)$raw['nakupcena'];
            $dph = (float)$raw['dph'];
            $mnozstvo = (float)$raw['mnozstvo'];

            // FAND logic: DPH_Sk := (nakupcena * (dph/100)) round 1
            $expectedDphSk = round($nakupcena * ($dph / 100), 1);

            // FAND logic: s_DPH := nakupcena + DPH_Sk
            $expectedSDph = $nakupcena + $expectedDphSk;

            // FAND logic: spolu := nakupcena * mnozstvo
            $expectedSpolu = $nakupcena * $mnozstvo;

            // FAND logic: zaruka_do := addmonth(a, mes)
            $expectedZarukaDo = null;
            if (!empty($raw['a']) && $raw['a'] !== '0000-00-00') {
                $mes = (int)$raw['mes'];
                $date = new \DateTime($raw['a']);
                if ($mes > 0) {
                    $date->modify("+{$mes} months");
                }
                $expectedZarukaDo = $date->format('Y-m-d');
            }

            // Process through service
            $processed = $service->calculateDerivedFields($raw);

            $testedCount++;

            $diffs = [];

            if (abs($processed['DPH_Sk'] - $expectedDphSk) > 0.001) {
                $diffs['DPH_Sk'] = "Expected {$expectedDphSk}, got {$processed['DPH_Sk']}";
            }
            if (abs($processed['s_DPH'] - $expectedSDph) > 0.001) {
                $diffs['s_DPH'] = "Expected {$expectedSDph}, got {$processed['s_DPH']}";
            }
            if (abs($processed['spolu'] - $expectedSpolu) > 0.001) {
                $diffs['spolu'] = "Expected {$expectedSpolu}, got {$processed['spolu']}";
            }
            if ($processed['zaruka_do'] !== $expectedZarukaDo) {
                $diffs['zaruka_do'] = "Expected {$expectedZarukaDo}, got {$processed['zaruka_do']}";
            }

            if (!empty($diffs)) {
                $differences[$raw['b']] = $diffs;
            }
        }

        $report = "Golden Test Report:\n";
        $report .= "- Source table: sklad\n";
        $report .= "- Target period: Historical dataset (all records, no 2026 data present)\n";
        $report .= "- Records available: $availableCount\n";
        $report .= "- Records tested: $testedCount\n";
        $report .= "- Records skipped: $skippedCount\n";
        $report .= "- Differences found: " . count($differences) . "\n";

        file_put_contents('../INVENTORY_GOLDEN_COVERAGE_HISTORICAL.md', $report);

        $this->assertEmpty($differences, "Golden validation failed for " . count($differences) . " records. See logs.");
    }
}
