<?php

namespace App\Controllers;

use App\Services\CashbookService;

use App\Services\InitialStateService;
use CodeIgniter\RESTful\ResourceController;

class CashbookController extends ResourceController
{
    protected $cashbookService;

    protected $initialStateService;
    protected $format = 'json';

    public function __construct()
    {
        $this->cashbookService = new CashbookService();

        $this->initialStateService = new InitialStateService();
    }

    public function index()
    {
        $year = $this->request->getGet('year');
        $entries = $this->cashbookService->getEntries($year);
        return $this->respond($entries);
    }

    public function show($b = null, $year = null)
    {
        if ($b === null || $year === null) {
            return $this->failValidationError('Missing parameters b or year');
        }

        $entry = $this->cashbookService->getEntry($b, $year);
        if (!$entry) {
            return $this->failNotFound('Entry not found');
        }

        return $this->respond($entry);
    }

    public function totals($year = null)
    {
        if ($year === null) {
            return $this->failValidationError('Missing year parameter');
        }

        $totals = $this->cashbookService->calculateTotals($year);
        return $this->respond($totals);
    }

    public function reasons()
    {
        $reasons = []; // dovod_bu is transient in FAND
        return $this->respond($reasons);
    }

    // --- Web UI Methods ---

    public function webIndex()
    {
        $year = $this->request->getGet('year');
        if (!$year) {
            $year = date('Y');
        }

        $filter = $this->request->getGet('filter');

        $entries = $this->cashbookService->getEntries($year);

        if ($filter === 'bez_kodu') {
            $entries = array_filter($entries, function($e) {
                return empty($e['vydaj']) || trim($e['vydaj']) === '';
            });
        }
        $totals = $this->cashbookService->calculateTotals($year);
        $initialState = $this->initialStateService->getInitialStateByDate($year . '-01-01');

        // Combine initial state with totals for running balance display
        $runningTotals = [
            'income_cash' => $totals['income_cash'] + (float)($initialState['ph'] ?? 0),
            'expense_cash' => $totals['expense_cash'],
            'income_bank' => $totals['income_bank'] + (float)($initialState['pu'] ?? 0),
            'expense_bank' => $totals['expense_bank']
        ];

        return view('cashbook/index', [
            'entries' => $entries,
            'totals' => $totals,
            'initialState' => $initialState,
            'runningTotals' => $runningTotals,
            'year' => $year
        ]);
    }

    public function create()
    {
        $year = $this->request->getGet('year') ?: date('Y');
        $reasons = []; // dovod_bu is transient in FAND

        return view('cashbook/form', [
            'year' => $year,
            'reasons' => $reasons,
            'entry' => null
        ]);
    }

