<?php

namespace App\Controllers;

use App\Models\IkzpModel;
use App\Models\IkdkpModel;
use App\Services\AssetService;
use CodeIgniter\RESTful\ResourceController;

class AssetController extends ResourceController
{
    protected $assetService;

    public function __construct()
    {
        $this->assetService = new AssetService();
    }

    /**
     * Get a list of IKZP (Tangible/Intangible Assets) records
     * Optional ?year= query param determines the calculation context (default 2026).
     */
    public function getIkzp()
    {
        $year = (int)$this->request->getGet('year') ?: 2026;
        $model = new IkzpModel();

        $records = $model->where('YEAR(a)', $year)->findAll();

        $processed = [];
        foreach ($records as $record) {
            $processed[] = $this->assetService->calculateIkzp($record, $year);
        }

        return $this->respond([
            'status' => 'success',
            'data'   => $processed
        ]);
    }

    /**
     * Get a list of IKDKP (Minor Assets) records
     * Optional ?year= query param determines the fetch context (default 2026).
     */
    public function getIkdkp()
    {
        $year = (int)$this->request->getGet('year') ?: 2026;
        $model = new IkdkpModel();

        $records = $model->where('YEAR(a)', $year)->findAll();

        $processed = [];
        foreach ($records as $record) {
            $processed[] = $this->assetService->calculateIkdkp($record);
        }

        return $this->respond([
            'status' => 'success',
            'data'   => $processed
        ]);
    }
}
