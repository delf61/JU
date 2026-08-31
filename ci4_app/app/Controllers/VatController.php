<?php

namespace App\Controllers;

use App\Services\VatService;
use CodeIgniter\API\ResponseTrait;

class VatController extends BaseController
{
    use ResponseTrait;

    protected $vatService;

    public function __construct()
    {
        $this->vatService = new VatService();
    }

    /**
     * Calculate VAT return for a specific period.
     * Expected params: dateFrom, dateTo, year
     */
    public function calculate()
    {
        $dateFrom = $this->request->getGet('dateFrom');
        $dateTo = $this->request->getGet('dateTo');
        $year = $this->request->getGet('year');

        if (!$dateFrom || !$dateTo || !$year) {
            return $this->fail('Missing required parameters: dateFrom, dateTo, year', 400);
        }

        try {
            $currencyMode = ((int)$year < 2009) ? 'SKK' : 'EUR';
            $result = $this->vatService->calculateVatForPeriod($dateFrom, $dateTo, $year, $currencyMode);
            return $this->respond($result);
        } catch (\Exception $e) {
            return $this->fail($e->getMessage(), 400);
        }
    }

    /**
     * Get active VAT rates for a specific date.
     * Expected params: date
     */
    public function rates()
    {
        $date = $this->request->getGet('date');

        if (!$date) {
            return $this->fail('Missing required parameter: date', 400);
        }

        $rates = $this->vatService->getRatesForDate($date);

        if (!$rates) {
            return $this->failNotFound('No active VAT rates found for the given date.');
        }

        return $this->respond($rates);
    }

    /**
     * Historical VAT results from legacy DPH table (read-only).
     */
    public function history()
    {
        return $this->respond(['message' => 'History endpoint scaffolded. DB integration pending.']);
    }
}
