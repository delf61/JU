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
        return view('welcome_message');
    }

    public function cashbook()
    {
        $data = $this->homeService->getCashbookSummary();
        return $this->response->setJSON($data);
    }
}
