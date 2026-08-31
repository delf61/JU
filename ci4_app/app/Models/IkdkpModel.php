<?php

namespace App\Models;

use CodeIgniter\Model;

class IkdkpModel extends Model
{
    protected $table            = 'ikdkp';
    protected $primaryKey       = 'b'; // Logical primary key
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    // Fields based on MariaDB extraction
    protected $allowedFields = [
        'a', 'b', 'c', 'n', 'mn', 'jc', 'hb', 'h', 'p', 'u', 'r', 'd', 'v', 'sv', 'fdo', 'fd', 'fv', 'dph', 'arcintcis'
    ];

    protected $useTimestamps = false;
}
