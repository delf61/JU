<?php
namespace App\Controllers;

use App\Services\BankStatementService;
use CodeIgniter\RESTful\ResourceController;

class BankStatementController extends ResourceController
{
    protected $bankService;

    public function __construct()
    {
        $this->bankService = new BankStatementService();
    }

        public function webIndex()
    {
        // Parameter roka uchovame len pre tlacidlo "Spat", dopyt bude bez filtra
        $year = $this->request->getGet('year') ?: date('Y');

        // All entries across all years
        $entries = $this->bankService->getEntries(null);

        return view('bank/index', [
            'entries' => $entries,
            'year' => $year
        ]);
    }

        public function uiEdit()
    {
        return redirect()->back()->with('error', 'Editácia výpisu nie je zatiaľ implementovaná.');
    }

    public function uiDelete()
    {
        $postData = $this->request->getPost();
        if (empty($postData)) {
            return redirect()->back()->with('error', 'Chýbajú dáta pre vymazanie.');
        }

        $db = \Config\Database::connect();
        $builder = $db->table('ucet');

        // Match ALL fields exactly to prevent deleting wrong record
        foreach ($postData as $k => $v) {
            if ($k !== 'id' && $k !== '_id') {
                $builder->where($k, $v);
            }
        }

        try {
            $builder->delete();
            return redirect()->back()->with('success', 'Záznam bol úspešne vymazaný.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Chyba pri mazaní: ' . $e->getMessage());
        }
    }

    public function uiCopy()
    {
        $postData = $this->request->getPost();
        if (empty($postData)) {
            return redirect()->back()->with('error', 'Chýbajú dáta pre kópiu.');
        }

        $db = \Config\Database::connect();
        $builder = $db->table('ucet');

        // MATCH ALL EXACT FIELDS FROM POST TO ENSURE 100% ACCURACY
        foreach ($postData as $k => $v) {
            if ($k !== 'id' && $k !== '_id') {
                $builder->where($k, $v);
            }
        }

        $record = $builder->get()->getRowArray();

        if ($record) {
            if (isset($record['id'])) unset($record['id']);
            if (isset($record['_id'])) unset($record['_id']);

            try {
                $db->table('ucet')->insert($record);
                return redirect()->back()->with('success', 'Záznam bol úspešne skopírovaný 1:1.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Chyba pri kopírovaní: ' . $e->getMessage());
            }
        }

        return redirect()->back()->with('error', 'Presný záznam pre kópiu nebol nájdený v databáze. Skontrolujte integritu dát.');
    }
}
