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

    public function uiEdit($b, $date, $ua, $pa)
    {
        // Placeholder for edit view
        return redirect()->back()->with('error', 'Editácia výpisu nie je zatiaľ implementovaná.');
    }

    public function uiDelete($b, $date, $ua, $pa)
    {
        // Placeholder for delete logic
        return redirect()->back()->with('error', 'Mazanie výpisu nie je zatiaľ implementované.');
    }

    public function uiCopy($b, $date, $ua, $pa)
    {
        $db = \Config\Database::connect();
        $record = $db->table('ucet')
            ->where('b', hex2bin($b))
            ->where('d', hex2bin($date))
            ->where('ua', hex2bin($ua))
            ->where('pa', hex2bin($pa))
            ->get()->getRowArray();

        if ($record) {
            // Pouzivatel chce cistu kopiu 1:1. Ak sa vyskytne nejaky interny auto-increment primarny kluc (napr id),
            // musim ho zmazat z pola zaznamu aby ho DB vygenerovala nanovo.
            if (isset($record['id'])) {
                unset($record['id']);
            }
            if (isset($record['_id'])) {
                unset($record['_id']);
            }

            try {
                $db->table('ucet')->insert($record);
                return redirect()->back()->with('success', 'Záznam bol úspešne skopírovaný 1:1.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Chyba pri kopírovaní: ' . $e->getMessage());
            }
        }

        return redirect()->back()->with('error', 'Záznam pre kópiu nebol nájdený.');
    }
}
