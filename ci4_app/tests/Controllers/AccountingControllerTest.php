<?php

namespace Tests\App\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;

class AccountingControllerTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected $refresh = true;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testGetInitialStates()
    {
        $result = $this->get('api/accounting/initial-states');

        $result->assertStatus(200);
    }
}
