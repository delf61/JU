<?php

namespace App\Models;

use CodeIgniter\Model;

class TovaryModel extends Model
{
    protected $table = 'tovary';
    protected $primaryKey = 'kod';
    protected $returnType = 'array';
    protected $useAutoIncrement = false;

    protected $allowedFields = [
        'kod', 'd', 'mj', 'kod_d', 'dph', 'arcintcis'
    ];
}
