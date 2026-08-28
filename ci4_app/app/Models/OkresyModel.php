<?php

namespace App\Models;

use CodeIgniter\Model;

class OkresyModel extends Model
{
    protected $table            = 'okresy';
    protected $primaryKey       = 'kodokr';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kodokr', 'nazov', 'kodkra', 'km2', 'oby', 'arcintcis'];

    protected $validationRules      = [
        'kodokr' => 'required|max_length[2]',
        'nazov'  => 'required|max_length[20]',
        'kodkra' => 'required|max_length[1]',
        'km2'    => 'permit_empty|integer',
        'oby'    => 'permit_empty|integer',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
