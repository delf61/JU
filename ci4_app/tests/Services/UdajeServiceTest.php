<?php

namespace Tests\Services;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Services\UdajeService;

class UdajeServiceTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $refresh = true;
    protected $namespace = 'App';
    protected $udajeService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->udajeService = new UdajeService();
        $db = \Config\Database::connect();
        $db->table('udaje')->truncate();
    }

    public function testCreateUdaje()
    {
        $data = [
            'nazov' => 'Moja Firma',
            'ico' => '12345678'
        ];

        $result = $this->udajeService->updateUdaje($data);

        $this->assertTrue($result['success']);

        $saved = $this->udajeService->getUdaje();
        $this->assertNotNull($saved);
        $this->assertEquals('Moja Firma', $saved['nazov']);
    }

    public function testUpdateExistingUdaje()
    {
        $this->udajeService->updateUdaje(['nazov' => 'First']);

        $result = $this->udajeService->updateUdaje(['nazov' => 'Second']);
        $this->assertTrue($result['success']);

        $saved = $this->udajeService->getUdaje();
        $this->assertEquals('Second', $saved['nazov']);

        // Ensure there is only one row
        $db = \Config\Database::connect();
        $count = $db->table('udaje')->countAll();
        $this->assertEquals(1, $count);
    }
}
