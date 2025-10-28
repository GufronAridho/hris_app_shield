<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoWorkspaceModel extends Model
{
    protected $table            = 'info_workspace';
    protected $primaryKey       = 'workspace_id';
    protected $useAutoIncrement = true;

    protected $allowedFields    = [
        'workspace_name',
        'workspace_type',
        'description',
        'status',
        'start_date',
        'end_date',
    ];
}
