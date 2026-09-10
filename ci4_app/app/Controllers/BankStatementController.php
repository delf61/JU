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

                public function uiEdit($pk)
    {
        $db = \Config\Database::connect();
        $record = $db->table('ucet')->where('PK', $pk)->get()->getRowArray();

        if (!$record) {
            return redirect()->to('bank')->with('error', 'Záznam na editáciu nebol nájdený.');
        }

        return view('bank/form', [
            'entry' => $record,
            'pk' => $pk
        ]);
    }

    public function uiUpdate($pk)
    {
        $postData = $this->request->getPost();

        // Zabezpecenie boolean checkboxov (ak niesu poslane v POST, nastavime na 0)
        $postData['ra'] = isset($postData['ra']) ? 1 : 0;
        $postData['qa'] = isset($postData['qa']) ? 1 : 0;

        $db = \Config\Database::connect();

        try {
            $db->table('ucet')->where('PK', $pk)->update($postData);
            return redirect()->to('bank')->with('success', 'Záznam bol úspešne upravený.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Chyba pri ukladaní úprav: ' . $e->getMessage());
        }
    }

    public function uiDelete()
    {
        $pk = $this->request->getPost('PK');
        if (empty($pk)) {
            return redirect()->back()->with('error', 'Chýbajú dáta pre vymazanie.');
        }

        $db = \Config\Database::connect();

        try {
            $db->table('ucet')->where('PK', $pk)->delete();
            return redirect()->back()->with('success', 'Záznam bol úspešne vymazaný.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Chyba pri mazaní: ' . $e->getMessage());
        }
    }

    public function uiCopy()
    {
        $pk = $this->request->getPost('PK');
        if (empty($pk)) {
            return redirect()->back()->with('error', 'Chýbajú dáta pre kópiu.');
        }

        $db = \Config\Database::connect();
        $record = $db->table('ucet')->where('PK', $pk)->get()->getRowArray();

        if ($record) {
            unset($record['PK']); // Odstranime PK, aby databaza vygenerovala nove

            try {
                $db->table('ucet')->insert($record);
                return redirect()->back()->with('success', 'Záznam bol úspešne skopírovaný 1:1.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Chyba pri kopírovaní: ' . $e->getMessage());
            }
        }

        return redirect()->back()->with('error', 'Presný záznam pre kópiu nebol nájdený v databáze.');
    }
}
