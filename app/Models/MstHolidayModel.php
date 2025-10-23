<?php

namespace App\Models;

use CodeIgniter\Model;

class MstHolidayModel extends Model
{
    protected $table = 'mst_holiday';
    protected $primaryKey = 'holiday_id';
    protected $allowedFields = [
        'holiday_date',
        'holiday_name',
        'is_recurring'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
