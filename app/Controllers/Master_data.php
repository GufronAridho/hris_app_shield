<?php

namespace App\Controllers;

use App\Models\MstChecklistModel;
use App\Models\MstDeptModel;
use App\Models\MstEmpTypeModel;
use App\Models\MstJobModel;
use App\Models\MstStatusModel;
use App\Models\MstShiftModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use CodeIgniter\Controller;

class Master_data extends BaseController
{
    protected $MstChecklistModel;
    protected $MstDeptModel;
    protected $MstEmpTypeModel;
    protected $MstJobModel;
    protected $MstStatusModel;
    protected $MstShiftModel;
    protected $users;
    protected $user;
    public function __construct()
    {
        $this->MstChecklistModel = new MstChecklistModel();
        $this->MstDeptModel = new MstDeptModel();
        $this->MstEmpTypeModel = new MstEmpTypeModel();
        $this->MstJobModel = new MstJobModel();
        $this->MstStatusModel = new MstStatusModel();
        $this->MstShiftModel = new MstShiftModel();
        $this->users = auth()->getProvider();
        $this->user = auth()->user();
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

    public function mst_checklist()
    {
        return view('master_data/mst_checklist', [
            'title' => 'Checklist',
        ]);
    }

    public function mst_dept()
    {
        return view('master_data/mst_dept', [
            'title' => 'Department',
        ]);
    }

    public function mst_emp_type()
    {
        return view('master_data/mst_emp_type', [
            'title' => 'Emp Type',
        ]);
    }

    public function mst_job()
    {
        return view('master_data/mst_job', [
            'title' => 'Job',
        ]);
    }

    public function mst_status()
    {
        return view('master_data/mst_status', [
            'title' => 'Status',
        ]);
    }

    public function mst_user()
    {
        return view('master_data/mst_user', [
            'title' => 'User Managment',
        ]);
    }

    public function mst_shift()
    {
        return view('master_data/mst_shift', [
            'title' => 'Shift',
        ]);
    }

    public function checklist_table()
    {
        $item = $this->MstChecklistModel->findAll();
        $data = [
            'item' => $item
        ];
        return view('master_data/partial/checklist_table', $data);
    }

    public function dept_table()
    {
        $item = $this->MstDeptModel->findAll();
        $data = [
            'item' => $item
        ];
        return view('master_data/partial/dept_table', $data);
    }

    public function emp_type_table()
    {
        $item = $this->MstEmpTypeModel->findAll();
        $data = [
            'item' => $item
        ];
        return view('master_data/partial/emp_type_table', $data);
    }

    public function job_table()
    {
        $item = $this->MstJobModel->findAll();
        $data = [
            'item' => $item
        ];
        return view('master_data/partial/job_table', $data);
    }

    public function status_table()
    {
        $item = $this->MstStatusModel->findAll();
        $data = [
            'item' => $item
        ];
        return view('master_data/partial/status_table', $data);
    }

    public function user_table()
    {
        $auth = auth()->user();
        $data = [
            'item' => $auth
        ];
        dd($data);
    }

    public function shift_table()
    {
        $item = $this->MstShiftModel->findAll();
        $data = [
            'item' => $item
        ];
        return view('master_data/partial/shift_table', $data);
    }

    public function create_check_cat()
    {
        if ($this->request->is('post')) {

            $check_cat = $this->request->getPost('check_cat');
            $check_id = $this->MstChecklistModel->generateCheckID($check_cat);

            $data = [
                'check_id' => $check_id,
                'check_cat' => $check_cat,
                'check_quest' => $this->request->getPost('check_quest'),
            ];

            try {
                if ($this->MstChecklistModel->insert($data)) {
                    return $this->_json_response(true, 'Question created successfully');
                } else {
                    $errors = $this->MstChecklistModel->errors();
                    $message = implode(', ', $errors);
                    return $this->_json_response(false, $message);
                }
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }

        return $this->_json_response(false, 'Invalid request method');
    }

    public function update_check_cat()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('id');

            $data = [
                'chec_cat' => $this->request->getPost('check_cat'),
                'check_quest' => $this->request->getPost('check_quest'),
            ];

            try {
                if ($this->MstChecklistModel->update($id, $data)) {
                    return $this->_json_response(true, 'Question updated successfully');
                } else {
                    $errors = $this->MstChecklistModel->errors();
                    $message = implode(', ', $errors);
                    return $this->_json_response(false, $message);
                }
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }

        return $this->_json_response(false, 'Invalid request method');
    }

    public function delete_check_cat()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('id');

            try {
                if ($this->MstChecklistModel->delete($id)) {
                    return $this->_json_response(true, 'Question deleted successfully');
                } else {
                    return $this->_json_response(false, 'Failed to delete question');
                }
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }

        return $this->_json_response(false, 'Invalid request method');
    }

