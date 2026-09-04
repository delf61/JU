<?php

namespace Tests\App\Models;

use App\Models\PocstavModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

class PocstavModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testCanInstantiateModel()
    {
        $model = new PocstavModel();
        $this->assertInstanceOf(PocstavModel::class, $model);
    }
}
