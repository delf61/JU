<?php

namespace App\Models;

use CodeIgniter\Model;

class ElsasaModel extends Model
{
    protected $table = 'elsasa';
    protected $primaryKey = 'mr';
    protected $returnType = 'array';
    protected $useAutoIncrement = false;
    protected $allowedFields = [
        'mp', 'mr', 'el_v', 'spotreba_v', 'el_n', 'spotreba_n',
        'sk_v', 'sk_n', 'dni', 'den_spo_v_', 'den_spo_n_',
        'den_spo_v', 'den_spo_n', 'pausal', 'dph', 'vymena',
        'rok', 'arcintcis'
    ];
}
