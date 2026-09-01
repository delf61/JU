<?php

namespace App\Models;

use CodeIgniter\Model;

class AutoModel extends Model
{
    protected $table = 'auto';
    protected $primaryKey = 'kod';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'kod', 'typ', 'spz', 'ehme', 'eh90', 'eh120', 'esme', 'esmi',
        'esko', 'stn', 'koef', 'pal', 'lpg', 'fir', 'pou', 'motor',
        'nadrz', 'nadrz_lpg', 'arcintcis', 'aktual'
    ];
    protected $useTimestamps = false;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
