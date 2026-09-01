<?php

namespace App\Models;

use CodeIgniter\Model;

class BytModel extends Model
{
    protected $table = 'byt';
    protected $primaryKey = 'mr'; // Composite key in reality, using mr as dummy primary for now or avoiding standard CI4 saves
    protected $returnType = 'array';
    protected $useAutoIncrement = false;
    protected $allowedFields = [
        'mr', 'mo',
        'a1', 'a2a', 'a2b', 'a2c', 'a2d', 'a2e', 'a2f', 'a2g', 'a2h', 'a3', 'a4', 'a5',
        'b1', 'b2', 'b3', 'b4', 'b5', 'b6', 'b7', 'b8', 'b9', 'b10',
        'arcintcis'
    ];
}
