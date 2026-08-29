<?php

namespace App\Models;

use CodeIgniter\Model;

class UdajeModel extends Model
{
    protected $table = 'udaje';
    // Single row table, no typical primary key.
    // CI4 models usually want a primary key. Since it's a single row,
    // we can either leave it as default or define a pseudo primary key.
    // We will not define primaryKey so CI4 won't try to use 'id' by default.
    // Wait, by default Model uses 'id'. We must be careful.

    protected $returnType = 'array';

    protected $allowedFields = [
        'meno',
        'priezv',
        'titul',
        'nazov',
        'ico',
        'dic',
        'icpd',
        'drcdph',
        'datdph',
        'q_m',
        'sadzba',
        'uli',
        'cis',
        'psc',
        'miesto',
        'tlf',
        'tlf1',
        'mobil',
        'mobil1',
        'fax',
        'fax1',
        'email',
        'hodsadzba',
        'prghodsadz',
        'arcintcis'
    ];

    protected $validationRules = [
        'meno' => 'max_length[10]',
        'priezv' => 'max_length[15]',
        'titul' => 'max_length[5]',
        'nazov' => 'max_length[40]',
        'ico' => 'max_length[10]',
        'dic' => 'max_length[10]',
        'icpd' => 'max_length[15]',
        'drcdph' => 'max_length[15]',
        'q_m' => 'max_length[1]',
        'uli' => 'max_length[20]',
        'cis' => 'max_length[5]',
        'psc' => 'max_length[6]',
        'miesto' => 'max_length[20]',
        'tlf' => 'max_length[13]',
        'tlf1' => 'max_length[13]',
        'mobil' => 'max_length[13]',
        'mobil1' => 'max_length[13]',
        'fax' => 'max_length[13]',
        'fax1' => 'max_length[13]',
        'email' => 'max_length[28]',
        'arcintcis' => 'max_length[1]'
    ];
}
