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
        $db = \Config\Database::connect();
        $builder = $db->table('elsasa');

        $records = $builder->orderBy('mr', 'ASC')->get()->getResultArray();

        if (count($records) === 0) {
            $this->markTestSkipped('No records for Elsasa.');
        }

        $tested = 0;
        $previousRecord = null;

        foreach ($records as $record) {
            $year = date('Y', strtotime($record['mr']));
            if ($year != 2020 && $year != 2005) continue; // Sample valid years

            $result = $this->service->calculateVyuctSSE($record, $previousRecord);

            // Re-calculate expected independently
            $prevVal = $previousRecord ? (int) $previousRecord['el_v'] : 0;
            if (!empty($record['vymena'])) $prevVal = (int) $record['el_v'];

            $expectedSpotreba = max(0, (int) $record['el_v'] - $prevVal);
            $expectedSuma = round($expectedSpotreba * (float)$record['sk_v'] * (1 + ((float)$record['dph'] / 100)), 2);

            $this->assertEqualsWithDelta($expectedSpotreba, $result['spotreba_v'], 0.01, 'Spotreba mismatch');
            $this->assertEqualsWithDelta($expectedSuma, $result['sk_spolu_v'], 0.01, 'Suma mismatch');

            $previousRecord = $record;
            $tested++;
        }

        $this->assertGreaterThan(0, $tested, 'No records tested for Elsasa Golden');
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
            $year = date('Y', strtotime($record['mr']));

            $result = $this->service->calculateVyucH2OSasa($record, $previousRecord);

            $prevVal = $previousRecord ? (int) $previousRecord['h2o_v'] : 0;
            if ((int)$record['h2o_v'] <= $prevVal) $prevVal = 0;

            $expectedSpotreba = max(0, (int) $record['h2o_v'] - $prevVal);
            $expectedSuma = round($expectedSpotreba * (float)$record['sk_v'] * (1 + ((float)$record['dph'] / 100)), 2);

            $this->assertEqualsWithDelta($expectedSpotreba, $result['spotreba'], 0.01, 'Spotreba mismatch');
            $this->assertEqualsWithDelta($expectedSuma, $result['sk_spolu_v'], 0.01, 'Suma mismatch');

            $previousRecord = $record;
            $tested++;
        }

        $this->assertGreaterThan(0, $tested, 'No records tested for H2O Golden');
    }
}
