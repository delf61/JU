<?php

namespace App\Models;

use CodeIgniter\Model;

class SadzbdphModel extends Model
{
    protected $table = 'sadzdph';
    protected $returnType = 'array';

    // No artificial primary key.
    protected $primaryKey = 'od';
    protected $useAutoIncrement = false;

    // Fields verified against DPH_ANALYSIS.md and legacy SADZBDPH.000
    // dph_dol and dph_hor are stored as F,2.1 in FAND (scaled integers), but
    // the DBF migration mapped them to DECIMAL(4, 1), so they are standard float/decimal here.
    protected $allowedFields = [
        'dph_dol',
        'dph_hor',
        'od',
        'do',
        'arcintcis'
    ];
}
