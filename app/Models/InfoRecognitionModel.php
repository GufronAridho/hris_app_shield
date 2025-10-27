<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoRecognitionModel extends Model
{
    protected $table            = 'info_recognitions';
    protected $primaryKey       = 'recognition_id';
    protected $allowedFields    = [
        'emp_id',
        'title',
        'description',
        'date_given',
        'given_by'
    ];
    protected $skipValidation     = false;
    protected $validationRules = [
        'emp_id'      => 'required|min_length[3]|max_length[255]',
        'title'       => 'permit_empty|max_length[150]',
        'description' => 'permit_empty',
        'date_given'  => 'permit_empty|valid_date',
        'given_by'    => 'permit_empty|max_length[255]'
    ];
    protected $validationMessages = [];
}
