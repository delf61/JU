<?php
namespace App\Models;

use CodeIgniter\Model;

class BankStatementModel extends Model
{
    protected $table = 'ucet';
    protected $primaryKey = 'b';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = [
        'a', 'b', 'c', 'd', 'ba', 'cu', 'ua', 'pa', 'qa', 'ra', 'ba1', 'cu1', 'nova', 'vydaj', 'rok'
    ];
}
