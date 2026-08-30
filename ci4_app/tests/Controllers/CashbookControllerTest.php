<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;

class CashbookControllerTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->markTestSkipped('BLOCKED - MariaDB unavailable.');
    }

    public function testIndexReturnsJson()
    {
    }

    public function testShowValidatesParameters()
    {
    }

    public function testTotalsReturnsArrayStructure()
    {
    }

    public function testReasonsEndpoint()
    {
    }
}
