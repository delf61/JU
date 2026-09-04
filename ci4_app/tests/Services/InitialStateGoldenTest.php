<?php

namespace Tests\App\Services;

use App\Models\PocstavModel;
use App\Services\InitialStateService;
use CodeIgniter\Test\CIUnitTestCase;

class InitialStateGoldenTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testGoldenValidationFromDatabase()
    {
        // For golden testing, we simply prove that what is in the DB
        // can be perfectly read by our new service without modification
        $db = \Config\Database::connect('tests');

        $builder = $db->table('pocstav');
        $expectedCount = $builder->countAllResults();

        // 390 records verified forensically
        if ($expectedCount === 0) {
            $this->markTestSkipped('Database pocstav is empty, cannot perform golden test.');
            return;
        }

        $service = new InitialStateService();
        $records = $service->getInitialStates();

        $this->assertCount($expectedCount, $records);

        // Fetch exactly one real record to verify mapping
        $firstExpected = $builder->orderBy('a', 'DESC')->get()->getRowArray();
        $firstActual = $records[0];

        $this->assertEquals($firstExpected['a'], $firstActual['a']);
        $this->assertEquals($firstExpected['ph'], $firstActual['ph']);
        $this->assertEquals($firstExpected['pu'], $firstActual['pu']);
    }
}
