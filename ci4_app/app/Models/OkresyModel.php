<?php

namespace App\Models;

use CodeIgniter\Model;

class OkresyModel extends Model
{
    protected $table = 'okresy';
    protected $primaryKey = 'kodokr';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = ['kodokr', 'nazov', 'kodkra', 'km2', 'oby', 'arcintcis'];
}
