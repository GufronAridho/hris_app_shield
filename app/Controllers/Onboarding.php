<?php

namespace App\Controllers;

use App\Models\MstChecklistModel;
use App\Models\OnboardingModel;
use App\Models\EmployeeModel;
use PhpParser\Node\Stmt\ElseIf_;

class Onboarding extends BaseController
{
    protected $MstChecklistModel;
    protected $OnboardingModel;
    protected $EmployeeModel;

    public function __construct()
    {
        $this->MstChecklistModel = new MstChecklistModel;
        $this->OnboardingModel = new OnboardingModel();
        $this->EmployeeModel = new EmployeeModel();
    }

    public function summary()
    {
        return view('onboarding/summary', [
            'title' => 'Summary',
        ]);
    }

    public function profile()
    {
        return view('onboarding/profile', [
            'title' => 'Profile',
        ]);
    }

    public function document_checklist($emp_id)
    {
        $item = $this->EmployeeModel->select('name, dept_head, hr_partner')
            ->join('mst_dept', 'mst_employee.department = mst_dept.department', 'left')
            ->where('emp_id', $emp_id)
            ->first();

        $data = [
            'emp_id' => $emp_id,
            'name' => $item['name'] ?? null,
            'dept_head' => $item['dept_head'] ?? 'No Recorded Data',
            'hr_partner' => $item['hr_partner'] ?? 'No Recorded Data',
            'title' => 'Document Checklist',
        ];
        return view('onboarding/document_checklist', $data);
    }

    public function it_checklist($emp_id)
    {
        $item = $this->EmployeeModel->select('name, dept_head, hr_partner')
            ->join('mst_dept', 'mst_employee.department = mst_dept.department', 'left')
            ->where('emp_id', $emp_id)
            ->first();

        $data = [
            'emp_id' => $emp_id,
            'name' => $item['name'] ?? null,
            'dept_head' => $item['dept_head'] ?? 'No Recorded Data',
            'hr_partner' => $item['hr_partner'] ?? 'No Recorded Data',
            'title' => 'IT Checklist',
        ];
        return view('onboarding/it_checklist', $data);
    }

    public function onboarding_task($emp_id)
    {
        $item = $this->EmployeeModel->select('name, dept_head, hr_partner')
            ->join('mst_dept', 'mst_employee.department = mst_dept.department', 'left')
            ->where('emp_id', $emp_id)
            ->first();

        $data = [
            'emp_id' => $emp_id,
            'name' => $item['name'] ?? null,
            'dept_head' => $item['dept_head'] ?? 'No Recorded Data',
            'hr_partner' => $item['hr_partner'] ?? 'No Recorded Data',
            'title' => 'Onboarding Task',
        ];
        return view('onboarding/onboarding_task', $data);
    }

    private function _json_response($status, $message)
    {
        echo json_encode([
            'status' => $status,
            'message' => $message,
            'csrfHash' => csrf_hash()
        ]);
        exit;
    }

    public function document_table()
    {
        $emp_id = $this->request->getGet('emp_id');
        $check_cat = $this->request->getGet('check_cat');
        $item = $this->OnboardingModel->where('emp_id', $emp_id)
            ->where('check_cat', $check_cat)->findAll();
        $data = [
            'item' => $item
        ];
        return view('onboarding/partial/document_table', $data);
    }

    public function it_table()
    {
        $emp_id = $this->request->getGet('emp_id');
        $check_cat = $this->request->getGet('check_cat');
        $item = $this->OnboardingModel->where('emp_id', $emp_id)
            ->where('check_cat', $check_cat)->findAll();
        $data = [
            'item' => $item
        ];
        return view('onboarding/partial/it_table', $data);
    }

    public function onboarding_table()
    {
        $emp_id = $this->request->getGet('emp_id');
        $check_cat = $this->request->getGet('check_cat');
        $item = $this->OnboardingModel->where('emp_id', $emp_id)
            ->where('check_cat', $check_cat)->findAll();
        $data = [
            'item' => $item
        ];
        return view('onboarding/partial/onboarding_table', $data);
    }

