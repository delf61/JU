<?php

namespace App\Models;

use CodeIgniter\Model;

class DphModel extends Model
{
    protected $table = 'dph';
    protected $returnType = 'array';

    // No artificial primary key as requested by constraints.
    // CI4 prefers a primary key, but we disable auto increment and don't insert via model.
    protected $primaryKey = 'od';
    protected $useAutoIncrement = false;

    // Fields verified against DPH_ANALYSIS.md and migration schema
    // Note: DPH.000 has historical variants (46-byte pre-2003 vs 67-byte post-2003 global).
    // The fields dphpar4, sum_par_69, dph_par_69, odpocet_pa, r13 are from the 67-byte schema.
    protected $allowedFields = [
        'od',
        'do',
        'dph1',
        'dph2',
        'sum1vstup',
        'dph1vstup',
        'sum2vstup',
        'dph2vstup',
        'sum1vystup',
        'dph1vystup',
        'sum2vystup',
        'dph2vystup',
        'dphpar4',
        'sum_par_69',
        'dph_par_69',
        'odpocet_pa', // Appears truncated in DBF schema (from odpocet_par_69)
        'r13',
        'arcintcis'
    ];
}
