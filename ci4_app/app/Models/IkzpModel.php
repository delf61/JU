<?php

namespace App\Models;

use CodeIgniter\Model;

class IkzpModel extends Model
{
    protected $table            = 'ikzp';
    protected $primaryKey       = 'b'; // Logical primary key, might be empty in legacy data
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    // Fields based on MariaDB extraction
    protected $allowedFields = [
        'a', 'b', 'c', 'vy', 'n', 'vc', 'rv', 'hb', 'h', 'p', 'u', 'hz', 'r', 'd', 'v', 'sv',
        'so', 'ro', 'os', 'okzvc', 'dph', 'dph_dat', 'h_n', 'oprava', 'fdo', 'fd', 'rok_pom', 'zo', 'arcintcis'
    ];

    protected $useTimestamps = false;
}
