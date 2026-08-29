<?php

namespace App\Controllers;

use App\Services\PartnerService;
use App\Services\UdajeService;

class PartnerController extends BaseController
{
    protected $partnerService;
    protected $udajeService;

    public function __construct()
    {
        $this->partnerService = new PartnerService();
        $this->udajeService = new UdajeService();
    }

    // --- Views ---

    public function index()
    {
        return view('partners/index');
    }

    public function udaje()
    {
        return view('partners/udaje');
    }

    // --- Partners API ---

    public function getPartners()
    {
        return $this->response->setJSON($this->partnerService->getAllPartners());
    }

    public function getPartner($kodop)
    {
        $partner = $this->partnerService->getPartner((int)$kodop);
        if ($partner) {
            return $this->response->setJSON($partner);
        }
        return $this->response->setStatusCode(404)->setJSON(['error' => 'Partner not found']);
    }

    public function createPartner()
    {
        $data = $this->request->getJSON(true);
        $result = $this->partnerService->createPartner($data);

        if ($result['success']) {
            return $this->response->setStatusCode(201)->setJSON($result);
        }

        return $this->response->setStatusCode(400)->setJSON($result);
    }

    public function updatePartner($kodop)
    {
        $data = $this->request->getJSON(true);
        $result = $this->partnerService->updatePartner((int)$kodop, $data);

        if ($result['success']) {
            return $this->response->setJSON($result);
        }

        return $this->response->setStatusCode(400)->setJSON($result);
    }

    public function deletePartner($kodop)
    {
        $result = $this->partnerService->deletePartner((int)$kodop);

        if ($result['success']) {
            return $this->response->setJSON($result);
        }

        return $this->response->setStatusCode(400)->setJSON($result);
    }

    // --- Udaje API ---

    public function getUdajeInfo()
    {
        $udaje = $this->udajeService->getUdaje();
        // Return empty object instead of null if empty, so frontend can handle easily
        return $this->response->setJSON($udaje ?: new \stdClass());
    }

    public function updateUdajeInfo()
    {
        $data = $this->request->getJSON(true);
        $result = $this->udajeService->updateUdaje($data);

        if ($result['success']) {
            return $this->response->setJSON($result);
        }

        return $this->response->setStatusCode(400)->setJSON($result);
    }
}
