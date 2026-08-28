<?php

namespace App\Models;

use CodeIgniter\Model;

class KrajeModel extends Model
{
    protected $table            = 'kraje';
    protected $primaryKey       = 'kodkra';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kodkra', 'nazov', 'km2', 'oby', 'arcintcis'];

    // Validation
    protected $validationRules      = [
        'kodkra' => 'required|max_length[1]',
        'nazov'  => 'required|max_length[20]',
        'km2'    => 'permit_empty|integer',
        'oby'    => 'permit_empty|integer',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
