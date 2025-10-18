<?php

namespace App\Controllers;

use App\Models\MstChecklistModel;
use App\Models\MstDeptModel;
use App\Models\MstEmpTypeModel;
use App\Models\MstJobModel;
use App\Models\MstStatusModel;
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
    protected $users;
    protected $user;
    public function __construct()
    {
        $this->MstChecklistModel = new MstChecklistModel();
        $this->MstDeptModel = new MstDeptModel();
        $this->MstEmpTypeModel = new MstEmpTypeModel();
        $this->MstJobModel = new MstJobModel();
        $this->MstStatusModel = new MstStatusModel();
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

    public function create_check_cat()
    {
        if ($this->request->is('post')) {
            $data = [
                'check_cat' => $this->request->getPost('check_cat'),
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
                'check_cat' => $this->request->getPost('check_cat'),
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
}
