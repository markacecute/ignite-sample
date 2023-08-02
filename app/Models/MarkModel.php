<?php

namespace App\Models;

use CodeIgniter\Model;

class MarkModel extends Model
{
    protected $table      = 'hotdog';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['id', 'class'];

    
}