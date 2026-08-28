<?php

namespace App\Models;

use CodeIgniter\Model;

class BankyModel extends Model
{
    protected $table            = 'banky';
    protected $primaryKey       = 'kodban';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kodban', 'skratka', 'popis', 'arcintcis'];

    protected $validationRules      = [
        'kodban'  => 'required|max_length[4]',
        'skratka' => 'required|max_length[10]',
        'popis'   => 'permit_empty|max_length[40]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
