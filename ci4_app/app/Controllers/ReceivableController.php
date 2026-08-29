<?php

namespace App\Controllers;

use App\Services\ReceivableService;
use CodeIgniter\RESTful\ResourceController;

class ReceivableController extends ResourceController
{
    protected $receivableService;
    protected $format = 'json';

    public function __construct()
    {
        $this->receivableService = new ReceivableService();
    }

    public function index()
    {
        $data = $this->receivableService->getAllReceivables();
        return $this->respond($data);
    }

    public function show($a = null, $b = null)
    {
        if ($a === null || $b === null) {
            return $this->failValidationError('Missing parameters a or b');
        }

        $invoice = $this->receivableService->getReceivableWithItems($a, $b);
        if (!$invoice) {
            return $this->failNotFound('Receivable not found');
        }

        return $this->respond($invoice);
    }

    public function calculateStatus($a = null, $b = null)
    {
        if ($a === null || $b === null) {
            return $this->failValidationError('Missing parameters a or b');
        }

        $invoice = $this->receivableService->getReceivable($a, $b);
        if (!$invoice) {
            return $this->failNotFound('Receivable not found');
        }

        $year = (int)date('Y', strtotime($a));
        $status = $this->receivableService->calculateStatus($invoice, $year);

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
        $this->receivableService->createReceivable($data, $items);
        return $this->respondCreated(['a' => $data['a'], 'b' => $data['b']]);
    }

    public function update($a = null, $b = null)
    {
        $data = $this->request->getJSON(true);
        if ($this->receivableService->updateReceivable($a, $b, $data)) {
            return $this->respondUpdated();
        }
        return $this->fail('Failed to update');
    }

    public function delete($a = null, $b = null)
    {
        if ($this->receivableService->deleteReceivable($a, $b)) {
            return $this->respondDeleted();
        }
        return $this->fail('Failed to delete');
    }
}
