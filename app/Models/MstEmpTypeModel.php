<?php

namespace App\Models;

use CodeIgniter\Model;

class MstEmpTypeModel extends Model
{
    protected $table = 'mst_type';
    protected $primaryKey = 'id';
    protected $allowedFields = ['type', 'updated_by'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $skipValidation = false;
    protected $validationRules = [
        'job_title' => 'required|safe_string|is_unique[mst_type.Type]',
        'updated_by' => 'safe_string',
    ];
    protected $validationMessages = [
        'job_title' => [
            'required'    => 'Type is required.',
            'safe_string' => 'Type contains invalid characters.',
            'is_unique'   => 'Type must be unique.',
        ],
        'updated_by' => [
            'safe_string' => 'Updated by contains invalid characters.',
        ]
    ];
}
