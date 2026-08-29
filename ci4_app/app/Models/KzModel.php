<?php

namespace App\Models;

use CodeIgniter\Model;

class KzModel extends Model
{
    protected $table = 'kz';
    protected $returnType = 'array';

    protected $primaryKey = 'b';
    protected $useAutoIncrement = false;

    protected $allowedFields = [
        'a', 'b', 'kodop', 'od', 'n', 'x', 'y', 'z', 'pc', 'splat',
        'stala', 'mes', 'uhr_do', 'od_ucet', 'var_sym', 'kon_sym',
        'spc_sym', 'spc_mes', 'dph', 'dph_1', 'vydaj'
    ];
}