    public function create_dept()
    {
        if ($this->request->is('post')) {
            $data = [
                'dept_code' => $this->request->getPost('dept_code'),
                'department' => $this->request->getPost('department'),
                'dept_head' => $this->request->getPost('dept_head'),
            ];

            try {
                if ($this->MstDeptModel->insert($data)) {
                    return $this->_json_response(true, 'Department created successfully');
                }
                return $this->_json_response(false, implode(', ', $this->MstDeptModel->errors()));
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }

    public function update_dept()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('id');
            $data = [
                'dept_code' => $this->request->getPost('dept_code'),
                'department' => $this->request->getPost('department'),
                'dept_head' => $this->request->getPost('dept_head'),
            ];

            try {
                if ($this->MstDeptModel->update($id, $data)) {
                    return $this->_json_response(true, 'Department updated successfully');
                }
                return $this->_json_response(false, implode(', ', $this->MstDeptModel->errors()));
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }

    public function delete_dept()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('id');
            try {
                if ($this->MstDeptModel->delete($id)) {
                    return $this->_json_response(true, 'Department deleted successfully');
                }
                return $this->_json_response(false, 'Failed to delete department');
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }

    public function create_emp_type()
    {
        if ($this->request->is('post')) {
            $data = [
                'type' => $this->request->getPost('type'),
                'updated_by' => $this->user->username,
            ];

            try {
                if ($this->MstEmpTypeModel->insert($data)) {
                    return $this->_json_response(true, 'Employee type created successfully');
                }
                return $this->_json_response(false, implode(', ', $this->MstEmpTypeModel->errors()));
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }

    public function update_emp_type()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('id');
            $data = [
                'type' => $this->request->getPost('type'),
                'updated_by' => $this->user->username,
            ];

            try {
                if ($this->MstEmpTypeModel->update($id, $data)) {
                    return $this->_json_response(true, 'Employee type updated successfully');
                }
                return $this->_json_response(false, implode(', ', $this->MstEmpTypeModel->errors()));
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }

    public function delete_emp_type()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('id');
            try {
                if ($this->MstEmpTypeModel->delete($id)) {
                    return $this->_json_response(true, 'Employee type deleted successfully');
                }
                return $this->_json_response(false, 'Failed to delete employee type');
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }


    public function create_job()
    {
        if ($this->request->is('post')) {
            $data = [
                'job_title' => $this->request->getPost('job_title'),
                'updated_by' => $this->user->username,
            ];

            try {
                if ($this->MstJobModel->insert($data)) {
                    return $this->_json_response(true, 'Job created successfully');
                }
                return $this->_json_response(false, implode(', ', $this->MstJobModel->errors()));
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }

    public function update_job()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('id');
            $data = [
                'job_title' => $this->request->getPost('job_title'),
                'updated_by' => $this->user->username,
            ];

            try {
                if ($this->MstJobModel->update($id, $data)) {
                    return $this->_json_response(true, 'Job updated successfully');
                }
                return $this->_json_response(false, implode(', ', $this->MstJobModel->errors()));
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }

    public function delete_job()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('id');
            try {
                if ($this->MstJobModel->delete($id)) {
                    return $this->_json_response(true, 'Job deleted successfully');
                }
                return $this->_json_response(false, 'Failed to delete job');
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }

    public function create_status()
    {
        if ($this->request->is('post')) {
            $data = [
                'status' => $this->request->getPost('status'),
                'updated_by' => $this->user->username,
            ];

            try {
                if ($this->MstStatusModel->insert($data)) {
                    return $this->_json_response(true, 'Status created successfully');
                }
                return $this->_json_response(false, implode(', ', $this->MstStatusModel->errors()));
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }

    public function update_status()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('id');
            $data = [
                'status' => $this->request->getPost('status'),
                'updated_by' => $this->user->username,
            ];

            try {
                if ($this->MstStatusModel->update($id, $data)) {
                    return $this->_json_response(true, 'Status updated successfully');
                }
                return $this->_json_response(false, implode(', ', $this->MstStatusModel->errors()));
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }

    public function delete_status()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('id');
            try {
                if ($this->MstStatusModel->delete($id)) {
                    return $this->_json_response(true, 'Status deleted successfully');
                }
                return $this->_json_response(false, 'Failed to delete status');
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }

    public function create_shift()
    {
        if ($this->request->is('post')) {
            $data = [
                'shift_name' => $this->request->getPost('shift_name'),
                'start_time' => $this->request->getPost('start_time'),
                'end_time' => $this->request->getPost('end_time'),
                'break_minutes' => $this->request->getPost('break_minutes'),
                'total_hours' => $this->request->getPost('total_hours'),
                'grace_minutes' => $this->request->getPost('grace_minutes'),
            ];

            try {
                if ($this->MstShiftModel->insert($data)) {
                    return $this->_json_response(true, 'Shift created successfully');
                }
                return $this->_json_response(false, implode(', ', $this->MstShiftModel->errors()));
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }

    public function update_shift()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('shift_id');
            $data = [
                'shift_name' => $this->request->getPost('shift_name'),
                'start_time' => $this->request->getPost('start_time'),
                'end_time' => $this->request->getPost('end_time'),
                'break_minutes' => $this->request->getPost('break_minutes'),
                'total_hours' => $this->request->getPost('total_hours'),
                'grace_minutes' => $this->request->getPost('grace_minutes'),
            ];

            try {
                if ($this->MstShiftModel->update($id, $data)) {
                    return $this->_json_response(true, 'Shift updated successfully');
                }
                return $this->_json_response(false, implode(', ', $this->MstShiftModel->errors()));
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }

    public function delete_shift()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('id');
            try {
                if ($this->MstShiftModel->delete($id)) {
                    return $this->_json_response(true, 'Shift deleted successfully');
                }
                return $this->_json_response(false, 'Failed to delete shift');
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }
}
