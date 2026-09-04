<?php

namespace App\Controllers;

use App\Services\InitialStateService;
use CodeIgniter\RESTful\ResourceController;

class AccountingController extends ResourceController
{
    protected $initialStateService;

    public function __construct()
    {
        $this->initialStateService = new InitialStateService();
    }

    public function index()
    {
        $data = $this->initialStateService->getInitialStates();
        return $this->respond($data);
    }

    public function show($date = null)
    {
        if ($date === null) {
            return $this->failValidationError('Date is required');
        }

        $data = $this->initialStateService->getInitialStateByDate($date);

        if ($data) {
            return $this->respond($data);
        }

        return $this->failNotFound('Initial state not found for date: ' . $date);
    }

    public function create()
    {
        $data = $this->request->getJSON(true);

        if (empty($data['a'])) {
            return $this->failValidationError('Field "a" (date) is required');
        }

        if ($this->initialStateService->getInitialStateByDate($data['a'])) {
            return $this->failResourceExists('Initial state already exists for date: ' . $data['a']);
        }

        $this->initialStateService->createInitialState($data);

        return $this->respondCreated(['message' => 'Initial state created successfully', 'data' => $data]);
    }

    public function update($date = null)
    {
        if ($date === null) {
            return $this->failValidationError('Date is required');
        }

        $data = $this->request->getJSON(true);

        if (!$this->initialStateService->getInitialStateByDate($date)) {
            return $this->failNotFound('Initial state not found for date: ' . $date);
        }

        $this->initialStateService->updateInitialState($date, $data);

        return $this->respond(['message' => 'Initial state updated successfully']);
    }

    public function delete($date = null)
    {
        if ($date === null) {
            return $this->failValidationError('Date is required');
        }

        if (!$this->initialStateService->getInitialStateByDate($date)) {
            return $this->failNotFound('Initial state not found for date: ' . $date);
        }

        $this->initialStateService->deleteInitialState($date);

        return $this->respondDeleted(['message' => 'Initial state deleted successfully']);
    }
}
