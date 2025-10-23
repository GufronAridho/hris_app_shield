<?php

namespace App\Models;

use CodeIgniter\Model;

class MstDeptModel extends Model
{
    protected $table = 'mst_dept';
    protected $primaryKey = 'id';
    protected $allowedFields = ['dept_code', 'department', 'dept_head'];
    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    protected $skipValidation = false;
    protected $validationRules = [
        'dept_code' => "required|safe_string",
        'department' => 'required|safe_string',
        'dept_head' => 'required|safe_string',
    ];
    protected $validationMessages = [
        'dept_code' => [
            'required'    => 'Dept code is required.',
            'safe_string' => 'Dept code is required contains invalid characters.',
        ],
        'department' => [
            'required'    => 'Department is required.',
            'safe_string' => 'Department contains invalid characters.'
        ],
        'dept_head' => [
            'required'    => 'Dept Head is required.',
            'safe_string' => 'Dept Head contains invalid characters.'
        ]
    ];
}
