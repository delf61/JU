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
        $year = $this->request->getGet('year') ?: (session()->get('accounting_year') ?? date('Y'));
        $data = $this->liabilityService->getAllLiabilities($year);
        return $this->respond($data);
    }

    public function webIndex()
    {
        $year = $this->request->getGet('year') ?: (session()->get('accounting_year') ?? date('Y'));
        $data = [
            'year' => $year
        ];
        return view('invoices/liabilities', $data);
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

    // --- Prílohy (Smart Attachments) ---

    public function getAttachments()
    {
        $doklad = $this->request->getGet('b');
        if (!$doklad) {
            return $this->response->setJSON(['error' => 'Chýba číslo dokladu (b)'])->setStatusCode(400);
        }

        $model = new \App\Models\KzAttachmentModel();
        $attachments = $model->where('kz_b', $doklad)->findAll();

        return $this->response->setJSON($attachments);
    }

    public function uploadAttachment()
    {
        $doklad = $this->request->getPost('b');
        if (!$doklad) {
            return $this->response->setJSON(['error' => 'Chýba číslo dokladu (b)'])->setStatusCode(400);
        }

        $file = $this->request->getFile('attachment');
        if (!$file || !$file->isValid()) {
            return $this->response->setJSON(['error' => 'Súbor nie je platný alebo nebol nahratý.'])->setStatusCode(400);
        }

        $allowedTypes = ['application/pdf', 'image/jpeg', 'image/png'];
        if (!in_array($file->getMimeType(), $allowedTypes)) {
             return $this->response->setJSON(['error' => 'Nepovolený formát. Povolené sú len PDF, JPG, PNG.'])->setStatusCode(400);
        }

        $newName = $file->getRandomName();
        $uploadPath = WRITEPATH . 'uploads/zavazky';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        if ($file->move($uploadPath, $newName)) {
            $model = new \App\Models\KzAttachmentModel();
            $data = [
                'kz_b' => $doklad,
                'path' => $newName,
                'original_name' => $file->getClientName()
            ];
            $model->insert($data);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Súbor bol úspešne nahratý.',
                'attachment' => $data
            ]);
        }

        return $this->response->setJSON(['error' => 'Chyba pri ukladaní súboru na server.'])->setStatusCode(500);
    }

    public function downloadAttachment($id)
    {
        $model = new \App\Models\KzAttachmentModel();
        $attachment = $model->find($id);

        if (!$attachment) {
            return $this->response->setStatusCode(404)->setBody('Príloha neexistuje.');
        }

        $filePath = WRITEPATH . 'uploads/zavazky/' . $attachment['path'];

        if (!file_exists($filePath)) {
            return $this->response->setStatusCode(404)->setBody('Súbor na disku neexistuje.');
        }

        return $this->response->download($filePath, null)->setFileName($attachment['original_name']);
    }

}
