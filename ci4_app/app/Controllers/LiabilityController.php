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
        try {
            $year = $this->request->getGet('year') ?: (session()->get('accounting_year') ?? date('Y'));
            $data = $this->liabilityService->getAllLiabilities($year);
            return $this->respond($data);
        } catch (\Throwable $e) {
            log_message('error', $e->getMessage());
            return $this->respond(['error' => 'Chyba databázy: ' . $e->getMessage()], 500);
        }
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
            try {
                $model = new \App\Models\KzAttachmentModel();
                $data = [
                    'kz_b' => $doklad,
                    'path' => $newName,
                    'original_name' => $file->getClientName()
                ];

                $insertID = $model->insert($data);

                if ($insertID === false) {
                    // Ak databaza vrati chybu (napr. constraint)
                    log_message('error', 'Upload attachment insert failed: ' . json_encode($model->errors()));
                    return $this->response->setJSON(['error' => 'Chyba databázy: Záznam sa neuložil do tabuľky kz_prilohy.'])->setStatusCode(500);
                }

                // Generovanie noveho CSRF hashu (pre pripad ze form po uploade potrebuje byt nadalej "zivy")
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Súbor bol úspešne nahratý.',
                    'attachment' => $data,
                    'csrf_token' => csrf_hash()
                ]);
            } catch (\Throwable $e) {
                log_message('error', 'Upload DB Exception: ' . $e->getMessage());
                return $this->response->setJSON(['error' => 'Kritická chyba DB: ' . $e->getMessage()])->setStatusCode(500);
            }
        }

        $errorMsg = $file->getErrorString() . ' (' . $file->getError() . ')';
        return $this->response->setJSON(['error' => 'Chyba pri ukladaní súboru na disk: ' . $errorMsg])->setStatusCode(500);
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

    public function viewAttachment($id)
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

        $mime = mime_content_type($filePath);
        if (!$mime) {
            $mime = 'application/octet-stream';
        }

        return $this->response
            ->setStatusCode(200)
            ->setContentType($mime)
            ->setBody(file_get_contents($filePath))
            ->setHeader('Content-Disposition', 'inline; filename="' . $attachment['original_name'] . '"');
    }

    public function decodeBysquare()
    {
        $payload = $this->request->getJSON(true);
        if (empty($payload['qr_string'])) {
            return $this->response->setJSON(['error' => 'Chýba QR reťazec'])->setStatusCode(400);
        }

        $string = $payload['qr_string'];

        // Kontrola bysquare hlavicky (0000, 0001, 2003...)
        if (strlen($string) < 10) {
            return $this->response->setJSON(['error' => 'Neplatný QR kód'])->setStatusCode(400);
        }

        $body = substr($string, 4);
        $body .= str_repeat('=', (8 - strlen($body) % 8) % 8);

        $dictionary = '0123456789ABCDEFGHIJKLMNOPQRSTUV';
        $standard = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';

        $body = strtr($body, $dictionary, $standard);

        // Base32 manual decode
        $binary = '';
        foreach(str_split($body) as $c) {
            $pos = strpos($standard, $c);
            if ($pos !== false) {
                $binary .= str_pad(base_convert($pos, 10, 2), 5, '0', STR_PAD_LEFT);
            }
        }

        $r = '';
        foreach(str_split($binary, 8) as $c) {
            if (strlen($c) == 8) {
                $r .= chr(base_convert($c, 2, 10));
            }
        }

        // Dlzka 2 bajty pre LZMA uncompressed
        $binaryBody = substr($r, 2);

        // Dekompresia cez XZ
        $xzProcess = proc_open("'xz' '--format=raw' '--lzma1=lc=3,lp=0,pb=2,dict=128KiB' '-c' '-d' '-'", [
            0 => ['pipe', 'r'],
            1 => ['pipe', 'w'],
            2 => ['pipe', 'w']
        ], $pipes);

        if (!is_resource($xzProcess)) {
            return $this->response->setJSON(['error' => 'Chýba podpora XZ dekompresie na serveri'])->setStatusCode(500);
        }

        fwrite($pipes[0], $binaryBody);
        fclose($pipes[0]);

        $uncompressed = stream_get_contents($pipes[1]);
        $error = stream_get_contents($pipes[2]);
        fclose($pipes[1]);
        fclose($pipes[2]);
        proc_close($xzProcess);

        if (empty($uncompressed)) {
            return $this->response->setJSON(['error' => 'Chyba dekompresie QR kódu'])->setStatusCode(400);
        }

        $parts = explode("	", $uncompressed);

        // Parse the TSV according to Pay/Invoice by square format
        // The format varies slightly depending on if it's INVOICE (2003) or PAY (0000)
        $isInvoice = substr($string, 0, 4) === '2003';

        $parsed = [];
        if ($isInvoice) {
            $parsed['ext_doklad'] = $parts[0] ? substr($parts[0], 3) : ''; // first bytes contain some prefix usually
            // Clean non-alphanumeric chars at start
            $parsed['ext_doklad'] = preg_replace('/^[^A-Za-z0-9]+/', '', $parsed['ext_doklad']);
            $parsed['splatnost'] = $parts[1] ?? ''; // YYYYMMDD
            $parsed['dodanie'] = $parts[2] ?? ''; // YYYYMMDD
            $parsed['cislo_fa'] = $parts[3] ?? '';
            $parsed['mena'] = $parts[5] ?? 'EUR';
            $parsed['dodavatel'] = $parts[9] ?? '';
            $parsed['dodavatel_dic'] = $parts[10] ?? '';
            $parsed['dodavatel_ico'] = $parts[12] ?? '';
            $parsed['odberatel'] = $parts[22] ?? '';
            $parsed['odberatel_ico'] = $parts[25] ?? '';
            $parsed['iban'] = $parts[26] ?? '';
            $parsed['zaklad_dane'] = $parts[43] ?? 0;
            $parsed['dph'] = $parts[44] ?? 0;
            $parsed['suma'] = $parts[47] ?? 0;
        } else {
            // Standard PayBySquare
            $parsed['iban'] = $parts[6] ?? ''; // roughly
            $parsed['suma'] = $parts[7] ?? 0;
            $parsed['mena'] = $parts[8] ?? 'EUR';
            $parsed['ext_doklad'] = $parts[10] ?? ''; // VS
            $parsed['ks'] = $parts[11] ?? '';
            $parsed['ss'] = $parts[12] ?? '';
            $parsed['pozn'] = $parts[13] ?? '';
        }

        return $this->response->setJSON([
            'success' => true,
            'raw' => $parts,
            'parsed' => $parsed
        ]);
    }

}
