<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

class CashbookWebControllerTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    protected function setUp(): void
    {
        parent::setUp();
        // Let it run!
    }

    public function testWebIndexReturns200AndContainsBasicInfo()
    {
        $result = $this->call('get', '/cashbook', ['year' => 2026]);

        $result->assertStatus(200);
        $result->assertSee('Peňažný denník (Cashbook)');
        $result->assertSee('Pridať nový záznam');
    }

    public function testCreatePageLoads()
    {
        $result = $this->call('get', '/cashbook/create', ['year' => 2026]);

        $result->assertStatus(200);
        $result->assertSee('Nový záznam');
        $result->assertSee('Číslo dokladu');
    }

    public function testStoreValidatesInput()
    {
        // Try to store with missing required fields
        $result = $this->call('post', '/cashbook/store', [
            'a' => '',
            'b' => '',
            'kodop' => ''
        ]);

        // Validation fails, redirects back
        $result->assertRedirect();
        $this->assertTrue(session()->has('errors'));
    }

    public function testStoreSuccess()
    {
        // Add a test entry
        $data = [
            'a' => '2026-08-01',
            'b' => 'TEST-001',
            'kodop' => 1,
            'd' => 'Test',
            'a2' => '100.50'
        ];

        $result = $this->call('post', '/cashbook/store', $data);

        $result->assertRedirectTo('/cashbook?year=2026');
        $this->assertTrue(session()->has('success'));

        // Clean up
        $db = \Config\Database::connect();
        $db->table('pd')->where('b', 'TEST-001')->delete();
    }

    public function testStoreNumericValidation()
    {
        $result = $this->call('post', '/cashbook/store', [
            'a' => '2026-08-01',
            'b' => 'TEST-002',
            'kodop' => 1,
            'a1' => 'invalid_number'
        ]);

        $result->assertRedirect();
        $this->assertTrue(session()->has('errors'));
    }

    public function testEditPageLoads()
    {
        // Add a temporary entry to test edit page
        $db = \Config\Database::connect();
        $db->table('pd')->insert([
            'b' => 'TEST-EDIT',
            // '_year' => 2026,
            'a' => '2026-08-01',
            'kodop' => 1
        ]);

        $result = $this->call('get', '/cashbook/edit/TEST-EDIT/2026');
        $result->assertStatus(200);
        $result->assertSee('TEST-EDIT');

        // Cleanup
        $db->table('pd')->where('b', 'TEST-EDIT')->delete();
    }

    public function testUpdateValidatesInput()
    {
        $result = $this->call('post', '/cashbook/update/TEST-EDIT/2026', [
            'a' => '',
            'kodop' => ''
        ]);

        $result->assertRedirect();
        $this->assertTrue(session()->has('errors'));
    }

    public function testYearScopeIsRespected()
    {
        $result = $this->call('get', '/cashbook', ['year' => 2024]);
        $result->assertStatus(200);

        // Assert that the year input field defaults to 2024
        $result->assertSee('value="2024"');
    }


    public function testSummaryRendering()
    {
        // Insert dummy initial state
        $db = \Config\Database::connect();
        $db->table('pocstav')->insert([
            'a' => '2026-01-01',
            'b' => '001-2026',
            'ph' => 500,
            'pu' => 1000
        ]);

        $result = $this->call('get', '/cashbook', ['year' => 2026]);
        $result->assertStatus(200);

        // Check if initial state is rendered in summary box
        $result->assertSee('500.00'); // ph
        $result->assertSee('1000.00'); // pu

        // Cleanup
        $db->table('pocstav')->where('b', '001-2026')->delete();
    }

    public function testYearScopeFiltersEntries()
    {
        $db = \Config\Database::connect();
        $db->table('pd')->insert([
            'b' => 'TEST-2025',
            // '_year' => 2025,
            'a' => '2025-08-01',
            'kodop' => 1
        ]);

        $result = $this->call('get', '/cashbook', ['year' => 2026]);
        $result->assertStatus(200);

        // Assert that the entry from 2025 is NOT visible
        $result->assertDontSee('TEST-2025');

        // Cleanup
        $db->table('pd')->where('b', 'TEST-2025')->delete();
    }
}