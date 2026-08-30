<?php

namespace App\Controllers;

use App\Services\CashbookService;
use App\Models\DovodBuModel;
use CodeIgniter\RESTful\ResourceController;

class CashbookController extends ResourceController
{
    protected $cashbookService;
    protected $dovodBuModel;
    protected $format = 'json';

    public function __construct()
    {
        $this->cashbookService = new CashbookService();
        $this->dovodBuModel = new DovodBuModel();
    }

    public function index()
    {
        $year = $this->request->getGet('year');
        $entries = $this->cashbookService->getEntries($year);
        return $this->respond($entries);
    }

    public function show($b = null, $year = null)
    {
        if ($b === null || $year === null) {
            return $this->failValidationError('Missing parameters b or year');
        }

        $entry = $this->cashbookService->getEntry($b, $year);
        if (!$entry) {
            return $this->failNotFound('Entry not found');
        }

        return $this->respond($entry);
    }

    public function totals($year = null)
    {
        if ($year === null) {
            return $this->failValidationError('Missing year parameter');
        }

        $totals = $this->cashbookService->calculateTotals($year);
        return $this->respond($totals);
    }

    public function reasons()
    {
        $reasons = $this->dovodBuModel->where('_fand_deleted !=', 1)->orWhere('_fand_deleted IS NULL')->findAll();
        return $this->respond($reasons);
    }
}
