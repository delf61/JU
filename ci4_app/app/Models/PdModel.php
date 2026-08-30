<?php

namespace App\Models;

use CodeIgniter\Model;

class PdModel extends Model
{
    protected $table = 'pd';
    protected $returnType = 'array';

    // MariaDB primary key will either be an auto-increment ID or a composite (b, _year).
    // In CI4 we map to the primary identifier 'b', but we have to enforce queries manually
    // via CashbookService since CI4 doesn't fully support composite keys natively.
    protected $primaryKey = 'b';
    protected $useAutoIncrement = false;

    protected $allowedFields = [
        '_year',
        '_fand_deleted',
        'a',
        'b',
        'zp',
        'kodop',
        'c',
        'd',
        'r',
        'p',
        'a1',
        'a2',
        'a3',
        'a4',
        'vydaj',
        'a7',
        'a8',
        'a9',
        'a10',
        'a11',
        'a12',
        'a13',
        'a14',
        'a15',
        'a16',
        'a17',
        'po',
        'dph',
        'hal_p'
    ];
}
