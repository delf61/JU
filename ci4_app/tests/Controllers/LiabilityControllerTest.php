<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;

class LiabilityControllerTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected $refresh = true;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testIndexReturnsAllLiabilities()
    {
        $db = \Config\Database::connect();
        $db->table('kz')->insert([
            'a' => '2023-02-01',
            'b' => 'LIA-01'
        ]);

        $result = $this->call('GET', 'invoices/liabilities');

        $result->assertStatus(200);
        $result->assertJSONFragment(['a' => '2023-02-01', 'b' => 'LIA-01']);
    }

    public function testShowReturnsLiabilityWithItems()
    {
        $db = \Config\Database::connect();
        $db->table('kz')->insert([
            'a' => '2023-02-01',
            'b' => 'LIA-02'
        ]);
        $db->table('kzpol')->insert([
            'a' => '2023-02-01',
            'b' => 'LIA-02',
            'intkodtov' => 55
        ]);

        $result = $this->call('GET', 'invoices/liabilities/2023-02-01/LIA-02');

        $result->assertStatus(200);
        $result->assertJSONFragment(['b' => 'LIA-02']);
        $result->assertJSONFragment(['intkodtov' => '55']);
    }

    public function testCalculateStatus()
    {
        $db = \Config\Database::connect();
        $db->table('kz')->insert([
            'a' => '2023-02-01',
            'b' => 'LIA-03',
            'x' => 50,
            'y' => 100, // 10% VAT -> 10
            'z' => 200, // 20% VAT -> 40
            'dph' => 20,
            'dph_1' => 10,
            'pc' => 400 // Fully paid
        ]);

        $result = $this->call('GET', 'invoices/liabilities/2023-02-01/LIA-03/status');

        $result->assertStatus(200);
        $result->assertJSONExact([
            'zn' => 400, // 50 + 110 + 240
            'dph_sk' => 40,
            'dph_sk1' => 10,
            'uhrada' => 400,
            'status' => '■' // fully paid
        ]);
    }

    public function testCreateLiability()
    {
        $db = \Config\Database::connect();
        $payload = [
            'a' => '2023-02-05',
            'b' => 'LIA-05',
            'kodop' => 456,
            'items' => [
                ['intkodtov' => 10, 'mnozstvo' => 2],
                ['intkodtov' => 11, 'mnozstvo' => 5]
            ]
        ];

        $result = $this->call('POST', 'invoices/liabilities', json_encode($payload));
        $result->assertStatus(201);

        $this->seeInDatabase('kz', ['b' => 'LIA-05']);
        $this->seeInDatabase('kzpol', ['b' => 'LIA-05', 'intkodtov' => 10]);
        $this->seeInDatabase('kzpol', ['b' => 'LIA-05', 'intkodtov' => 11]);
    }

    public function testUpdateLiability()
    {
        $db = \Config\Database::connect();
        $db->table('kz')->insert([
            'a' => '2023-02-01',
            'b' => 'LIA-06',
            'n' => 'Old text'
        ]);

        $payload = ['n' => 'Updated text'];
        $result = $this->call('PUT', 'invoices/liabilities/2023-02-01/LIA-06', json_encode($payload));
        $result->assertStatus(200);

        $this->seeInDatabase('kz', ['b' => 'LIA-06', 'n' => 'Updated text']);
    }

    public function testDeleteLiability()
    {
        $db = \Config\Database::connect();
        $db->table('kz')->insert([
            'a' => '2023-02-01',
            'b' => 'LIA-07'
        ]);
        $db->table('kzpol')->insert([
            'a' => '2023-02-01',
            'b' => 'LIA-07',
            'intkodtov' => 1
        ]);

        $result = $this->call('DELETE', 'invoices/liabilities/2023-02-01/LIA-07');
        $result->assertStatus(200);

        $this->dontSeeInDatabase('kz', ['b' => 'LIA-07']);
        $this->dontSeeInDatabase('kzpol', ['b' => 'LIA-07']);
    }
}
