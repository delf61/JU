<?php
namespace App\Controllers;

use App\Services\BankStatementService;
use CodeIgniter\RESTful\ResourceController;

class BankStatementController extends ResourceController
{
    protected $bankService;

    public function __construct()
    {
        $this->bankService = new BankStatementService();
    }

    public function webIndex()
    {
        $year = $this->request->getGet('year');
        if (!$year) {
            $year = date('Y');
        }

        $entries = $this->bankService->getEntries($year);

        return view('bank/index', [
            'entries' => $entries,
            'year' => $year
        ]);
    }
}
