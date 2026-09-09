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

    public function uiEdit($b, $date)
    {
        // Placeholder for edit view
        return redirect()->back()->with('error', 'Editácia výpisu nie je zatiaľ implementovaná.');
    }

    public function uiDelete($b, $date)
    {
        // Placeholder for delete logic
        return redirect()->back()->with('error', 'Mazanie výpisu nie je zatiaľ implementované.');
    }

    public function uiCopy($b, $date)
    {
        // Basic copy logic
        $db = \Config\Database::connect();
        $record = $db->table('ucet')->where('b', base64_decode($b))->where('d', base64_decode($date))->get()->getRowArray();

        if ($record) {
            // Append _COPY to the document number to prevent primary key collision if applicable
            $record['b'] = substr($record['b'] . '_COPY', 0, 8); // b is A,8 in FAND

            try {
                $db->table('ucet')->insert($record);
                return redirect()->back()->with('success', 'Záznam bol úspešne skopírovaný.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Chyba pri kopírovaní: ' . $e->getMessage());
            }
        }

        return redirect()->back()->with('error', 'Záznam pre kópiu nebol nájdený.');
    }
}
