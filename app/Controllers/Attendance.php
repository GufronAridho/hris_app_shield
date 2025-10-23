<?php

namespace App\Controllers;

use App\Models\AttendanceModel;
use App\Models\LeaveModel;
use App\Models\MstHolidayModel;
use App\Models\EmployeeModel;
use App\Models\MstShiftModel;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class Attendance extends BaseController
{
    protected $AttendanceModel;
    protected $LeaveModel;
    protected $MstHolidayModel;
    protected $EmployeeModel;
    protected $MstShiftModel;

    public function __construct()
    {
        $this->AttendanceModel = new AttendanceModel();
        $this->LeaveModel = new LeaveModel();
        $this->MstHolidayModel = new MstHolidayModel();
        $this->EmployeeModel = new EmployeeModel();
        $this->MstShiftModel = new MstShiftModel();
    }

    private function _json_response($status, $message, $is_validation = false)
    {
        return $this->response->setJSON([
            'status' => $status,
            'message' => $message,
            'is_validation' => $is_validation,
            'csrfHash' => csrf_hash()
        ]);
    }

    public function attendance()
    {
        $data = [
            'title' => 'Attendance',
        ];
        return view('attendance/attendance', $data);
    }

    public function summary()
    {
        $data = [
            'title' => 'Summary',
        ];
        return view('attendance/summary', $data);
    }

    public function check_in()
    {
        $data = [
            'title' => 'Check in',
        ];
        return view('attendance/check_in', $data);
    }

    public function check_out()
    {
        $data = [
            'title' => 'Check out',
        ];
        return view('attendance/check_out', $data);
    }

    public function emp_check_in()
    {
        if ($this->request->is('post')) {
            $emp_id = $this->request->getPost('emp_id');
            if (empty($emp_id)) {
                return redirect()->back()->withInput()->with('error', 'Please enter your Employee ID.');
            }

            $employee = $this->EmployeeModel->where('emp_id', $emp_id)->first();
            if (!$employee) {
                return redirect()->back()->withInput()->with('error', 'No employee record found for the provided ID.');
            }

            $result = $this->AttendanceModel->checkIn($emp_id);

            if ($result['success']) {
                $formatted_now = date('h:i A', strtotime($result['time']));
                return redirect()->back()->with('message', "Hello {$employee['name']}, check-in successful at {$formatted_now}!");
            } else {
                return redirect()->back()->with('error', $result['error']);
            }
        }
        return redirect()->back()->withInput()->with('error', 'Invalid request method.');
    }

    public function emp_check_out()
    {
        if ($this->request->is('post')) {
            $emp_id = $this->request->getPost('emp_id');
            if (empty($emp_id)) {
                return redirect()->back()->withInput()->with('error', 'Please enter your Employee ID.');
            }

            $employee = $this->EmployeeModel->where('emp_id', $emp_id)->first();
            if (!$employee) {
                return redirect()->back()->withInput()->with('error', 'No employee record found for the provided ID.');
            }

            $result = $this->AttendanceModel->checkOut($emp_id);

            if ($result['success']) {
                $formatted_now = date('h:i A', strtotime($result['time']));
                return redirect()->back()->with('message', "See you soon {$employee['name']}, check-out successful at {$formatted_now}!");
            } else {
                return redirect()->back()->with('error', $result['error']);
            }
        }
        return redirect()->back()->withInput()->with('error', 'Invalid request method.');
    }

    public function summary_table()
    {
        $attendance_date = $this->request->getGet('attendance_date');
        $item = $this->AttendanceModel->summary_table($attendance_date);

        $statusCount = [
            'total_employees' => 0,
            'Present' => 0,
            'Absent' => 0,
            'Holiday' => 0
        ];
        $workStatusCount = [
            'On Time' => 0,
            'Late' => 0,
            'Left Early' => 0,
            'Late & Left Early' => 0
        ];
        foreach ($item as $i) {
            $statusCount['total_employees']++;
            $status = $i->attendance_status;
            if (isset($statusCount[$status])) {
                $statusCount[$status]++;
            }
            $work = $i->work_status;
            if (isset($workStatusCount[$work])) {
                $workStatusCount[$work]++;
            }
        }
        $data = [
            'item' => $item,
        ];
        $table_html = view('attendance/partial/summary_table', $data);
        return $this->response->setJSON([
            'table' => $table_html,
            'statusCount' => $statusCount,
            'workStatusCount' => $workStatusCount
        ]);
    }

    public function update_attendance()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('attendance_id');
            if (empty($id)) {
                return $this->_json_response(false, 'Missing ID.');
            }

            $attendance_date = $this->request->getPost('attendance_date');
            $time_in = $this->request->getPost('time_in');
            $time_out = $this->request->getPost('time_out');

            $data = [
                'time_in' => $time_in ? $attendance_date . ' ' . $time_in . ':00' : null,
                'time_out' => $time_out ? $attendance_date . ' ' . $time_out . ':00' : null,
                'attendance_status' => $this->request->getPost('attendance_status'),
            ];
            try {
                if ($this->AttendanceModel->update($id, $data)) {
                    return $this->_json_response(true, 'Attendance updated successfully');
                } else {
                    $errors = $this->AttendanceModel->errors();
                    $message = implode(', ', $errors);
                    return $this->_json_response(false, $message);
                };
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }

    public function delete_attendance()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('id');
            if (empty($id)) {
                return $this->_json_response(false, 'Missing ID.');
            }

            try {
                if ($this->AttendanceModel->delete($id)) {
                    return $this->_json_response(true, 'Attendance deleted successfully');
                } else {
                    return $this->_json_response(false, 'Failed to delete attendance');
                }
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }
}
