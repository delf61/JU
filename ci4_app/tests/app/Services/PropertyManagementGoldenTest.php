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
            $result = $this->service->calculateVyuctSSE($record, $previousRecord);

            // Assert against the actual legacy snapshot data
            $legacySpotreba = (float)($record['spotreba_v'] ?? 0.0);

            if ($legacySpotreba > 0) {
                $this->assertEqualsWithDelta($legacySpotreba, $result['spotreba_v'], 0.01, 'Spotreba mismatch');
            }

            // Pausal logic wasn't persistently stored back in the DB fields correctly in all cases for legacy,
            // so we mainly validate the spotreba math matching historical DB records exactly.

            // Note: FAND logic states: el_na_konci_v := cond (vymena : el_v, else : elsa_K.el_v)
            // Meaning if vymena is true, the NEXT record's previous value is set to the current el_v.
            // Our Service doesn't hold state, so we pass state via the loop.
            $vymena = (bool) ($record['vymena'] ?? false);
            if ($vymena) {
                // If vymena occurred, the NEXT previous record acts as if it ended at 0 or current el_v
                // The DB logic for vymena effectively resets the counter diff for the subsequent month.
                // We mock it by tricking the loop state if needed, though for pure spotreba assertion, we just pass the raw record.
            }

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
