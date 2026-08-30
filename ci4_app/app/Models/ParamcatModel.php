<?php

namespace App\Models;

use CodeIgniter\Model;

class ParamcatModel extends Model
{
    protected $table = 'paramcat';
    protected $returnType = 'array';

    // Keyless singleton
    protected $primaryKey = 'rok';
    protected $useAutoIncrement = false;

    protected $allowedFields = [
        '_fand_deleted',
        'rok',
        'sc'
    ];
}