    public function summary_table()
    {
        $item = $this->OnboardingModel
            ->select("tbl_onboarding.emp_id, b.name, b.join_date,
            CASE 
                WHEN SUM(CASE WHEN check_cat = 'Document' AND document IS NULL THEN 1 ELSE 0 END) = 0 
                THEN 'Complete' 
                ELSE 'In Progress' 
            END AS status_document,
            CASE 
                WHEN SUM(CASE WHEN check_cat = 'IT' AND document IS NULL THEN 1 ELSE 0 END) = 0 
                THEN 'Complete' 
                ELSE 'In Progress' 
            END AS status_it,
            CASE 
                WHEN SUM(CASE WHEN check_cat = 'Onboarding' AND document IS NULL THEN 1 ELSE 0 END) = 0 
                THEN 'Complete' 
                ELSE 'In Progress' 
            END AS status_onboarding", false)
            ->join('mst_employee b', 'tbl_onboarding.emp_id = b.emp_id')
            ->groupBy('tbl_onboarding.emp_id, b.name, b.join_date')
            ->findAll();

        $data = [
            'item' => $item
        ];
        return view('onboarding/partial/summary_table', $data);
    }

    public function profile_table()
    {
        $item = $this->OnboardingModel
            ->select("tbl_onboarding.emp_id, b.name, b.join_date,
            organization, manager, hr_partner, email, emp_grade,
            CASE 
                WHEN organization IS NULL OR manager IS NULL OR hr_partner IS NULL OR email IS NULL 
                THEN 'Incomplete' 
                ELSE 'Complete' 
            END AS status", false)
            ->join('mst_employee b', 'tbl_onboarding.emp_id = b.emp_id')
            ->groupBy('tbl_onboarding.emp_id, b.name, b.join_date, organization, manager, hr_partner, email')
            ->findAll();

        $data = [
            'item' => $item
        ];
        return view('onboarding/partial/profile_table', $data);
    }

    public function upload_document()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('id');
            $check_cat = $this->request->getPost('check_cat');
            $document = $this->request->getFile('file');

            if (empty($id) || empty($check_cat) || !$document) {
                return $this->_json_response(false, 'Missing required data: ID, category, or file.');
            }

            if ($check_cat == 'Document') {
                $destinationFolder = FCPATH . 'onboarding/document';
            } elseif ($check_cat == 'IT') {
                $destinationFolder = FCPATH . 'onboarding/it';
            } elseif ($check_cat == 'Onboarding') {
                $destinationFolder = FCPATH . 'onboarding/onboarding';
            } else {
                return $this->_json_response(false, 'Invalid category.');
            }

            if ($document && $document->isValid() && !$document->hasMoved()) {
                $new_name = $document->getRandomName();
                $document->move($destinationFolder, $new_name);

                $data = [
                    'document' => $this->request->getPost('emp_id'),
                    'status' => 'OK',
                    'completed_at' => date('Y-m-d H:i:s')
                ];

                try {
                    if ($this->OnboardingModel->update($id, $data)) {
                        return $this->_json_response(true, 'Upload document successfully');
                    } else {
                        $errors = $this->OnboardingModel->errors();
                        $message = implode(', ', $errors);
                        return $this->_json_response(false, $message);
                    }
                } catch (\Exception $e) {
                    return $this->_json_response(false, $e->getMessage());
                }
            } else {
                return $this->_json_response(false, 'File upload failed.');
            }
        }

        return $this->_json_response(false, 'Invalid request method');
    }

    public function update_profile()
    {
        if ($this->request->is('post')) {
            $emp_id = $this->request->getPost('emp_id');
            if (empty($emp_id)) {
                return $this->_json_response(false, 'Missing ID.');
            }
            $data = [
                'email' => ($this->request->getPost('email') === '') ? null : $this->request->getPost('email'),
                'manager' => $this->request->getPost('manager') ?? null,
                'hr_partner' => $this->request->getPost('hr_partner') ?? null,
                'emp_grade' => $this->request->getPost('emp_grade') ?? null,
                'organization' => ($this->request->getPost('organization') == '') ? null : $this->request->getPost('organization'),
            ];
            if ($this->EmployeeModel->where('emp_id', $emp_id)
                ->set($data)
                ->update()
            ) {
                return $this->_json_response(true, 'Update profile successfully');
            } else {
                $errors = $this->EmployeeModel->errors();
                $message = implode(', ', $errors);
                return $this->_json_response(false, $message);
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }
}
