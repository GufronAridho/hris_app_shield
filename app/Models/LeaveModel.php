<?php

namespace App\Models;

use CodeIgniter\Model;

class LeaveModel extends Model
{
    protected $table = 'tbl_leave';
    protected $primaryKey = 'leave_id';
    protected $allowedFields = [
        'emp_id',
        'leave_type',
        'start_date',
        'end_date',
        'reason',
        'approval_status',
        'approved_by'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
