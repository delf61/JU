<?php

namespace App\Services;

use App\Models\PartnerModel;

class PartnerService
{
    protected $partnerModel;

    public function __construct()
    {
        $this->partnerModel = new PartnerModel();
    }

    public function getAllPartners(): array
    {
        return $this->partnerModel->findAll();
    }

    public function getPartner(int $kodop): ?array
    {
        return $this->partnerModel->find($kodop);
    }

    public function createPartner(array $data): array
    {
        if (empty($data['kodop'])) {
            $data['kodop'] = $this->getNextKodop();
        }

        if ($this->partnerModel->insert($data)) {
            return ['success' => true, 'kodop' => $data['kodop']];
        }

        return ['success' => false, 'errors' => $this->partnerModel->errors()];
    }

    public function updatePartner(int $kodop, array $data): array
    {
        if ($this->partnerModel->update($kodop, $data)) {
            return ['success' => true];
        }

        return ['success' => false, 'errors' => $this->partnerModel->errors()];
    }

    public function deletePartner(int $kodop): array
    {
        if ($this->partnerModel->delete($kodop)) {
            return ['success' => true];
        }

        return ['success' => false, 'errors' => $this->partnerModel->errors()];
    }

    private function getNextKodop(): int
    {
        $max = $this->partnerModel->selectMax('kodop')->first();
        return ($max['kodop'] ?? 0) + 1;
    }
}
