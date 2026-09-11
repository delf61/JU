<?php
namespace App\Services;

use App\Models\BankStatementModel;

class BankStatementService
{
    protected $model;

    public function __construct()
    {
        $this->model = new BankStatementModel();
    }

    public function getEntries($year = null)
    {
        if ($year) {
            return $this->model->where('YEAR(a)', $year)->findAll();
        }
        return $this->model->findAll();
    }
}
