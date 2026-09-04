<?php

namespace App\Models;

use CodeIgniter\Model;

class PocstavModel extends Model
{
    protected $table = 'pocstav';
    protected $primaryKey = 'a'; // The FAND 'Ku dňu' date field is effectively the primary key
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'a',
        'b',
        'ph',
        'h',
        'pu',
        'u',
        'm',
        'han',
        'poh',
        'zav',
        'arcintcis'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}
