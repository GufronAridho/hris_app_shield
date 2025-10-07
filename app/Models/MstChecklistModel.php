<?php

namespace App\Models;

use CodeIgniter\Model;

class MstChecklistModel extends Model
{
    protected $table = 'mst_checklist';
    protected $primaryKey = 'id';
    protected $allowedFields = ['check_cat', 'check_quest'];
    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    protected $skipValidation = false;
    protected $validationRules = [
        'check_cat' => 'required|safe_string',
        'check_quest' => 'required|safe_string',
    ];
    protected $validationMessages = [
        'check_cat' => [
            'required'    => 'Checklist category is required.',
            'safe_string' => 'Checklist category contains invalid characters.'
        ],
        'check_quest' => [
            'required'    => 'Checklist question is required.',
            'safe_string' => 'Checklist question contains invalid characters.'
        ]
    ];
}
