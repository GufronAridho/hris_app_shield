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
        'no_hp'
    ];

    protected $skipValidation = false;

    protected $validationRules = [
        'emp_id'       => 'required|safe_string|is_unique[mst_employee.emp_id]',
        'name'         => 'required|safe_string',
        'gender'       => 'required|safe_string',
        'join_date'    => 'required',
        'emp_type'     => 'required|safe_string',
        'organization' => 'required|safe_string',
        'department'   => 'required|safe_string',
        'job_title'    => 'required|safe_string',
        'manager'      => 'required|safe_string',
        'hr_partner'   => 'required|safe_string',
        'location'     => 'required|safe_string',
        'emp_grade'    => 'required|decimal',
        'status'       => 'required|safe_string',
        'email'        => 'valid_email',
    ];

    protected $validationMessages = [
        'emp_id' => [
            'required'    => 'Employee ID is required.',
            'safe_string' => 'Employee ID contains invalid characters.',
            'is_unique'   => 'Employee ID must be unique.',
        ],
        'name' => [
            'required'    => 'Name is required.',
            'safe_string' => 'Name contains invalid characters.',
        ],
        'gender' => [
            'required'    => 'Gender is required.',
            'safe_string' => 'Gender contains invalid characters.',
        ],
        'join_date' => [
            'required'    => 'Join date is required.',
        ],
        'emp_type' => [
            'required'    => 'Employee type is required.',
            'safe_string' => 'Employee type contains invalid characters.',
        ],
        'organization' => [
            'required'    => 'Organization is required.',
            'safe_string' => 'Organization contains invalid characters.',
        ],
        'department' => [
            'required'    => 'Department is required.',
            'safe_string' => 'Department contains invalid characters.',
        ],
        'job_title' => [
            'required'    => 'Job title is required.',
            'safe_string' => 'Job title contains invalid characters.',
        ],
        'manager' => [
            'required'    => 'Manager is required.',
            'safe_string' => 'Manager contains invalid characters.',
        ],
        'hr_partner' => [
            'required'    => 'HR Partner is required.',
            'safe_string' => 'HR Partner contains invalid characters.',
        ],
        'location' => [
            'required'    => 'Location is required.',
            'safe_string' => 'Location contains invalid characters.',
        ],
        'emp_grade' => [
            'required'    => 'Employee grade is required.',
            'decimal' => 'Employee grade contain only numbers (you can include decimals).',
        ],
        'status' => [
            'required'    => 'Status is required.',
            'safe_string' => 'Status contains invalid characters.',
        ],
        'email' => [
            'valid_email' => 'Please enter a valid email address.'
        ],
    ];
}
