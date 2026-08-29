<?php

namespace App\Models;

use CodeIgniter\Model;

class KrajeModel extends Model
{
    protected $table = 'kraje';
    protected $primaryKey = 'kodkra';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = ['kodkra', 'nazov', 'km2', 'oby', 'arcintcis'];
}
