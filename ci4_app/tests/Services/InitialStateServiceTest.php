<?php

namespace Tests\App\Services;

use App\Models\PocstavModel;
use App\Services\InitialStateService;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

class InitialStateServiceTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $refresh = true;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new PocstavModel();
        $this->service = new InitialStateService();
    }

    public function testCreateInitialStateGeneratesDocumentNumberAndDefaults()
    {
        $data = [
            'a' => '2026-01-01',
            'ph' => 150.50
        ];

        $this->service->createInitialState($data);

        $inserted = $this->model->where('a', '2026-01-01')->first();

        $this->assertNotNull($inserted);
        $this->assertEquals('00-001-2026', $inserted['b']);
        $this->assertEquals(150.50, $inserted['ph']);
        $this->assertEquals(0.00, $inserted['pu']); // default
        $this->assertEquals(0.00, $inserted['m']);  // default
    }

    public function testUpdateInitialStatePreservesDocumentNumber()
    {
        $this->model->insert([
            'a' => '2026-01-01',
            'b' => '00-001-2026',
            'ph' => 100.00
        ]);

        $this->service->updateInitialState('2026-01-01', ['ph' => 200.00]);

        $updated = $this->model->where('a', '2026-01-01')->first();

        $this->assertEquals(200.00, $updated['ph']);
        $this->assertEquals('00-001-2026', $updated['b']);
    }
}
