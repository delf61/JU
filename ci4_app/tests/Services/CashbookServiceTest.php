<?php

namespace Tests\Services;

use CodeIgniter\Test\CIUnitTestCase;
use App\Services\CashbookService;

class CashbookServiceTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->markTestSkipped('BLOCKED - MariaDB unavailable.');
    }

    public function testCalculateVatSkk()
    {
    }

    public function testCalculateVatEur()
    {
    }

    public function testCalculateTotals()
    {
    }
}
