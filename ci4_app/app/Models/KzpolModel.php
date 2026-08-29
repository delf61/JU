<?php

namespace App\Models;

use CodeIgniter\Model;

class KzpolModel extends Model
{
    protected $table = 'kzpol';
    protected $returnType = 'array';

    // Composite key (a, b, intkodtov)
    protected $primaryKey = 'intkodtov';
    protected $useAutoIncrement = false;

    protected $allowedFields = [
        'a', 'b', 'intkodtov', 'popis1', 'popis2', 'kodvyd',
        'mnozstvo', 'merjedn', 'nakupcena', 'dph', 'vyrcislo',
        'vydaj', 'mes'
    ];
}
