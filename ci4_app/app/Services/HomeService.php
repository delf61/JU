<?php

namespace App\Services;

use App\Models\HomeModel;

class HomeService
{
    protected $homeModel;

    public function __construct()
    {
        $this->homeModel = new HomeModel();
    }

    public function getCashbookSummary(): array
    {
        // Business logic replacement for FAND MERGE (mPDsuma)
        $summary = $this->homeModel->getPdSummary();

        return [
            'status' => 'success',
            'message' => 'Cashbook summary retrieved successfully',
            'data' => $summary
        ];
    }
}
