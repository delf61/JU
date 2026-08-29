<?php

namespace App\Services;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\KrajeModel;
use App\Models\OkresyModel;
use Exception;

class DictionaryServiceTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $migrate = false;
    protected $migrateOnce = false;
    protected $refresh = false;

    protected $service;
    protected $krajeModel;
    protected $okresyModel;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new DictionaryService();
        $this->krajeModel = new KrajeModel();
        $this->okresyModel = new OkresyModel();
    }

    public function testGetAllKraje()
    {
        $kraje = $this->service->getAll('kraje');
        $this->assertIsArray($kraje);
        // We know ju_migration_test contains data from the dump
        $this->assertGreaterThan(0, count($kraje));
    }

    public function testOkresCreateUpdatesKrajTotals()
    {
        // Setup initial kraj
        $krajData = ['kodkra' => 'T', 'nazov' => 'TestKraj', 'km2' => 100, 'oby' => 1000];
        $this->service->create('kraje', $krajData);

        // Create okres under this kraj
        $okresData = ['kodokr' => 'T1', 'nazov' => 'TestOkres', 'kodkra' => 'T', 'km2' => 50, 'oby' => 500];
        $this->service->create('okresy', $okresData);

        // Verify kraj was updated
        $updatedKraj = $this->service->getById('kraje', 'T');
        $this->assertEquals(150, $updatedKraj['km2']);
        $this->assertEquals(1500, $updatedKraj['oby']);

        // Clean up
        $this->service->delete('okresy', 'T1');
        $this->service->delete('kraje', 'T');
    }

    public function testOkresUpdateAdjustsKrajTotals()
    {
        $this->service->create('kraje', ['kodkra' => 'U', 'nazov' => 'TestKrajU', 'km2' => 100, 'oby' => 1000]);
        $this->service->create('okresy', ['kodokr' => 'U1', 'nazov' => 'TestOkresU', 'kodkra' => 'U', 'km2' => 50, 'oby' => 500]);

        // Update okres
        $this->service->update('okresy', 'U1', ['km2' => 70, 'oby' => 600]);

        $updatedKraj = $this->service->getById('kraje', 'U');
        // Initial 100 + 50 (create) = 150. Then update (70-50=20) -> 170.
        $this->assertEquals(170, $updatedKraj['km2']);
        $this->assertEquals(1600, $updatedKraj['oby']);

        // Clean up
        $this->service->delete('okresy', 'U1');
        $this->service->delete('kraje', 'U');
    }

    public function testOkresDeleteAdjustsKrajTotals()
    {
        $this->service->create('kraje', ['kodkra' => 'D', 'nazov' => 'TestKrajD', 'km2' => 100, 'oby' => 1000]);
        $this->service->create('okresy', ['kodokr' => 'D1', 'nazov' => 'TestOkresD', 'kodkra' => 'D', 'km2' => 50, 'oby' => 500]);

        // Delete okres
        $this->service->delete('okresy', 'D1');

        $updatedKraj = $this->service->getById('kraje', 'D');
        // Initial 100 + 50 (create) = 150. Delete (-50) -> 100.
        $this->assertEquals(100, $updatedKraj['km2']);
        $this->assertEquals(1000, $updatedKraj['oby']);

        $this->service->delete('kraje', 'D');
    }

    public function testCannotDeleteKrajWithOkresy()
    {
        $this->service->create('kraje', ['kodkra' => 'P', 'nazov' => 'ProtectKraj', 'km2' => 100, 'oby' => 1000]);
        $this->service->create('okresy', ['kodokr' => 'P1', 'nazov' => 'ProtectOkres', 'kodkra' => 'P', 'km2' => 50, 'oby' => 500]);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Cannot delete Kraje because it has associated Okresy.");

        try {
            $this->service->delete('kraje', 'P');
        } finally {
            // Clean up manually since exception was thrown
            $this->service->delete('okresy', 'P1');
            $this->service->delete('kraje', 'P');
        }
    }
}
