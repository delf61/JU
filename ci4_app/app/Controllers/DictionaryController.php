<?php

namespace App\Controllers;

use App\Services\DictionaryService;

class DictionaryController extends BaseController
{
    protected $service;

    public function __construct()
    {
        $this->service = new DictionaryService();
    }

    public function index()
    {
        return view('dictionary/index');
    }

    // --- API ENDPOINTS ---
    private function handleResponse($result)
    {
        if ($result['success']) {
            return $this->response->setJSON(['status' => 'success']);
        }
        return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'errors' => $result['errors']]);
    }

    public function list($type)
    {
        $data = [];
        switch ($type) {
            case 'kraje': $data = $this->service->getKraje(); break;
            case 'okresy': $data = $this->service->getOkresy(); break;
            case 'mesta': $data = $this->service->getMesta(); break;
            case 'banky': $data = $this->service->getBanky(); break;
            default: return $this->response->setStatusCode(404)->setJSON(['error' => 'Not found']);
        }
        return $this->response->setJSON($data);
    }

    public function create($type)
    {
        $data = $this->request->getJSON(true);
        switch ($type) {
            case 'kraje': return $this->handleResponse($this->service->createKraj($data));
            case 'okresy': return $this->handleResponse($this->service->createOkres($data));
            case 'mesta': return $this->handleResponse($this->service->createMesto($data));
            case 'banky': return $this->handleResponse($this->service->createBanka($data));
            default: return $this->response->setStatusCode(404)->setJSON(['error' => 'Not found']);
        }
    }

    public function update($type, $id)
    {
        $data = $this->request->getJSON(true);
        switch ($type) {
            case 'kraje': return $this->handleResponse($this->service->updateKraj($id, $data));
            case 'okresy': return $this->handleResponse($this->service->updateOkres($id, $data));
            case 'mesta': return $this->handleResponse($this->service->updateMesto($id, $data));
            case 'banky': return $this->handleResponse($this->service->updateBanka($id, $data));
            default: return $this->response->setStatusCode(404)->setJSON(['error' => 'Not found']);
        }
    }

    public function delete($type, $id)
    {
        switch ($type) {
            case 'kraje': return $this->handleResponse($this->service->deleteKraj($id));
            case 'okresy': return $this->handleResponse($this->service->deleteOkres($id));
            case 'mesta': return $this->handleResponse($this->service->deleteMesto($id));
            case 'banky': return $this->handleResponse($this->service->deleteBanka($id));
            default: return $this->response->setStatusCode(404)->setJSON(['error' => 'Not found']);
        }
    }
}
