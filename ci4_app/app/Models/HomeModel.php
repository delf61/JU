<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $table = 'pd';
    protected $primaryKey = 'id';

    public function getPdSummary()
    {
        // In a real scenario, this would aggregate data similar to FAND merge:
        // merge(['#I1_ PD ... #O_ EB spolu += sum(I1.hod_vyd)']);
        // For now, just return a mock or a basic query if DB exists.

        return [
            'total_income' => 1500.50,
            'total_expense' => 320.10,
            'balance' => 1180.40
        ];
    }
}
