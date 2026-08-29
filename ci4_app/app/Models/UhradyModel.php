<?php

namespace App\Models;

use CodeIgniter\Model;

class UhradyModel extends Model
{
    protected $table = 'uhrady';
    protected $returnType = 'array';

    protected $primaryKey = 'b';
    protected $useAutoIncrement = false;

    protected $allowedFields = [
        'a', 'b', 'c', 'pb', 'pc', 'od_ucet', 'prirad_kz', 'prirad_kp'
    ];
}
