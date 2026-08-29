<?php

namespace App\Models;

use CodeIgniter\Model;

class PartnerModel extends Model
{
    protected $table = 'partner';
    protected $primaryKey = 'kodop';

    // We do NOT use auto-increment since it's unverified if legacy did it,
    // and we map to smallint. We'll handle numbering manually or let user input it.
    protected $useAutoIncrement = false;

    protected $returnType = 'array';

    protected $allowedFields = [
        'kodop',
        'firma',
        'meno',
        'cinnos',
        'ulica',
        'psc',
        'miesto',
        'tlf',
        'tlfa',
        'tlfb',
        'fax',
        'ico',
        'penust',
        'cu',
        'pozn',
        'drc',
        'icpd',
        'var_sym',
        'kon_sym',
        'spc_sym',
        'ku',
        'x',
        'do',
        'arcintcis'
    ];

    protected $validationRules = [
        'kodop' => 'required|integer',
        'firma' => 'max_length[30]',
        'meno' => 'max_length[30]',
        'cinnos' => 'max_length[60]',
        'ulica' => 'max_length[20]',
        'psc' => 'max_length[6]',
        'miesto' => 'max_length[20]',
        'tlf' => 'max_length[15]',
        'tlfa' => 'max_length[15]',
        'tlfb' => 'max_length[40]',
        'fax' => 'max_length[15]',
        'ico' => 'max_length[10]',
        'penust' => 'max_length[20]',
        'cu' => 'max_length[20]',
        'pozn' => 'max_length[60]',
        'drc' => 'max_length[15]',
        'icpd' => 'max_length[15]',
        'var_sym' => 'max_length[10]',
        'kon_sym' => 'max_length[10]',
        'spc_sym' => 'max_length[10]',
        'arcintcis' => 'max_length[1]'
    ];
}
