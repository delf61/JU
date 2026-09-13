<?php

namespace App\Models;

use CodeIgniter\Model;

class KzAttachmentModel extends Model
{
    protected $table            = 'kz_prilohy';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'kz_b',
        'path',
        'original_name',
        'created_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = '';
    protected $deletedField  = '';
}
