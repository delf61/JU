<?php

namespace App\Controllers;

use App\Services\LiabilityService;
use CodeIgniter\RESTful\ResourceController;

class LiabilityController extends ResourceController
{
    protected $liabilityService;
    protected $format = 'json';

    public function __construct()
    {
        $this->liabilityService = new LiabilityService();
    }

    public function index()
    {
        $data = $this->liabilityService->getAllLiabilities();
        return $this->respond($data);
    }

    public function show($a = null, $b = null)
    {
        if ($a === null || $b === null) {
            return $this->failValidationError('Missing parameters a or b');
        }

        $invoice = $this->liabilityService->getLiabilityWithItems($a, $b);
        if (!$invoice) {
            return $this->failNotFound('Liability not found');
        }

        return $this->respond($invoice);
    }

    public function calculateStatus($a = null, $b = null)
    {
        if ($a === null || $b === null) {
            return $this->failValidationError('Missing parameters a or b');
        }

        $invoice = $this->liabilityService->getLiability($a, $b);
        if (!$invoice) {
            return $this->failNotFound('Liability not found');
        }

        $year = (int)date('Y', strtotime($a));
        $status = $this->liabilityService->calculateStatus($invoice, $year);

        return $this->respond($status);
    }

    public function create()
    {
        $data = $this->request->getJSON(true);
        if (empty($data['a']) || empty($data['b'])) {
            return $this->failValidationError('Missing a or b');
        }
        $items = $data['items'] ?? [];
        unset($data['items']);
        $this->liabilityService->createLiability($data, $items);
        return $this->respondCreated(['a' => $data['a'], 'b' => $data['b']]);
    }

    public function update($a = null, $b = null)
    {
        $data = $this->request->getJSON(true);
        if ($this->liabilityService->updateLiability($a, $b, $data)) {
            return $this->respondUpdated();
        }
        return $this->fail('Failed to update');
    }

    public function delete($a = null, $b = null)
    {
        if ($this->liabilityService->deleteLiability($a, $b)) {
            return $this->respondDeleted();
        }
        return $this->fail('Failed to delete');
    }
}
