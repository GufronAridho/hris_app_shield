<?php

namespace App\Models;

use CodeIgniter\Model;

class AttendanceModel extends Model
{
    protected $table = 'tbl_attendance';
    protected $primaryKey = 'attendance_id';
    protected $allowedFields = [
        'emp_id',
        'attendance_date',
        'time_in',
        'time_out',
        'work_hours',
        'attendance_status',
        'remarks'
    ];

    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    protected $skipValidation = false;

    protected $validationRules = [
        'emp_id' => 'required|safe_string',
        'attendance_date'  => 'required|valid_date',
    ];

    protected $validationMessages = [
        'emp_id' => [
            'required' => 'Employee ID is required.',
            'safe_string' => 'Employee ID contains invalid characters.'
        ],
        'attendance_date' => [
            'required' => 'Attendance Date is required.',
            'valid_date' => 'Attendance Date is not valid date'
        ]
    ];

    public function checkIn($emp_id)
    {
        $current_date = date('Y-m-d');
        $time_now = date('Y-m-d H:i:s');

        $attendance = $this->where('emp_id', $emp_id)
            ->where('attendance_date', $current_date)
            ->first();

        if (!$attendance) {
            return ['success' => false, 'error' => "No attendance record found for {$current_date}. Please contact admin."];
        }

        if (!empty($attendance['time_in'])) {
            return ['success' => false, 'error' => "Already checked in at " . date('h:i A', strtotime($attendance['time_in']))];
        }

        $this->skipValidation(true)
            ->where('emp_id', $emp_id)
            ->where('attendance_date', $current_date)
            ->set([
                'time_in' => $time_now,
                'attendance_status' => 'Present',
                'updated_at' => $time_now
            ])->update();

        return ['success' => true, 'time' => $time_now];
    }

    public function checkOut($emp_id)
    {
        $current_date = date('Y-m-d');
        $time_now = date('Y-m-d H:i:s');

        $attendance = $this->where('emp_id', $emp_id)
            ->where('attendance_date', $current_date)
            ->first();

        if (!$attendance) {
            return ['success' => false, 'error' => "No attendance record found for {$current_date}. Please contact admin."];
        }

        if (!empty($attendance['time_out'])) {
            return ['success' => false, 'error' => "Already checked out at " . date('h:i A', strtotime($attendance['time_out']))];
        }

        $this->skipValidation(true)
            ->where('emp_id', $emp_id)
            ->where('attendance_date', $current_date)
            ->set([
                'time_out' => $time_now,
                'updated_at' => $time_now
            ])->update();

        return ['success' => true, 'time' => $time_now];
    }

    public function summary_table($attendance_date)
    {
        return $this->select("attendance_id, tbl_attendance.emp_id, b.name, attendance_date,
        c.shift_name, time_in, time_out, attendance_status,
        tbl_attendance.work_hours, c.total_hours, 
        CASE 
            WHEN time_in IS NULL AND time_out IS NULL THEN '-' 
            WHEN time_in > ADDTIME(c.start_time, SEC_TO_TIME(c.grace_minutes*60)) AND time_out < c.end_time THEN 'Late & Left Early'
            WHEN time_in > ADDTIME(c.start_time, SEC_TO_TIME(c.grace_minutes*60)) THEN 'Late'
            WHEN time_out < c.end_time THEN 'Left Early'
            ELSE 'On Time'
        END AS work_status", false)
            ->join('mst_employee b', 'tbl_attendance.emp_id = b.emp_id')
            ->join('mst_shift c', 'b.shift_id = c.shift_id')
            ->where('attendance_date', $attendance_date)
            ->get()
            ->getResult();
    }
}
