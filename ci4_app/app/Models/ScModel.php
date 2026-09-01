<?php

namespace App\Models;

use CodeIgniter\Model;

class ScModel extends Model
{
    protected $table = 'sc';
    protected $primaryKey = 'b';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'kod', 'zaciatok', 'zaciatoh', 'koniec', 'konieh',
        'bb', 'b', 'ces', 'uby', 'kam', 'ucel1', 'ucel2',
        'benkm', 'pockm', 'meno', 'bydl', 'dat', 'konst',
        'cebenz', 'celpg', 'dph', 'benpocetmi', 'pocetmiest',
        'arcintcis', 'sumkm', 'cestsm', 'spolu'
    ];
    protected $useTimestamps = false;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
