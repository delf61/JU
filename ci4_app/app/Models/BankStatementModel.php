<?php
namespace App\Models;

use CodeIgniter\Model;

class BankStatementModel extends Model
{
    protected $table = 'ucet';
    protected $primaryKey = 'PK';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'PK', 'a', 'b', 'c', 'd', 'ba', 'cu', 'ua', 'pa', 'qa', 'ra', 'ba1', 'cu1', 'nova', 'vydaj', 'rok'
    ];
}
