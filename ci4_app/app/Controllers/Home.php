<?php

namespace App\Controllers;

use App\Services\HomeService;

class Home extends BaseController
{
    protected $homeService;

    public function __construct()
    {
        $this->homeService = new HomeService();
    }

    public function index(): string
    {
        // "po spusteni CI4 JU bude vzdy aktualny rok ako predvoleny"
        // Force the current real calendar year only if session does not exist.
        // User requested: "po spusteni CI4 JU bude vzdy aktualny rok ako predvoleny, aj keby som CI4 ukoncil v roku 2025".
        // This is exactly what session does (it resets on browser exit), so we don't need to force overwrite it on every reload.
        if (!session()->has('accounting_year')) {
            session()->set('accounting_year', date('Y'));
        }

        $data = [
            'title' => 'Domovská stránka - JU',
            'current_year' => session()->get('accounting_year'),
        ];

        return view('home/index', $data);
    }

    public function cashbook()
    {
        $data = $this->homeService->getCashbookSummary();
        return $this->response->setJSON($data);
    }

    public function setYear()
    {
        $input = $this->request->getJSON(true);
        if (isset($input['year']) && is_numeric($input['year'])) {
            session()->set('accounting_year', (int)$input['year']);
            return $this->response->setJSON(['status' => 'success', 'year' => (int)$input['year']]);
        }
        return $this->response->setJSON(['status' => 'error'], 400);
    }
}
