<?php

namespace App\Models;

use CodeIgniter\Model;

class MstJobModel extends Model
{
    protected $table = 'mst_job';
    protected $primaryKey = 'id';
    protected $allowedFields = ['job_title', 'updated_by'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $skipValidation = false;
    protected $validationRules = [
        'job_title' => 'required|safe_string|is_unique[mst_job.job_title]',
        'updated_by' => 'safe_string',
    ];
    protected $validationMessages = [
        'job_title' => [
            'required'    => 'Job title is required.',
            'safe_string' => 'Job title contains invalid characters.',
            'is_unique'   => 'Job title must be unique.',
        ],
        'updated_by' => [
            'safe_string' => 'Updated by contains invalid characters.',
        ]
    ];
}
