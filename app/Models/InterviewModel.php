<?php

namespace App\Models;

use CodeIgniter\Model;

class InterviewModel extends Model
{
    protected $table = 'tbl_interview';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'candidate_id',
        'interviewer',
        'interview_date',
        'rating',
        'status',
        'remarks'
    ];
    protected $skipValidation = false;

    protected $validationRules = [
        'candidate_id' => 'required|integer',
        'interviewer' => 'required|safe_string',
        'interview_date' => 'required|valid_date',
        'rating' => 'permit_empty|integer|greater_than_equal_to[0]|less_than_equal_to[10]',
        'status' => 'permit_empty|safe_string',
        'remarks' => 'permit_empty|safe_string'
    ];

    protected $validationMessages = [
        'candidate_id' => [
            'required' => 'Candidate ID is required.',
            'integer' => 'Candidate ID must be a valid integer.'
        ],
        'interviewer' => [
            'required' => 'Interviewer name is required.',
            'safe_string' => 'Interviewer name contains invalid characters.'
        ],
        'interview_date' => [
            'required' => 'Interview date is required.',
            'valid_date' => 'Interview date must be in a valid format'
        ],
        'rating' => [
            'integer' => 'Rating must be an integer.',
            'greater_than_equal_to' => 'Rating must be at least 0.',
            'less_than_equal_to' => 'Rating cannot exceed 10.'
        ],
        'status' => [
            'safe_string' => 'Status contains invalid characters.'
        ],
        'remarks' => [
            'safe_string' => 'Remarks contain invalid characters.'
        ]
    ];
}
