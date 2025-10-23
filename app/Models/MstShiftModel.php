<?php

namespace App\Models;

use CodeIgniter\Model;

class MstShiftModel extends Model
{
    protected $table = 'mst_shift';
    protected $primaryKey = 'shift_id';
    protected $allowedFields = [
        'shift_name',
        'start_time',
        'end_time',
        'break_minutes',
        'total_hours',
        'remarks',
        'grace_minutes'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
