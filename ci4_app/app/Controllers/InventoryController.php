<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Services\InventoryService;

class InventoryController extends ResourceController
{
    protected $inventoryService;

    public function __construct()
    {
        $this->inventoryService = new InventoryService();
    }

    /**
     * Lists inventory items with optional filtering.
     * Maps to FAND pSklad / pHlaSklad list views.
     */
    public function index()
    {
        $filters = [
            'search_desc' => $this->request->getGet('search_desc'),
            'search_serial' => $this->request->getGet('search_serial'),
        ];

        try {
            $items = $this->inventoryService->getInventory($filters);
            return $this->respond($items);
        } catch (\Exception $e) {
            return $this->failServerError($e->getMessage());
        }
    }
}
