<?php

namespace App\Models;

use CodeIgniter\Model;

class Poll extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'polls';
    protected $primaryKey           = 'poll_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['title', 'end_at', 'stake', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';
}
