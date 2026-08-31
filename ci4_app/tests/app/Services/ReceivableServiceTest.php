<?php

namespace Tests\App\Services;

use App\Services\ReceivableService;
use CodeIgniter\Test\CIUnitTestCase;

class ReceivableServiceTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testCalculateStatus2026ExactMatch()
    {
        $service = new ReceivableService();
        $invoice = [
            'z' => 100,
            'dph' => 20,
            'vyrovn' => 0,
            'pc' => 120, // 100 + 20
        ];
        $result = $service->calculateStatus($invoice, 2026);

        $this->assertEquals(120.0, $result['zn']);
        $this->assertEquals('■', $result['status']);
    }

    public function testCalculateStatus2026WithVyrovn()
    {
        $service = new ReceivableService();
        $invoice = [
            'z' => 100,
            'dph' => 20,
            'vyrovn' => 0.05,
            'pc' => 120.05,
        ];
        $result = $service->calculateStatus($invoice, 2026);

        $this->assertEquals(120.05, $result['zn']);
        $this->assertEquals('■', $result['status']);
    }
}
