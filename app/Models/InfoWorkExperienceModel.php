<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoWorkExperienceModel extends Model
{
    protected $table = 'info_work_experience';
    protected $primaryKey = 'experience_id';
    protected $allowedFields = [
        'emp_id',
        'company_name',
        'job_title',
        'start_date',
        'end_date'
    ];
}
