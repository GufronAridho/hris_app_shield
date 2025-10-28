<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoEmployeeWorkspaceModel extends Model
{
    protected $table            = 'info_employee_workspace';
    protected $primaryKey       = false;
    protected $useAutoIncrement = false;
    protected $allowedFields    = [
        'emp_id',
        'workspace_id',
        'role_in_workspace'
    ];

    public function get_workspace($empId)
    {
        return $this->select('info_employee_workspace.*, info_workspace.workspace_name, info_workspace.workspace_type
        ,info_workspace.description, info_workspace.status')
            ->join('info_workspace', 'info_workspace.workspace_id = info_employee_workspace.workspace_id')
            ->where('info_employee_workspace.emp_id', $empId)
            ->findAll();
    }
}
