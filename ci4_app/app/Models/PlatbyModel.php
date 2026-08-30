<?php

namespace App\Models;

use CodeIgniter\Model;

class PlatbyModel extends Model
{
    protected $table = 'platby';
    protected $returnType = 'array';

    protected $primaryKey = 'b';
    protected $useAutoIncrement = false;

    protected $allowedFields = [
        'a', 'b', 'od', 'n', 'x', 'pc', 'splat', 'stala', 'mes',
        'uhr_do', 'od_ucet', 'var_sym'
    ];
}
