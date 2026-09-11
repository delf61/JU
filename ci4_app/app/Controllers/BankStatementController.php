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
    public function getUnpaidInvoices()
    {
        $type = $this->request->getGet('type'); // 'kz' or 'kp'
        $db = \Config\Database::connect();

        $table = ($type === 'kz') ? 'kz' : 'kp';
        $invoices = $db->table($table)->orderBy('a', 'DESC')->get()->getResultArray();

        $unpaid = [];
        foreach ($invoices as $inv) {
            // Ak v poli uhrady v kp alebo kz je hodnota > 0, potom doklad povazujeme za vyrovnany
            $uhrady_flag = (int)($inv['uhrady'] ?? 0);
            if ($uhrady_flag > 0) {
                continue;
            }

            // Kalkulacia 'zn' (celkovej sumy). V KZ/KP su zaklady x, y, z a DPH.
            // Zjednoduseny matematicky prepis FAND logiky (z + dph_z) atd...
            // Kedze mame x,y,z a DPH, hruba suma (zn) = x + y + z + (odhad_dph z nich) alebo proste pc/spolu, v zavislosti od faktury.
            // Pre FAND je 'zn' vypocitavane podla DPH sadzieb. Pre toto MVP API pouzivame sum(x+y+z) + DPH cast.
            $x = (float)($inv['x'] ?? 0);
            $y = (float)($inv['y'] ?? 0);
            $z = (float)($inv['z'] ?? 0);
            $dph_rate1 = (float)($inv['dph_1'] ?? 0);
            $dph_rate = (float)($inv['dph'] ?? 0);

            $dph_val1 = round($y * ($dph_rate1 / 100), 2);
            $dph_val = round($z * ($dph_rate / 100), 2);

            $par69 = (!empty($inv['par_69']) || (!empty($inv['par69']) && strtolower(trim($inv['par69'])) === 'a')) ? true : false;
            if ($par69) {
                $dph_val1 = 0;
                $dph_val = 0;
            }


            $vyrovn = (float)($inv['vyrovn'] ?? 0);
            $zn = $x + $y + $z + $dph_val1 + $dph_val + $vyrovn;

            // FAND 'uhrada' stlpec
            $uhrada = (float)($inv['uhrada'] ?? 0);

            // User requested tolerance: anything between -1 and 1 EUR is considered paid
            if (abs($zn - $uhrada) >= 1.0) {
                // Pridame zostatok
                $inv['zn'] = number_format($zn, 2, '.', '');
                $inv['uhrada'] = number_format($uhrada, 2, '.', '');
                $inv['zostatok'] = number_format($zn - $uhrada, 2, '.', '');
                if ($type === 'kz') {
                    $inv['var_sym'] = isset($inv['var_sym']) ? trim($inv['var_sym']) : '';
                }
                $unpaid[] = $inv;
            }
        }

        return $this->response->setJSON($unpaid);
    }

    public function transferToPd()
    {
        $pk = $this->request->getPost('PK');
        $db = \Config\Database::connect();

        $ucet = $db->table('ucet')->where('PK', $pk)->get()->getRowArray();
        if (!$ucet) return redirect()->back()->with('error', 'Výpis nebol nájdený.');

        // Vytvor zaznam do PD
        $pd = [
            'a' => $ucet['d'], // den realizacie
            'b' => '50 - ' . substr($ucet['b'], 0, 8),
            'd' => 'BV Č.' . trim($ucet['b']) . ' - ' . $ucet['ua'],
            'r' => !empty($ucet['ra']) ? 1 : 0,
            'p' => !empty($ucet['qa']) ? 1 : 0,
            'ok' => 'u',
            'a1' => 0, 'a2' => 0, 'a3' => 0, 'a4' => 0,
            'vydaj' => ' '
        ];

        $pa = (float)$ucet['pa'];
        if ($pa > 0) {
            $pd['a3'] = $pa; // Prijem na BU
            $pd['vydaj'] = 'O';
        } else {
            $pd['a4'] = abs($pa); // Vydaj z BU
        }

        $db->table('pd')->insert($pd);

        return redirect()->back()->with('success', 'Úspešne prenesené do Peňažného denníka (F3).');
    }

    public function cashTransfer()
    {
        $amount = (float)$this->request->getPost('amount');
        $date = $this->request->getPost('date') ?: date('Y-m-d');

        $db = \Config\Database::connect();

        // Zápis do Banky (Ucet)
        $ucet = [
            'd' => $date, 'a' => $date, 'b' => '1', 'nova' => 1, 'qa' => 1, 'ra' => 0,
            'ua' => ($amount > 0) ? 'VKLAD HOTOVOSTI NA BÚ' : 'VÝBER HOTOVOSTI Z BÚ',
            'pa' => $amount
        ];
        $db->table('ucet')->insert($ucet);

        // Zápisy do PD
        $pd1 = [
            'a' => $date, 'b' => '50 - 1', 'd' => $ucet['ua'], 'r' => 0, 'p' => 1, 'ok' => 'u'
        ];
        $pd2 = [
            'a' => $date, 'b' => '50 - 1', 'd' => $ucet['ua'], 'r' => 0, 'p' => 1, 'ok' => 'h'
        ];

        if ($amount > 0) {
            // Vklad: Vydaj hotovost, Prijem Ucet
            $pd1['a2'] = $amount; $pd1['vydaj'] = ' '; $pd1['ok'] = 'h';
            $pd2['a3'] = $amount; $pd2['vydaj'] = ' '; $pd2['ok'] = 'u';
        } else {
            // Vyber: Vydaj Ucet, Prijem hotovost
            $pd1['a4'] = abs($amount); $pd1['vydaj'] = 'v'; $pd1['ok'] = 'u';
            $pd2['a1'] = abs($amount); $pd2['vydaj'] = 'H'; $pd2['ok'] = 'h';
        }
        $db->table('pd')->insert($pd1);
        $db->table('pd')->insert($pd2);

        return redirect()->back()->with('success', 'Výber/Vklad hotovosti (F5) úspešne prebehol. Vytvorené záznamy.');
    }

    public function payInvoice()
    {
        $invoicePk = $this->request->getPost('invoice_pk');
        $type = $this->request->getPost('type'); // 'kz' or 'kp'
        $date = $this->request->getPost('date') ?: date('Y-m-d');

        $db = \Config\Database::connect();

        $table = ($type === 'kz') ? 'kz' : 'kp';
        $inv = $db->table($table)->where('b', $invoicePk)->get()->getRowArray();

        if (!$inv) return redirect()->back()->with('error', 'Faktúra nenájdená.');

        if ((int)($inv['uhrady'] ?? 0) > 0) {
            return redirect()->back()->with('error', 'Doklad je už označený ako vyrovnaný (uhrady > 0).');
        }

        $x = (float)($inv['x'] ?? 0);
        $y = (float)($inv['y'] ?? 0);
        $z = (float)($inv['z'] ?? 0);
        $dph1 = round($y * ((float)($inv['dph_1'] ?? 0)/100), 2);
        $dph  = round($z * ((float)($inv['dph'] ?? 0)/100), 2);
        $vyrovn = (float)($inv['vyrovn'] ?? 0);

        $par69 = (!empty($inv['par_69']) || (!empty($inv['par69']) && strtolower(trim($inv['par69'])) === 'a')) ? true : false;
        if ($par69) {
            $dph1 = 0;
            $dph = 0;
        }

        $zn = $x + $y + $z + $dph1 + $dph + $vyrovn;
        $uhrada = (float)($inv['uhrada'] ?? 0);

        $amount_to_pay = $zn - $uhrada;
        if (abs($amount_to_pay) < 1.0) return redirect()->back()->with('error', 'Doklad je už uhradený (rozdiel je menej ako 1 Euro).');

        // Update fakturu s uhradenou sumou
        $db->table($table)->where('b', $invoicePk)->update(['uhrada' => $zn]);

        // Zaznam do Banky
        $ucet = [
            'd' => $date, 'a' => $date, 'b' => '1', 'nova' => 1, 'qa' => $inv['p'] ?? 0, 'ra' => $inv['r'] ?? 1,
            'ua' => 'Fa ' . trim($inv['b']) . ' ' . $inv['od'],
            'pa' => ($type === 'kz') ? -$amount_to_pay : $amount_to_pay,
            'c' => $inv['b']
        ];
        $db->table('ucet')->insert($ucet);

        // Zaznam do PD
        $pd = [
            'a' => $date, 'b' => '50 - 1', 'c' => $inv['b'],
            'd' => 'BV Č.1 - ' . $ucet['ua'],
            'r' => $inv['r'] ?? 1, 'p' => $inv['p'] ?? 0, 'ok' => 'u',
            'vydaj' => $inv['vydaj'] ?? ' ', 'kodop' => $inv['kodop'] ?? 0,
            'a1' => 0, 'a2' => 0, 'a3' => 0, 'a4' => 0
        ];

        if ($type === 'kz') {
            $pd['a4'] = $amount_to_pay;
        } else {
            $pd['a3'] = $amount_to_pay;
        }
        $db->table('pd')->insert($pd);

        // Uhrady link table
        $db->table('uhrady')->insert([
            'a' => $inv['a'], 'b' => $inv['b'], 'c' => $inv['b'],
            'pb' => $date, 'pc' => ($type === 'kz') ? -$amount_to_pay : $amount_to_pay
        ]);

        return redirect()->back()->with('success', 'Faktúra úspešne uhradená. Vygenerované pohyby.');
    }

}