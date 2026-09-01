<?php

namespace App\Models;

use CodeIgniter\Model;

class TrasyModel extends Model
{
    protected $table = 'trasy';
    protected $primaryKey = 'tra';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'tra', 'z', 'do', 'vzd', 'cez',
        'mesto_2_km', 'mesto_5_km', 'mesto_10_k', 'arcintcis'
    ];
    protected $useTimestamps = false;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
