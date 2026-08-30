<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;

class ReceivableControllerTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected $refresh = true;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testIndexReturnsAllReceivables()
    {
        $db = \Config\Database::connect();
        $db->table('kp')->insert([
            'a' => '2023-01-01',
            'b' => 'INV-01',
            'kodop' => 123,
            'z' => 100,
            'dph' => 20
        ]);

        $result = $this->call('GET', 'invoices/receivables');

        $result->assertStatus(200);
        $result->assertJSONFragment(['a' => '2023-01-01', 'b' => 'INV-01']);
    }

    public function testShowReturnsInvoiceWithItems()
    {
        $db = \Config\Database::connect();
        $db->table('kp')->insert([
            'a' => '2023-01-01',
            'b' => 'INV-02'
        ]);
        $db->table('kppol')->insert([
            'a' => '2023-01-01',
            'b' => 'INV-02',
            'c' => '2023-01-01',
            'd' => 'INV-02',
            'intkodtov' => 1
        ]);

        $result = $this->call('GET', 'invoices/receivables/2023-01-01/INV-02');

        $result->assertStatus(200);
        $result->assertJSONFragment(['b' => 'INV-02']);
        $result->assertJSONFragment(['intkodtov' => '1']); // depending on DB driver, might be string or int
    }

    public function testCalculateStatus()
    {
        $db = \Config\Database::connect();
        $db->table('kp')->insert([
            'a' => '2023-01-01',
            'b' => 'INV-03',
            'z' => 100,
            'vyrovn' => 0,
            'dph' => 20,
            'pc' => 60 // Partially paid
        ]);

        $result = $this->call('GET', 'invoices/receivables/2023-01-01/INV-03/status');

        $result->assertStatus(200);
        $result->assertJSONExact([
            'zn' => 120, // 100 + 20
            'dph_sk' => 20,
            'uhrada' => 60,
            'status' => '<' // partially paid
        ]);
    }

    public function testCreateReceivable()
    {
        $db = \Config\Database::connect();
        $payload = [
            'a' => '2023-01-05',
            'b' => 'INV-05',
            'kodop' => 456,
            'items' => [
                ['intkodtov' => 10, 'mnozstvo' => 2],
                ['intkodtov' => 11, 'mnozstvo' => 5]
            ]
        ];

        $result = $this->call('POST', 'invoices/receivables', json_encode($payload));
        $result->assertStatus(201);

        $this->seeInDatabase('kp', ['b' => 'INV-05']);
        $this->seeInDatabase('kppol', ['d' => 'INV-05', 'intkodtov' => 10]);
        $this->seeInDatabase('kppol', ['d' => 'INV-05', 'intkodtov' => 11]);
    }

    public function testUpdateReceivable()
    {
        $db = \Config\Database::connect();
        $db->table('kp')->insert([
            'a' => '2023-01-01',
            'b' => 'INV-06',
            'n' => 'Old text'
        ]);

        $payload = ['n' => 'Updated text'];
        $result = $this->call('PUT', 'invoices/receivables/2023-01-01/INV-06', json_encode($payload));
        $result->assertStatus(200);

        $this->seeInDatabase('kp', ['b' => 'INV-06', 'n' => 'Updated text']);
    }

    public function testDeleteReceivable()
    {
        $db = \Config\Database::connect();
        $db->table('kp')->insert([
            'a' => '2023-01-01',
            'b' => 'INV-07'
        ]);
        $db->table('kppol')->insert([
            'a' => '2023-01-01',
            'b' => 'INV-07',
            'c' => '2023-01-01',
            'd' => 'INV-07',
            'intkodtov' => 1
        ]);

        $result = $this->call('DELETE', 'invoices/receivables/2023-01-01/INV-07');
        $result->assertStatus(200);

        $this->dontSeeInDatabase('kp', ['b' => 'INV-07']);
        $this->dontSeeInDatabase('kppol', ['d' => 'INV-07']);
    }
}
