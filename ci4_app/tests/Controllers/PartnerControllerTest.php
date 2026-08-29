<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;

class PartnerControllerTest extends CIUnitTestCase
{
    use DatabaseTestTrait, FeatureTestTrait;

    protected $refresh = true;
    protected $namespace = 'App';

    protected function setUp(): void
    {
        parent::setUp();
        $db = \Config\Database::connect();
        $db->table('partner')->truncate();
        $db->table('udaje')->truncate();
    }

    public function testGetPartnersEndpoint()
    {
        $db = \Config\Database::connect();
        $db->table('partner')->insert(['kodop' => 99, 'firma' => 'API Firma']);

        $result = $this->get('partners/api');

        $result->assertStatus(200);
        $result->assertJSONFragment(['firma' => 'API Firma']);
    }

    public function testCreatePartnerEndpoint()
    {
        $result = $this->post('partners/api', [
            'kodop' => 100,
            'firma' => 'New API Firma'
        ]);

        $result->assertStatus(201);
        $result->assertJSONFragment(['success' => true]);

        $db = \Config\Database::connect();
        $row = $db->table('partner')->where('kodop', 100)->get()->getRowArray();
        $this->assertEquals('New API Firma', $row['firma']);
    }

    public function testUpdateUdajeEndpoint()
    {
        $result = $this->post('partners/api/udaje', [
            'nazov' => 'Test API Udaje'
        ]);

        $result->assertStatus(200);
        $result->assertJSONFragment(['success' => true]);

        $result2 = $this->get('partners/api/udaje');
        $result2->assertStatus(200);
        $result2->assertJSONFragment(['nazov' => 'Test API Udaje']);
    }
}
