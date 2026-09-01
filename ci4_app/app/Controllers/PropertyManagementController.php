<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Services\PropertyManagementService;
use CodeIgniter\API\ResponseTrait;

class PropertyManagementController extends BaseController
{
    use ResponseTrait;

    protected $propertyService;

    public function __construct()
    {
        $this->propertyService = new PropertyManagementService();
    }

    public function calculateElectricity()
    {
        $currentRecord = $this->request->getJSON(true);
        if (!$currentRecord) {
            return $this->fail('Invalid JSON input');
        }

        $previousRecord = $currentRecord['previous'] ?? null;

        $result = $this->propertyService->calculateVyuctSSE($currentRecord, $previousRecord);
        return $this->respond($result);
    }

    public function calculateWater()
    {
        $currentRecord = $this->request->getJSON(true);
        if (!$currentRecord) {
            return $this->fail('Invalid JSON input');
        }

        $previousRecord = $currentRecord['previous'] ?? null;

        $result = $this->propertyService->calculateVyucH2OSasa($currentRecord, $previousRecord);
        return $this->respond($result);
    }

    public function calculateApartment()
    {
        $record = $this->request->getJSON(true);
        if (!$record) {
            return $this->fail('Invalid JSON input');
        }

        $aSum = $this->propertyService->calculateASum($record);
        $bSum = $this->propertyService->calculateBSum($record);

        return $this->respond([
            'a_sum' => $aSum,
            'b_sum' => $bSum
        ]);
    }
}
