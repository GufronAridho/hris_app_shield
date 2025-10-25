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
    protected $skipValidation = false;

    protected $validationRules = [
        'emp_id' => 'required|safe_string',
        'leave_type' => 'required|safe_string',
        'start_date' => 'required|valid_date',
        'end_date' => 'required|valid_date',
        'reason' => 'permit_empty|safe_string',
        'approval_status' => 'permit_empty|safe_string',
        'approved_by' => 'permit_empty|alpha_space'
    ];

    protected $validationMessages = [
        'emp_id' => [
            'required' => 'Employee ID is required.',
            'safe_string' => 'Employee ID contains invalid characters.'
        ],
        'leave_type' => [
            'required' => 'Leave type is required.',
            'safe_string' => 'Leave type contains invalid characters.'
        ],
        'start_date' => [
            'required' => 'Start date is required.',
            'valid_date' => 'Please provide a valid start date (YYYY-MM-DD).'
        ],
        'end_date' => [
            'required' => 'End date is required.',
            'valid_date' => 'Please provide a valid end date (YYYY-MM-DD).'
        ],
        'reason' => [
            'safe_string' => 'Reason contains invalid characters.'
        ],
        'approval_status' => [
            'in_list' => 'Approval status must be one of: pending, approved, or rejected.'
        ],
        'approved_by' => [
            'safe_string' => 'Approved By contains invalid characters.'
        ]
    ];

    public function leave_table()
    {
        return $this->select('leave_id, tbl_leave.emp_id, b.name, leave_type, 
        start_date, end_date, reason, approval_status, approved_by')
            ->join('mst_employee b', 'tbl_leave.emp_id = b.emp_id')
            ->get()
            ->getResult();
    }
}
