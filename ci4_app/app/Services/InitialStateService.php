<?php

namespace App\Services;

use App\Models\PocstavModel;

class InitialStateService
{
    protected $pocstavModel;

    public function __construct()
    {
        $this->pocstavModel = new PocstavModel();
    }

    public function getInitialStates()
    {
        return $this->pocstavModel->orderBy('a', 'DESC')->findAll();
    }

    public function getInitialStateByDate(string $date)
    {
        return $this->pocstavModel->where('a', $date)->first();
    }

    public function createInitialState(array $data)
    {
        // Legacy `#I` rule: b := '00-001-' + YYYY
        if (!isset($data['b']) && isset($data['a'])) {
            $year = date('Y', strtotime($data['a']));
            $data['b'] = '00-001-' . $year;
        }

        // Apply defaults for decimal fields if missing
        $fields = ['ph', 'pu', 'm', 'han', 'poh', 'zav'];
        foreach ($fields as $field) {
            if (!isset($data[$field])) {
                $data[$field] = 0.00;
            }
        }

        return $this->pocstavModel->insert($data);
    }

    public function updateInitialState(string $date, array $data)
    {
        // Ensure primary key is not manipulated
        if (isset($data['a'])) {
            unset($data['a']);
        }

        return $this->pocstavModel->where('a', $date)->set($data)->update();
    }

    public function deleteInitialState(string $date)
    {
        return $this->pocstavModel->where('a', $date)->delete();
    }
}
