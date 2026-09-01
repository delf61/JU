<?php

namespace App\Models;

use CodeIgniter\Model;

class H2osasaModel extends Model
{
    protected $table = 'h2osasa';
    protected $primaryKey = 'mr';
    protected $returnType = 'array';
    protected $useAutoIncrement = false;
    protected $allowedFields = [
        'mp', 'mr', 'h2o_v', 'h2o_n', 'sk_v', 'sk_n',
        'dph', 'spotreba', 'dni', 'priemer_l', 'priemer',
        'rok', 'arcintcis'
    ];
}
