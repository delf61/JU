<?php

namespace App\Models;

use CodeIgniter\Model;

class DovodBuModel extends Model
{
    protected $table = 'dovod_bu';
    protected $returnType = 'array';

    // It's a simple dictionary with a single field.
    protected $primaryKey = 'n';
    protected $useAutoIncrement = false;

    protected $allowedFields = [
        '_fand_deleted',
        'n'
    ];
}
