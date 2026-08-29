<?php

namespace Tests\Services;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Services\PartnerService;
use App\Models\PartnerModel;

class PartnerServiceTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $refresh = true;
    protected $namespace = 'App';
    protected $partnerService;

    protected function setUp(): void
    {
        parent::setUp();
        // Since test db is ju_migration_test and is empty or populated from migration, we'll ensure we test with clear data.
        $this->partnerService = new PartnerService();
        $db = \Config\Database::connect();
        // Clean table to be sure
        $db->table('partner')->truncate();
    }

    public function testCreatePartner()
    {
        $data = [
            'kodop' => 10,
            'firma' => 'Test Firma',
            'meno' => 'Jozef',
        ];

        $result = $this->partnerService->createPartner($data);

        $this->assertTrue($result['success']);
        $this->assertEquals(10, $result['kodop']);

        $model = new PartnerModel();
        $saved = $model->find(10);
        $this->assertNotNull($saved);
        $this->assertEquals('Test Firma', $saved['firma']);
    }

    public function testGetPartners()
    {
        $this->partnerService->createPartner(['kodop' => 1, 'firma' => 'A']);
        $this->partnerService->createPartner(['kodop' => 2, 'firma' => 'B']);

        $partners = $this->partnerService->getAllPartners();
        $this->assertCount(2, $partners);
    }

    public function testUpdatePartner()
    {
        $this->partnerService->createPartner(['kodop' => 5, 'firma' => 'Old']);

        $result = $this->partnerService->updatePartner(5, ['firma' => 'New']);
        $this->assertTrue($result['success']);

        $partner = $this->partnerService->getPartner(5);
        $this->assertEquals('New', $partner['firma']);
    }

    public function testDeletePartner()
    {
        $this->partnerService->createPartner(['kodop' => 1, 'firma' => 'A']);

        $result = $this->partnerService->deletePartner(1);
        $this->assertTrue($result['success']);

        $partner = $this->partnerService->getPartner(1);
        $this->assertNull($partner);
    }
}
