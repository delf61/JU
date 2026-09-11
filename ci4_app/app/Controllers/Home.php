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
        $data = [
            'title' => 'Domovská stránka - JU',
            'current_year' => session()->get('accounting_year') ?? date('Y'),
        ];

        return view('home/index', $data);
    }

    public function cashbook()
    {
        $data = $this->homeService->getCashbookSummary();
        return $this->response->setJSON($data);
    }
}
