<?php

namespace App\Models;

use CodeIgniter\Model;

class KpModel extends Model
{
    protected $table = 'kp';
    protected $returnType = 'array';

    // Legacy table has a composite key (a, b). CI4 only supports single PK.
    // We leave primaryKey blank or use a dummy field, as we will query by composite key in Services.
    protected $primaryKey = 'b';
    protected $useAutoIncrement = false;

    protected $allowedFields = [
        'a', 'b', 'kodop', 'od', 'n', 'z', 'pc', 'dph', 'ds', 'zp',
        'kodpri', 'u_h', 'tovar', 'sposob_uhr', 'objednavka', 'zamok',
        'prijem', 'uhrady', 'vyrovn', 'bb', 'hod', 'arcintcis', 'zaloha'
    ];
}
