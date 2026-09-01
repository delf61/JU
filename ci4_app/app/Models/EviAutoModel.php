<?php

namespace App\Models;

use CodeIgniter\Model;

class EviAutoModel extends Model
{
    protected $table = 'eviauto';
    protected $primaryKey = 'datum';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'datum', 'zaciatok', 'koniec', 'bb', 'tra',
        'mesto_2_km', 'mesto_5_km', 'mesto_10_k', 'odkial',
        'kam', 'ucel', 'zac_km', 'kon_km', 'konst', 'cena_phm',
        'kod', 'nova', 'dph', 'phm_zac', 'phm_kon', 'lpg',
        'text_1', 'text_2', 'text_3', 'arcintcis'
    ];
    protected $useTimestamps = false;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
