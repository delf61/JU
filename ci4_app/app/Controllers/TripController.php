<?php

namespace App\Controllers;

use App\Services\TripService;
use App\Models\ScModel;
use App\Models\EviAutoModel;
use App\Models\AutoModel;
use CodeIgniter\RESTful\ResourceController;

class TripController extends ResourceController
{
    protected TripService $tripService;
    protected ScModel $scModel;
    protected EviAutoModel $eviAutoModel;
    protected AutoModel $autoModel;

    public function __construct()
    {
        $this->tripService = new TripService();
        $this->scModel = new ScModel();
        $this->eviAutoModel = new EviAutoModel();
        $this->autoModel = new AutoModel();
    }

    /**
     * Corresponds to legacy pSc logic.
     */
    public function indexSc()
    {
        $limit = $this->request->getGet('limit') ?? 50;
        $offset = $this->request->getGet('offset') ?? 0;

        $scRecords = $this->scModel->findAll($limit, $offset);

        $results = [];
        foreach ($scRecords as $sc) {
            $kod = $sc['kod'];
            $auto = $this->autoModel->where('kod', $kod)->first();
            if (!$auto) {
                // FAND fallback to empty array or try prostr field if kod not matching
                // Legacy often uses 'prostr' (in our DB maybe mapped to kod)
                $auto = [];
            }

            $calc = $this->tripService->calculateScTotals($sc, $auto);
            $results[] = [
                'sc' => $sc,
                'calculations' => $calc
            ];
        }

        return $this->respond($results);
    }

    /**
     * Corresponds to legacy pEvi_Auto logic.
     */
    public function indexEviAuto()
    {
        $limit = $this->request->getGet('limit') ?? 50;
        $offset = $this->request->getGet('offset') ?? 0;

        $eviRecords = $this->eviAutoModel->findAll($limit, $offset);

        $results = [];
        foreach ($eviRecords as $evi) {
            $kod = $evi['kod'];
            $auto = $this->autoModel->where('kod', $kod)->first();
            if (!$auto) {
                $auto = [];
            }

            $calc = $this->tripService->calculateEviAutoTotals($evi, $auto);
            $results[] = [
                'eviauto' => $evi,
                'calculations' => $calc
            ];
        }

        return $this->respond($results);
    }
}
