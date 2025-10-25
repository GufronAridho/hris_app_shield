<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'mst_employee';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'emp_id',
        'name',
        'gender',
        'join_date',
        'emp_type',
        'organization',
        'department',
        'job_title',
        'manager',
        'hr_partner',
        'location',
        'emp_grade',
        'status',
        'resign_date',
        'created_at',
        'updated_at',
        'email',
        'photo',
        'no_hp',
        'shift_id'
    ];

    public function generateEmpId()
    {
        $lastEmp = $this->select('emp_id')
            ->orderBy('emp_id', 'DESC')
            ->first();

        if ($lastEmp && preg_match('/EMP(\d+)/', $lastEmp['emp_id'], $matches)) {
            $nextNumber = intval($matches[1]) + 1;
        } else {
            $nextNumber = 1;
        }

        return 'EMP' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
    }

    protected $skipValidation = false;

    protected $validationRules = [
        'emp_id' => 'required|safe_string|is_unique[mst_employee.emp_id]',
        'name' => 'required|safe_string',
        'gender' => 'required|safe_string',
        'join_date' => 'required',
        'emp_type' => 'required|safe_string',
        'organization' => 'permit_empty|safe_string',
        'department' => 'required|safe_string',
        'job_title' => 'required|safe_string',
        'manager' => 'permit_empty|safe_string',
        'hr_partner' => 'permit_empty|safe_string',
        'location' => 'permit_empty|safe_string',
        'emp_grade' => 'permit_empty|decimal',
        'status' => 'required|safe_string',
        'email' => 'permit_empty|valid_email',
    ];

    protected $validationMessages = [
        'emp_id' => [
            'required' => 'Employee ID is required',
            'safe_string' => 'Employee ID contains invalid characters',
            'is_unique' => 'Employee ID must be unique',
        ],
        'name' => [
            'required' => 'Name is required',
            'safe_string' => 'Name contains invalid characters',
        ],
        'gender' => [
            'required' => 'Gender is required',
            'safe_string' => 'Gender contains invalid characters',
        ],
        'join_date' => [
            'required' => 'Join date is required',
        ],
        'emp_type' => [
            'required' => 'Employee type is required',
            'safe_string' => 'Employee type contains invalid characters',
        ],
        'organization' => [
            'safe_string' => 'Organization contains invalid characters',
        ],
        'department' => [
            'required' => 'Department is required',
            'safe_string' => 'Department contains invalid characters',
        ],
        'job_title' => [
            'required' => 'Job title is required',
            'safe_string' => 'Job title contains invalid characters',
        ],
        'manager' => [
            'safe_string' => 'Manager contains invalid characters',
        ],
        'hr_partner' => [
            'safe_string' => 'HR Partner contains invalid characters',
        ],
        'location' => [
            'required' => 'Location is required',
            'safe_string' => 'Location contains invalid characters',
        ],
        'emp_grade' => [
            'decimal' => 'Employee grade contain only numbers (you can include decimals)',
        ],
        'status' => [
            'required' => 'Status is required',
            'safe_string' => 'Status contains invalid characters',
        ],
        'email' => [
            'valid_email' => 'Please enter a valid email address'
        ],
    ];
}
