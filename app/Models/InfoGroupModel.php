<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoGroupModel extends Model
{
    protected $table            = 'info_group';
    protected $primaryKey       = 'group_id';
    protected $allowedFields    = [
        'group_name',
        'group_type',
        'description'
    ];
}
