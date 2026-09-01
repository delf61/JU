<?php

namespace App\Models;

use CodeIgniter\Model;

class DruhtovaModel extends Model
{
    protected $table = 'druhtov';
    protected $primaryKey = 'd_b';
    protected $returnType = 'array';
    protected $useAutoIncrement = false;

    protected $allowedFields = [
        'd', 'd_b', 'b', 'dph', 'ok', 'arcintcis'
    ];
}
