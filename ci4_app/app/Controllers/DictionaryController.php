<?php

namespace App\Controllers;

use App\Services\DictionaryService;
use CodeIgniter\API\ResponseTrait;

class DictionaryController extends BaseController
{
    use ResponseTrait;

    protected $dictionaryService;

    public function __construct()
    {
        $this->dictionaryService = new DictionaryService();
    }

    public function index()
    {
        return view('dictionary/index');
    }

    public function list(string $type)
    {
        try {
            $data = $this->dictionaryService->getAll($type);
            return $this->respond($data);
        } catch (\Exception $e) {
            return $this->failServerError($e->getMessage());
        }
    }

    public function show(string $type, string $id)
    {
        try {
            $data = $this->dictionaryService->getById($type, $id);
            if ($data) {
                return $this->respond($data);
            }
            return $this->failNotFound('Record not found');
        } catch (\Exception $e) {
            return $this->failServerError($e->getMessage());
        }
    }

    public function create(string $type)
    {
        try {
            $data = $this->request->getJSON(true);
            $this->dictionaryService->create($type, $data);
            return $this->respondCreated(['message' => 'Record created successfully']);
        } catch (\Exception $e) {
            return $this->failServerError($e->getMessage());
        }
    }

    public function update(string $type, string $id)
    {
        try {
            $data = $this->request->getJSON(true);
            $this->dictionaryService->update($type, $id, $data);
            return $this->respond(['message' => 'Record updated successfully']);
        } catch (\Exception $e) {
            return $this->failServerError($e->getMessage());
        }
    }

    public function delete(string $type, string $id)
    {
        try {
            $result = $this->dictionaryService->delete($type, $id);
            if ($result) {
                return $this->respondDeleted(['message' => 'Record deleted successfully']);
            }
            return $this->failNotFound('Record not found');
        } catch (\Exception $e) {
            return $this->failServerError($e->getMessage());
        }
    }
}
