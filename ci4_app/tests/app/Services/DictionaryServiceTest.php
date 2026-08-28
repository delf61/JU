<?php

namespace Tests\App\Services;

use CodeIgniter\Test\CIUnitTestCase;
use App\Services\DictionaryService;
use App\Models\KrajeModel;
use App\Models\OkresyModel;
use App\Models\MestaModel;
use App\Models\BankyModel;

class DictionaryServiceTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testBankyCrud()
    {
        $service = new DictionaryService();
        $bankModel = new BankyModel();

        // Ensure clean state
        $bankModel->where('kodban', 'TEST')->delete();

        // Create
        $res = $service->createBanka([
            'kodban' => 'TEST',
            'skratka' => 'TST',
            'popis' => 'Test Bank',
            'arcintcis' => '0'
        ]);
        $this->assertTrue($res['success']);

        // Read
        $bank = $service->getBanka('TEST');
        $this->assertEquals('Test Bank', $bank['popis']);

        // Update
        $res = $service->updateBanka('TEST', ['popis' => 'Updated Bank']);
        $this->assertTrue($res['success']);
        $bank = $service->getBanka('TEST');
        $this->assertEquals('Updated Bank', $bank['popis']);

        // Delete
        $res = $service->deleteBanka('TEST');
        $this->assertTrue($res['success']);
        $this->assertNull($service->getBanka('TEST'));
    }

    public function testKrajOkresDependency()
    {
        $service = new DictionaryService();
        $krajModel = new KrajeModel();
        $okresModel = new OkresyModel();

        $krajModel->where('kodkra', 'X')->delete();
        $okresModel->where('kodokr', 'XY')->delete();

        $service->createKraj(['kodkra' => 'X', 'nazov' => 'Test Kraj']);

        // Cannot delete Kraj because Okres is bound? Not yet, let's bind one.
        $service->createOkres(['kodokr' => 'XY', 'nazov' => 'Test Okres', 'kodkra' => 'X', 'km2' => 10, 'oby' => 100]);

        $res = $service->deleteKraj('X');
        $this->assertFalse($res['success']);
        $this->assertArrayHasKey('kodkra', $res['errors']);

        // Clean up
        $service->deleteOkres('XY');
        $res = $service->deleteKraj('X');
        $this->assertTrue($res['success']);
    }
}
