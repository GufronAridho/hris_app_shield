<?php

namespace App\Models;

use CodeIgniter\Model;

class OnboardingModel extends Model
{
    protected $table = 'tbl_onboarding';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'emp_id',
        'check_id',
        'check_cat',
        'check_quest',
        'document',
        'status',
        'remarks',
        'created_at',
        'completed_at'
    ];

    protected $skipValidation = false;

    protected $validationRules = [
        'emp_id' => 'required|safe_string',
        'check_id' => 'required|safe_string',
        'check_cat' => 'required|safe_string',
        'check_quest' => 'required|safe_string',
        'document' => 'permit_empty|safe_string',
        'status' => 'permit_empty|safe_string',
        'remarks' => 'permit_empty|safe_string'
    ];

    protected $validationMessages = [
        'emp_id' => [
            'required' => 'Employee ID is required.',
            'safe_string' => 'Employee ID contains invalid characters.'
        ],
        'check_id' => [
            'required' => 'Checklist ID is required.',
            'safe_string' => 'Checklist ID contains invalid characters.'
        ],
        'check_cat' => [
            'required' => 'Checklist category is required.',
            'safe_string' => 'Checklist category contains invalid characters.'
        ],
        'check_quest' => [
            'required' => 'Checklist question is required.',
            'safe_string' => 'Checklist question contains invalid characters.'
        ],
        'document' => [
            'safe_string' => 'Document contains invalid characters.'
        ],
        'status' => [
            'safe_string' => 'Status contains invalid characters.'
        ],
        'remarks' => [
            'safe_string' => 'Remarks contain invalid characters.'
        ],
    ];
}
