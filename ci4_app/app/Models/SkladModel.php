<?php

namespace App\Models;

use CodeIgniter\Model;

class SkladModel extends Model
{
    protected $table = 'sklad';
    protected $primaryKey = 'b';
    protected $returnType = 'array';
    protected $useAutoIncrement = false;

    protected $allowedFields = [
        'a', 'b', 'popis1', 'popis2', 'mnozstvo', 'nakupcena', 'd', 'v', 'sv',
        'fdo', 'fd', 'fv', 'dph', 'vyrcislo', 'merjedn', 'intkodtov', 'mes', 'arcintcis'
    ];
}
