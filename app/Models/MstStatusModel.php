<?php

namespace App\Models;

use CodeIgniter\Model;

class MstStatusModel extends Model
{
    protected $table = 'mst_status';
    protected $primaryKey = 'id';
    protected $allowedFields = ['status', 'updated_by'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $skipValidation = false;
    protected $validationRules = [
        'status' => 'required|safe_string|is_unique[mst_status.status]',
        'updated_by' => 'safe_string',
    ];
    protected $validationMessages = [
        'status' => [
            'required'    => 'Status is required.',
            'safe_string' => 'Status contains invalid characters.',
            'is_unique'   => 'Status must be unique.',
        ],
        'updated_by' => [
            'safe_string' => 'Updated by contains invalid characters.',
        ]
    ];
}
