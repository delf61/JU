<?php

namespace App\Services;

use App\Models\SkladModel;
use App\Models\TovaryModel;
use App\Models\DruhtovaModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class InventoryService
{
    protected $skladModel;
    protected $tovaryModel;
    protected $druhtovaModel;

    public function __construct()
    {
        $this->skladModel = new SkladModel();
        $this->tovaryModel = new TovaryModel();
        $this->druhtovaModel = new DruhtovaModel();
    }

    /**
     * Retrieves inventory items (from sklad).
     * Mimics FAND pSklad / pHlaSklad behavior.
     * Supports filtering by popis1 (description) or vyrcislo (serial number).
     */
    public function getInventory(array $filters = [])
    {
        $builder = $this->skladModel->builder();

        if (!empty($filters['search_desc'])) {
            // pHlaSklad edbreak=29 (word in popis1) or edbreak=27 (filter)
            $builder->like('popis1', $filters['search_desc']);
        }

        if (!empty($filters['search_serial'])) {
            // pHlaSklad edbreak=28 (part of vyrcislo)
            $builder->like('vyrcislo', $filters['search_serial']);
        }

        $items = $builder->get()->getResultArray();

        // Process derived fields
        foreach ($items as &$item) {
            $item = $this->calculateDerivedFields($item);
        }

        return $items;
    }

    /**
     * Replicates FAND calculations from Sklad.x:
     * DPH_Sk := (nakupcena * (dph/100)) round 1 : F,6.2;
     * s_DPH := nakupcena + DPH_Sk : F,6.2;
     * spolu := nakupcena * mnozstvo : F,6.2;
     * zaruka_do := addmonth(a, mes) : D,'DD.MM.YYYY';
     */
    public function calculateDerivedFields(array $item)
    {
        $nakupcena = isset($item['nakupcena']) ? (float)$item['nakupcena'] : 0.0;
        $dph = isset($item['dph']) ? (float)$item['dph'] : 0.0;
        $mnozstvo = isset($item['mnozstvo']) ? (float)$item['mnozstvo'] : 0.0;

        // FAND: DPH_Sk := (nakupcena * (dph/100)) round 1
        $dph_sk = round($nakupcena * ($dph / 100), 1);

        // FAND: s_DPH := nakupcena + DPH_Sk
        $s_dph = $nakupcena + $dph_sk;

        // FAND: spolu := nakupcena * mnozstvo
        $spolu = $nakupcena * $mnozstvo;

        // FAND: zaruka_do := addmonth(a, mes)
        $zaruka_do = null;
        if (!empty($item['a']) && $item['a'] !== '0000-00-00') {
            $mes = isset($item['mes']) ? (int)$item['mes'] : 0;
            try {
                $date = new \DateTime($item['a']);
                if ($mes > 0) {
                    $date->modify("+{$mes} months");
                }
                $zaruka_do = $date->format('Y-m-d');
            } catch (\Exception $e) {
                // Invalid date
            }
        }

        // Return calculated values
        $item['DPH_Sk'] = $dph_sk;
        $item['s_DPH'] = $s_dph;
        $item['spolu'] = $spolu;
        $item['zaruka_do'] = $zaruka_do;

        return $item;
    }
}
