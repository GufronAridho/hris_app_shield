<?php

namespace App\Models;

use CodeIgniter\Model;

class OnboardingModel extends Model
{
    protected $table = 'tbl_onboarding';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'emp_id',
        'candidate_id',
        'check_cat',
        'document',
        'status',
        'remarks',
        'timestamp'
    ];
    protected $skipValidation = false;

    protected $validationRules = [
        'emp_id'       => 'required|safe_string',
        'candidate_id' => 'required|integer',
        'check_cat'    => 'required|safe_string',
        'document'     => 'required|safe_string',
        'status'       => 'required|safe_string',
        'remarks'      => 'permit_empty|safe_string',
        'timestamp'    => 'required|valid_date'
    ];

    protected $validationMessages = [
        'emp_id' => [
            'required'    => 'Employee ID is required.',
            'safe_string' => 'Employee ID contains invalid characters.'
        ],
        'candidate_id' => [
            'required'    => 'Candidate ID is required.',
            'integer'     => 'Candidate ID must be a valid number.'
        ],
        'check_cat' => [
            'required'    => 'Checklist category is required.',
            'safe_string' => 'Checklist category contains invalid characters.'
        ],
        'document' => [
            'required'    => 'Document is required.',
            'safe_string' => 'Document contains invalid characters.'
        ],
        'status' => [
            'required'    => 'Status is required.',
            'safe_string' => 'Status contains invalid characters.'
        ],
        'remarks' => [
            'safe_string' => 'Remarks contain invalid characters.'
        ],
        'timestamp' => [
            'required'    => 'Timestamp is required.',
            'valid_date'  => 'Timestamp must be a valid date.'
        ]
    ];
}