    public function store()
    {
        $data = $this->request->getPost();

        // Simple validation
        $rules = [
            'a' => 'required|valid_date',
            'b' => 'required',
            'kodop' => 'required',
            'c' => 'permit_empty|string',
            'd' => 'permit_empty|string',
            'zp' => 'permit_empty|valid_date',
            'a1' => 'permit_empty|numeric',
            'a2' => 'permit_empty|numeric',
            'a3' => 'permit_empty|numeric',
            'a4' => 'permit_empty|numeric',
            'a7' => 'permit_empty|numeric',
            'a8' => 'permit_empty|numeric',
            'a9' => 'permit_empty|numeric',
            'a10' => 'permit_empty|numeric',
            'a11' => 'permit_empty|numeric',
            'a12' => 'permit_empty|numeric',
            'a13' => 'permit_empty|numeric',
            'a14' => 'permit_empty|numeric',
            'a15' => 'permit_empty|numeric',
            'a16' => 'permit_empty|numeric',
            'a17' => 'permit_empty|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // $data['_year'] = date('Y', strtotime($data['a']));

        $pdModel = new \App\Models\PdModel();

        // Cast empty string to null for floats if necessary, or just insert
        foreach (['a1', 'a2', 'a3', 'a4', 'a7', 'a8', 'a9', 'a10', 'a11', 'a12', 'a13', 'a14', 'a15', 'a16', 'a17'] as $field) {
            if (isset($data[$field]) && $data[$field] === '') {
                $data[$field] = 0.00;
            }
        }

        $pdModel->insert($data);

        return redirect()->to('cashbook?year=' . date('Y', strtotime($data['a'])))->with('success', 'Záznam bol úspešne pridaný.');
    }

    public function uiEdit($b, $year)
    {
        $entry = $this->cashbookService->getEntry($b, $year);
        if (!$entry) {
            return redirect()->to('cashbook?year=' . $year)->with('error', 'Záznam nenájdený.');
        }

        $reasons = []; // dovod_bu is transient in FAND

        return view('cashbook/form', [
            'year' => $year,
            'reasons' => $reasons,
            'entry' => $entry
        ]);
    }

    public function uiUpdate($b, $year)
    {
        $data = $this->request->getPost();

        $rules = [
            'a' => 'required|valid_date',
            'kodop' => 'required',
            'c' => 'permit_empty|string',
            'd' => 'permit_empty|string',
            'zp' => 'permit_empty|valid_date',
            'a1' => 'permit_empty|numeric',
            'a2' => 'permit_empty|numeric',
            'a3' => 'permit_empty|numeric',
            'a4' => 'permit_empty|numeric',
            'a7' => 'permit_empty|numeric',
            'a8' => 'permit_empty|numeric',
            'a9' => 'permit_empty|numeric',
            'a10' => 'permit_empty|numeric',
            'a11' => 'permit_empty|numeric',
            'a12' => 'permit_empty|numeric',
            'a13' => 'permit_empty|numeric',
            'a14' => 'permit_empty|numeric',
            'a15' => 'permit_empty|numeric',
            'a16' => 'permit_empty|numeric',
            'a17' => 'permit_empty|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $newYear = date('Y', strtotime($data['a']));
        // $data['_year'] = $newYear;

        foreach (['a1', 'a2', 'a3', 'a4', 'a7', 'a8', 'a9', 'a10', 'a11', 'a12', 'a13', 'a14', 'a15', 'a16', 'a17'] as $field) {
            if (isset($data[$field]) && $data[$field] === '') {
                $data[$field] = 0.00;
            }
        }

        // CI4 doesn't support composite keys in Model easily for updates,
        // so we use Query Builder directly
        $db = \Config\Database::connect();
                // Prevent mass assignment vulnerability by explicitly selecting fields
        $allowedFields = ['a', 'zp', 'kodop', 'c', 'd', 'a1', 'a2', 'a3', 'a4', 'vydaj', 'a7', 'a8', 'a9', 'a10', 'a11', 'a12', 'a13', 'a14', 'a15', 'a16', 'a17'];
        $updateData = [];
        foreach ($allowedFields as $f) {
            if (array_key_exists($f, $data)) {
                $updateData[$f] = $data[$f];
            }
        }

        $db->table('pd')
           ->where('b', $b)
           ->where('YEAR(a)', $year)
           ->update($updateData);

        return redirect()->to('cashbook?year=' . $newYear)->with('success', 'Záznam bol úspešne upravený.');
    }

    public function uiDelete($b, $year)
    {
        $db = \Config\Database::connect();
        $db->table('pd')
           ->where('b', $b)
           ->where('YEAR(a)', $year)
           ->delete();
        return redirect()->to('cashbook?year=' . $year)->with('success', 'Záznam bol úspešne vymazaný.');
    }

    // --- Legacy Migrated Procedures ---

    public function statistics()
    {
        $year = $this->request->getGet('year') ?: date('Y');
        $stats = $this->cashbookService->calculateStatistics($year);

        return view('cashbook/statistics', [
            'year' => $year,
            'stats' => $stats
        ]);
    }

    public function summary()
    {
        $year = $this->request->getGet('year') ?: date('Y');
        $b = $this->request->getGet('b');

        $summary = $this->cashbookService->calculateDetailedSummary($year, $b);

        return view('cashbook/summary', [
            'year' => $year,
            'b' => $b,
            'summary' => $summary
        ]);
    }

    public function documentRedirect($b, $year)
    {
        // Legacy pPD_Doklad logic
        $prefix = substr($b, 0, 2);
        if ($prefix === '40') {
            // SC (Logbook)
            return redirect()->to('trips?year=' . $year);
        } elseif ($prefix === '50') {
            // Invoices?
            return redirect()->to('invoices?year=' . $year);
        }

        return redirect()->back()->with('error', 'Neznámy typ dokladu pre presmerovanie.');
    }
}
