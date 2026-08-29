<?php

namespace App\Models;

use CodeIgniter\Model;

class MestaModel extends Model
{
    protected $table = 'mesta';
    protected $primaryKey = 'kod';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = ['kod', 'nazov', 'kodokr', 'tel', 'psc', 'arcintcis'];
}
