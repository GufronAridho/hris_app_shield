<?php

namespace App\Models;

use CodeIgniter\Model;

class CandidateModel extends Model
{
    protected $table = 'tbl_candidate';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'job_id',
        'candidate_name',
        'gender',
        'age',
        'education',
        'address',
        'phone',
        'email',
        'status',
        'timestamp'
    ];
    protected $skipValidation = false;

    protected $validationRules = [
        'job_id'         => 'required|safe_string',
        'candidate_name' => 'required|safe_string',
        'gender'         => 'permit_empty|safe_string',
        'age'            => 'permit_empty|integer|greater_than_equal_to[18]',
        'education'      => 'permit_empty|safe_string',
        'address'        => 'permit_empty|safe_string',
        'phone'          => 'permit_empty|safe_string',
        'email'          => 'permit_empty|valid_email',
    ];

    protected $validationMessages = [
        'job_id' => [
            'required'    => 'Job ID is required.',
            'safe_string' => 'Job ID contains invalid characters.'
        ],
        'candidate_name' => [
            'required'    => 'Candidate name is required.',
            'safe_string' => 'Candidate name contains invalid characters.'
        ],
        'gender' => [
            'safe_string' => 'Gender contains invalid characters.'
        ],
        'education' => [
            'safe_string' => 'Education field contains invalid characters.'
        ],
        'address' => [
            'safe_string' => 'Address contains invalid characters.'
        ],
        'phone' => [
            'safe_string' => 'Phone contains invalid characters.'
        ],
        'email' => [
            'valid_email' => 'Please enter a valid email address.'
        ]
    ];
}
