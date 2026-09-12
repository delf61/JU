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
        // default year context initialize if empty
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
