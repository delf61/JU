<?php

namespace App\Services;

use App\Models\KrajeModel;
use App\Models\OkresyModel;
use App\Models\MestaModel;
use App\Models\BankyModel;
use CodeIgniter\Database\Exceptions\DatabaseException;
use Exception;

class DictionaryService
{
    protected $models;

    public function __construct()
    {
        $this->models = [
            'kraje'  => new KrajeModel(),
            'okresy' => new OkresyModel(),
            'mesta'  => new MestaModel(),
            'banky'  => new BankyModel(),
        ];
    }

    public function getAll(string $type)
    {
        if (!isset($this->models[$type])) {
            throw new Exception("Invalid dictionary type: {$type}");
        }

        return $this->models[$type]->findAll();
    }

    public function getById(string $type, string $id)
    {
        if (!isset($this->models[$type])) {
            throw new Exception("Invalid dictionary type: {$type}");
        }

        return $this->models[$type]->find($id);
    }

    public function create(string $type, array $data)
    {
        if (!isset($this->models[$type])) {
            throw new Exception("Invalid dictionary type: {$type}");
        }

        $model = $this->models[$type];

        $db = \Config\Database::connect();
        $db->transStart();

        $model->insert($data);

        // FAND rule: #A Kraje.km2 += km2; Kraje.oby += oby; on Okresy
        if ($type === 'okresy') {
            $kodkra = $data['kodkra'] ?? null;
            if ($kodkra) {
                $km2 = (int)($data['km2'] ?? 0);
                $oby = (int)($data['oby'] ?? 0);

                if ($km2 > 0 || $oby > 0) {
                    $krajeModel = $this->models['kraje'];
                    $kraj = $krajeModel->find($kodkra);
                    if ($kraj) {
                        $newKm2 = (int)$kraj['km2'] + $km2;
                        $newOby = (int)$kraj['oby'] + $oby;
                        $krajeModel->update($kodkra, ['km2' => $newKm2, 'oby' => $newOby]);
                    }
                }
            }
        }

        $db->transComplete();

        if ($db->transStatus() === false) {
            throw new Exception("Failed to create {$type}");
        }

        return true;
    }

    public function update(string $type, string $id, array $data)
    {
        if (!isset($this->models[$type])) {
            throw new Exception("Invalid dictionary type: {$type}");
        }

        $model = $this->models[$type];

        $db = \Config\Database::connect();
        $db->transStart();

        $oldRecord = $model->find($id);
        if (!$oldRecord) {
            throw new Exception("Record not found for update");
        }

        // FAND rule: updating Okres -> adjusting parent Kraje
        if ($type === 'okresy') {
            $oldKodkra = $oldRecord['kodkra'] ?? null;
            $newKodkra = $data['kodkra'] ?? $oldKodkra;

            $oldKm2 = (int)($oldRecord['km2'] ?? 0);
            $newKm2 = (int)($data['km2'] ?? $oldKm2);
            $diffKm2 = $newKm2 - $oldKm2;

            $oldOby = (int)($oldRecord['oby'] ?? 0);
            $newOby = (int)($data['oby'] ?? $oldOby);
            $diffOby = $newOby - $oldOby;

            $krajeModel = $this->models['kraje'];

            // If the parent Kraje didn't change, we apply differences.
            if ($oldKodkra === $newKodkra && $oldKodkra) {
                if ($diffKm2 !== 0 || $diffOby !== 0) {
                    $kraj = $krajeModel->find($oldKodkra);
                    if ($kraj) {
                        $krajeModel->update($oldKodkra, [
                            'km2' => (int)$kraj['km2'] + $diffKm2,
                            'oby' => (int)$kraj['oby'] + $diffOby
                        ]);
                    }
                }
            } else {
                // If it changed parents
                if ($oldKodkra) {
                    $oldKraj = $krajeModel->find($oldKodkra);
                    if ($oldKraj) {
                        $krajeModel->update($oldKodkra, [
                            'km2' => (int)$oldKraj['km2'] - $oldKm2,
                            'oby' => (int)$oldKraj['oby'] - $oldOby
                        ]);
                    }
                }

                if ($newKodkra) {
                    $newKraj = $krajeModel->find($newKodkra);
                    if ($newKraj) {
                        $krajeModel->update($newKodkra, [
                            'km2' => (int)$newKraj['km2'] + $newKm2,
                            'oby' => (int)$newKraj['oby'] + $newOby
                        ]);
                    }
                }
            }
        }

        $model->update($id, $data);

        $db->transComplete();

        if ($db->transStatus() === false) {
            throw new Exception("Failed to update {$type}");
        }

        return true;
    }

    public function delete(string $type, string $id)
    {
        if (!isset($this->models[$type])) {
            throw new Exception("Invalid dictionary type: {$type}");
        }

        $model = $this->models[$type];
        $record = $model->find($id);

        if (!$record) {
            return false;
        }

        // Parent-child protection
        if ($type === 'kraje') {
            $okresy = $this->models['okresy']->where('kodkra', $id)->findAll();
            if (!empty($okresy)) {
                throw new Exception("Cannot delete Kraje because it has associated Okresy.");
            }
        }

        if ($type === 'okresy') {
            $mesta = $this->models['mesta']->where('kodokr', $id)->findAll();
            if (!empty($mesta)) {
                throw new Exception("Cannot delete Okresy because it has associated Mesta.");
            }
        }

        $db = \Config\Database::connect();
        $db->transStart();

        // FAND rule: Deleting Okres -> subtract from Kraje
        if ($type === 'okresy') {
            $kodkra = $record['kodkra'] ?? null;
            if ($kodkra) {
                $km2 = (int)($record['km2'] ?? 0);
                $oby = (int)($record['oby'] ?? 0);

                if ($km2 > 0 || $oby > 0) {
                    $krajeModel = $this->models['kraje'];
                    $kraj = $krajeModel->find($kodkra);
                    if ($kraj) {
                        $newKm2 = (int)$kraj['km2'] - $km2;
                        $newOby = (int)$kraj['oby'] - $oby;
                        $krajeModel->update($kodkra, ['km2' => $newKm2, 'oby' => $newOby]);
                    }
                }
            }
        }

        $model->delete($id);

        $db->transComplete();

        if ($db->transStatus() === false) {
            throw new Exception("Failed to delete {$type}");
        }

        return true;
    }
}
