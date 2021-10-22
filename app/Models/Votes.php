<?php

namespace App\Models;

use CodeIgniter\Model;

class Votes extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'votes';
    protected $primaryKey           = 'vote_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['poll_id', 'option_id', 'user_id', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';
}
