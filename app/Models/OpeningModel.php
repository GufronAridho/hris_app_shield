<?php

namespace App\Models;

use CodeIgniter\Model;

class OpeningModel extends Model
{
    protected $table = 'tbl_opening';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'job_id',
        'position',
        'department',
        'location',
        'status',
        'description',
        'posted_date',
        'closing_date'
    ];
    protected $skipValidation = false;

    protected $validationRules = [
        'job_id' => 'required|safe_string|is_unique[tbl_opening.job_id]',
        'position' => 'required|safe_string',
        'department' => 'required|safe_string',
        'location' => 'required|safe_string',
        'status' => 'required|safe_string',
        'description' => 'permit_empty|safe_string',
        'posted_date' => 'required|valid_date',
        'closing_date' => 'required|valid_date'
    ];

    protected $validationMessages = [
        'job_id' => [
            'required' => 'Job ID is required.',
            'safe_string' => 'Job ID contains invalid characters.',
            'is_unique' => 'Job ID must be unique.'
        ],
        'position' => [
            'required' => 'Position is required.',
            'safe_string' => 'Position contains invalid characters.'
        ],
        'department' => [
            'required' => 'Department is required.',
            'safe_string' => 'Department contains invalid characters.'
        ],
        'location' => [
            'required' => 'Location is required.',
            'safe_string' => 'Location contains invalid characters.'
        ],
        'status' => [
            'required' => 'Status is required.',
            'safe_string' => 'Status contains invalid characters.'
        ],
        'description' => [
            'safe_string' => 'Description contains invalid characters.'
        ],
        'posted_date' => [
            'required' => 'Posted Date is required.',
            'valid_date' => 'Posted Date must be a valid date.'
        ],
        'closing_date' => [
            'required' => 'Closing Date is required.',
            'valid_date' => 'Closing Date must be a valid date.'
        ]
    ];
}
