<?php

namespace App\Models;

use CodeIgniter\Model;

class BankyModel extends Model
{
    protected $table = 'banky';
    protected $primaryKey = 'kodban';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = ['kodban', 'skratka', 'popis', 'arcintcis'];
}
