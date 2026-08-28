<?php

namespace App\Services;

use App\Models\KrajeModel;
use App\Models\OkresyModel;
use App\Models\MestaModel;
use App\Models\BankyModel;

class DictionaryService
{
    protected $krajeModel;
    protected $okresyModel;
    protected $mestaModel;
    protected $bankyModel;

    public function __construct()
    {
        $this->krajeModel = new KrajeModel();
        $this->okresyModel = new OkresyModel();
        $this->mestaModel = new MestaModel();
        $this->bankyModel = new BankyModel();
    }

    // --- KRAJE ---
    public function getKraje() { return $this->krajeModel->findAll(); }
    public function getKraj($id) { return $this->krajeModel->find($id); }
    public function createKraj($data) {
        if (!$this->krajeModel->insert($data)) return ['success' => false, 'errors' => $this->krajeModel->errors()];
        return ['success' => true];
    }
    public function updateKraj($id, $data) {
        if (!$this->krajeModel->update($id, $data)) return ['success' => false, 'errors' => $this->krajeModel->errors()];
        return ['success' => true];
    }
    public function deleteKraj($id) {
        // Business logic: Cannot delete Kraj if it has Okresy
        $count = $this->okresyModel->where('kodkra', $id)->countAllResults();
        if ($count > 0) return ['success' => false, 'errors' => ['kodkra' => 'Záznam sa nedá zmazať, existujú naň naviazané okresy.']];
        $this->krajeModel->delete($id);
        return ['success' => true];
    }

    // --- OKRESY ---
    public function getOkresy() { return $this->okresyModel->findAll(); }
    public function getOkres($id) { return $this->okresyModel->find($id); }
    public function createOkres($data) {
        if (!$this->okresyModel->insert($data)) return ['success' => false, 'errors' => $this->okresyModel->errors()];
        // Logic translation from DOS JU: #A Kraje.km2 += km2; Kraje.oby += oby;
        if (!empty($data['km2']) || !empty($data['oby'])) {
            $this->updateKrajTotals($data['kodkra']);
        }
        return ['success' => true];
    }
    public function updateOkres($id, $data) {
        $old = $this->okresyModel->find($id);
        if (!$this->okresyModel->update($id, $data)) return ['success' => false, 'errors' => $this->okresyModel->errors()];
        $this->updateKrajTotals($data['kodkra'] ?? $old['kodkra']);
        if (isset($data['kodkra']) && $data['kodkra'] !== $old['kodkra']) {
             $this->updateKrajTotals($old['kodkra']);
        }
        return ['success' => true];
    }
    public function deleteOkres($id) {
        $count = $this->mestaModel->where('kodokr', $id)->countAllResults();
        if ($count > 0) return ['success' => false, 'errors' => ['kodokr' => 'Záznam sa nedá zmazať, existujú naň naviazané mestá.']];
        $old = $this->okresyModel->find($id);
        $this->okresyModel->delete($id);
        if ($old) $this->updateKrajTotals($old['kodkra']);
        return ['success' => true];
    }
    private function updateKrajTotals($kodkra) {
        // Recalculates Kraje.km2 and Kraje.oby based on Okresy
        $db = \Config\Database::connect();
        $result = $db->table('okresy')->selectSum('km2')->selectSum('oby')->where('kodkra', $kodkra)->get()->getRowArray();
        $this->krajeModel->update($kodkra, ['km2' => $result['km2'] ?? 0, 'oby' => $result['oby'] ?? 0]);
    }

    // --- MESTA ---
    public function getMesta() { return $this->mestaModel->findAll(); }
    public function getMesto($id) { return $this->mestaModel->find($id); }
    public function createMesto($data) {
        if (!$this->mestaModel->insert($data)) return ['success' => false, 'errors' => $this->mestaModel->errors()];
        return ['success' => true];
    }
    public function updateMesto($id, $data) {
        if (!$this->mestaModel->update($id, $data)) return ['success' => false, 'errors' => $this->mestaModel->errors()];
        return ['success' => true];
    }
    public function deleteMesto($id) {
        $this->mestaModel->delete($id);
        return ['success' => true];
    }

    // --- BANKY ---
    public function getBanky() { return $this->bankyModel->findAll(); }
    public function getBanka($id) { return $this->bankyModel->find($id); }
    public function createBanka($data) {
        if (!$this->bankyModel->insert($data)) return ['success' => false, 'errors' => $this->bankyModel->errors()];
        return ['success' => true];
    }
    public function updateBanka($id, $data) {
        if (!$this->bankyModel->update($id, $data)) return ['success' => false, 'errors' => $this->bankyModel->errors()];
        return ['success' => true];
    }
    public function deleteBanka($id) {
        $this->bankyModel->delete($id);
        return ['success' => true];
    }
}
