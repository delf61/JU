<?php

namespace App\Models;

use CodeIgniter\Model;

class KppolModel extends Model
{
    protected $table = 'kppol';
    protected $returnType = 'array';

    // Composite primary key (c, d, intkodtov)
    protected $primaryKey = 'intkodtov';
    protected $useAutoIncrement = false;

    protected $allowedFields = [
        'a', 'b', 'c', 'd', 'popis1', 'popis2', 'prijem',
        'mnozstvo', 'mnozstvo_z', 'merjedn', 'nakupcena',
        'op', 'op_z', 'dph', 'vyrcislo', 'pomintkodtov',
        'intkodtov', 'prace'
    ];
}
