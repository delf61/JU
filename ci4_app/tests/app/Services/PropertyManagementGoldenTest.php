<?php

namespace Tests\App\Services;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Services\PropertyManagementService;

class PropertyManagementGoldenTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new PropertyManagementService();
    }

    public function testGoldenElectricity2020()
    {
        $this->markTestSkipped('LIMITED DATASET: Elsasa records do not form a strict contiguous timeline for sequential assertions without external linkage logic.');
    }

    public function testGoldenWater2025()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('h2osasa');

        $records = $builder->orderBy('mr', 'ASC')->get()->getResultArray();

        if (count($records) === 0) {
            $this->markTestSkipped('No records for H2osasa.');
        }

        $tested = 0;
        $previousRecord = null;

        foreach ($records as $record) {
            $result = $this->service->calculateVyucH2OSasa($record, $previousRecord);

            // Assert against the actual legacy snapshot data
            $legacySpotreba = (float)($record['spotreba'] ?? 0.0);

            if ($legacySpotreba > 0) {
                $this->assertEqualsWithDelta($legacySpotreba, $result['spotreba'], 0.01, 'Spotreba mismatch');
            }

            $previousRecord = $record;
            $tested++;
        }

        $this->assertGreaterThan(0, $tested, 'No records tested for H2O Golden');
    }
}
