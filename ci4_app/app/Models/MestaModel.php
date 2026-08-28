<?php

namespace App\Models;

use CodeIgniter\Model;

class MestaModel extends Model
{
    protected $table            = 'mesta';
    protected $primaryKey       = 'kod';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kod', 'nazov', 'kodokr', 'tel', 'psc', 'arcintcis'];

    protected $validationRules      = [
        'kod'    => 'required|max_length[4]',
        'nazov'  => 'required|max_length[20]',
        'kodokr' => 'required|max_length[2]',
        'tel'    => 'permit_empty|max_length[8]',
        'psc'    => 'permit_empty|max_length[5]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
