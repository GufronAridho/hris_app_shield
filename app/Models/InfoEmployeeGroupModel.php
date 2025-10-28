<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoEmployeeGroupModel extends Model
{
    protected $table            = 'info_employee_group';
    protected $primaryKey       = false;
    protected $useAutoIncrement = false;
    protected $allowedFields    = [
        'emp_id',
        'group_id',
        'role'
    ];

    public function employee_group($emp_id)
    {
        return $this->select('info_employee_group.emp_id, b.group_name, b.group_type, info_employee_group.role')
            ->join('info_group b', 'info_employee_group.group_id = b.group_id')
            ->where('info_employee_group.emp_id', $emp_id)
            ->findAll();
    }
}
