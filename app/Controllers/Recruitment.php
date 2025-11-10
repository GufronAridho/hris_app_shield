<?php

namespace App\Controllers;

use App\Models\CandidateModel;
use App\Models\InterviewModel;
use App\Models\OpeningModel;
use App\Models\EmployeeModel;
use App\Models\MstChecklistModel;
use App\Models\OnboardingModel;

class Recruitment extends BaseController
{
    protected $CandidateModel;
    protected $InterviewModel;
    protected $OpeningModel;
    protected $EmployeeModel;
    protected $MstChecklistModel;
    protected $OnboardingModel;
    protected $layout_emp;

    public function __construct()
    {
        $this->CandidateModel = new CandidateModel();
        $this->InterviewModel = new InterviewModel();
        $this->OpeningModel = new OpeningModel();
        $this->EmployeeModel = new EmployeeModel();
        $this->MstChecklistModel = new MstChecklistModel();
        $this->OnboardingModel = new OnboardingModel();
        $this->layout_emp = $this->EmployeeModel->get_layout_emp();
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

    public function summary()
    {
        return view('recruitment/summary', [
            'title' => 'Summary',
            'layout_emp' => $this->layout_emp
        ]);
    }

    public function candidate()
    {
        return view('recruitment/candidate', [
            'title' => 'Candidate',
            'layout_emp' => $this->layout_emp
        ]);
    }

    public function interview()
    {
        return view('recruitment/interview', [
            'title' => 'Interview',
            'layout_emp' => $this->layout_emp
        ]);
    }

    public function opening()
    {
        return view('recruitment/opening', [
            'title' => 'Opening',
            'layout_emp' => $this->layout_emp
        ]);
    }

    public function summary_table()
    {
        $item = $this->OpeningModel
            ->select('tbl_opening.job_id, tbl_opening.position, COUNT(b.id) AS applicant, 
            tbl_opening.status, COALESCE(SUM(CASE WHEN b.status in ("Hired","Onboarding") THEN 1 ELSE 0 END), 0) AS hired')
            ->join('tbl_candidate b', 'tbl_opening.job_id = b.job_id', 'left')
            ->groupBy('tbl_opening.job_id, tbl_opening.position, tbl_opening.status')
            ->findAll();

        $data = [
            'item' => $item
        ];
        return view('recruitment/partial/summary_table', $data);
    }

    public function candidate_table()
    {
        $item = $this->CandidateModel
            ->select('tbl_candidate.*, tbl_opening.position, 
              CASE 
                  WHEN c.candidate_id IS NOT NULL THEN "Yes"
                  ELSE "No"
              END AS has_interview, c.interviewer, c.interview_date', false)
            ->join('tbl_opening', 'tbl_candidate.job_id = tbl_opening.job_id', 'left')
            ->join('tbl_interview c', 'tbl_candidate.id = c.candidate_id', 'left')
            ->whereIn('tbl_candidate.status', ['Pending', 'Scheduled', 'Hired', 'Onboarding'])
            ->findAll();

        $data = [
            'item' => $item
        ];
        return view('recruitment/partial/candidate_table', $data);
    }

    public function interview_table()
    {
        $item = $this->CandidateModel
            ->select('b.id, tbl_candidate.job_id, tbl_candidate.candidate_name, 
            b.interview_date, b.interviewer, b.status, b.remarks, b.rating, c.position,
            b.candidate_id, c.department, mst_employee.emp_id,
            tbl_candidate.status as candidate_status')
            ->join('tbl_interview b', 'tbl_candidate.id = b.candidate_id')
            ->join('tbl_opening c', 'tbl_candidate.job_id = c.job_id')
            ->join('mst_employee', 'tbl_candidate.candidate_name = mst_employee.name', 'left')
            ->whereIn('tbl_candidate.status', ['Scheduled', 'Hired', 'Onboarding'])
            ->findAll();

        $data = [
            'item' => $item
        ];
        return view('recruitment/partial/interview_table', $data);
    }

    public function opening_table()
    {
        $item = $this->OpeningModel->findAll();
        $data = [
            'item' => $item
        ];
        return view('recruitment/partial/opening_table', $data);
    }

    public function create_job_opening()
    {
        if ($this->request->is('post')) {
            $data = [
                'job_id' => $this->request->getPost('job_id'),
                'position' => $this->request->getPost('position'),
                'description' => $this->request->getPost('description'),
                'department' => $this->request->getPost('department'),
                'location' => $this->request->getPost('location'),
                'status' => $this->request->getPost('status'),
                'posted_date' => $this->request->getPost('posted_date'),
                'closing_date' => $this->request->getPost('closing_date'),
            ];

            try {
                if ($this->OpeningModel->insert($data)) {
                    return $this->_json_response(true, 'Job Opening created successfully');
                } else {
                    $errors = $this->OpeningModel->errors();
                    $message = implode(', ', $errors);
                    return $this->_json_response(false, $message);
                }
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }

        return $this->_json_response(false, 'Invalid request method');
    }

    public function update_job_opening()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('id');
            if (empty($id)) {
                return $this->_json_response(false, 'Missing ID.');
            }
            $data = [
                'position' => $this->request->getPost('position'),
                'description' => $this->request->getPost('description'),
                'department' => $this->request->getPost('department'),
                'location' => $this->request->getPost('location'),
                'status' => $this->request->getPost('status'),
                'posted_date' => $this->request->getPost('posted_date'),
                'closing_date' => $this->request->getPost('closing_date'),
            ];

            try {
                if ($this->OpeningModel->update($id, $data)) {
                    return $this->_json_response(true, 'Job Opening update successfully');
                } else {
                    $errors = $this->OpeningModel->errors();
                    $message = implode(', ', $errors);
                    return $this->_json_response(false, $message);
                }
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }

        return $this->_json_response(false, 'Invalid request method');
    }

    public function delete_job_opening()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('id');
            if (empty($id)) {
                return $this->_json_response(false, 'Missing ID.');
            }
            try {
                if ($this->OpeningModel->delete($id)) {
                    return $this->_json_response(true, 'Job Opening deleted successfully');
                } else {
                    return $this->_json_response(false, 'Failed to delete job opening');
                }
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }

        return $this->_json_response(false, 'Invalid request method');
    }

    public function create_candidate()
    {
        if ($this->request->is('post')) {
            $data = [
                'job_id' => $this->request->getPost('job_id'),
                'candidate_name' => $this->request->getPost('candidate_name'),
                'gender' => $this->request->getPost('gender'),
                'age' => $this->request->getPost('age'),
                'education' => $this->request->getPost('education'),
                'address' => $this->request->getPost('address'),
                'phone' => $this->request->getPost('phone'),
                'email' => $this->request->getPost('email'),
                'status' => 'Pending',
            ];

            try {
                if ($this->CandidateModel->insert($data)) {
                    return $this->_json_response(true, 'Candidate created successfully');
                } else {
                    $errors = $this->CandidateModel->errors();
                    $message = implode(', ', $errors);
                    return $this->_json_response(false, $message);
                }
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }

        return $this->_json_response(false, 'Invalid request method');
    }

    public function update_candidate()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('id');
            if (empty($id)) {
                return $this->_json_response(false, 'Missing ID.');
            }
            $data = [
                'job_id' => $this->request->getPost('job_id'),
                'candidate_name' => $this->request->getPost('candidate_name'),
                'gender' => $this->request->getPost('gender'),
                'age' => $this->request->getPost('age'),
                'education' => $this->request->getPost('education'),
                'address' => $this->request->getPost('address'),
                'phone' => $this->request->getPost('phone'),
                'email' => $this->request->getPost('email'),
            ];

            try {
                if ($this->CandidateModel->update($id, $data)) {
                    return $this->_json_response(true, 'Candidate updated successfully');
                } else {
                    $errors = $this->CandidateModel->errors();
                    $message = implode(', ', $errors);
                    return $this->_json_response(false, $message);
                }
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }

        return $this->_json_response(false, 'Invalid request method');
    }

    public function delete_candidate()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('id');
            if (empty($id)) {
                return $this->_json_response(false, 'Missing ID.');
            }
            try {
                if ($this->CandidateModel->delete($id)) {
                    return $this->_json_response(true, 'Candidate deleted successfully');
                } else {
                    return $this->_json_response(false, 'Failed to delete candidate');
                }
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }

        return $this->_json_response(false, 'Invalid request method');
    }

    public function create_interview()
    {
        if ($this->request->is('post')) {

            $candidate_id = $this->request->getPost('candidate_id');

            $data = [
                'candidate_id' => $candidate_id,
                'interviewer' => $this->request->getPost('interviewer'),
                'interview_date' => $this->request->getPost('interview_date'),
                'status' => 'Pending',
            ];

            $status = [
                'status' => 'Scheduled',
            ];

            try {
                if ($this->InterviewModel->insert($data)) {
                    $this->CandidateModel->update($candidate_id, $status);
                    return $this->_json_response(true, 'Interview created successfully');
                } else {
                    $errors = $this->InterviewModel->errors();
                    $message = implode(', ', $errors);
                    return $this->_json_response(false, $message);
                }
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }

        return $this->_json_response(false, 'Invalid request method');
    }

    public function update_interview()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('id');
            if (empty($id)) {
                return $this->_json_response(false, 'Missing ID.');
            }
            $candidate_id = $this->request->getPost('candidate_id');
            $status = $this->request->getPost('status');
            $data = [
                'candidate_id' => $candidate_id,
                'interviewer' => $this->request->getPost('interviewer'),
                'interview_date' => $this->request->getPost('interview_date'),
                'rating' => $this->request->getPost('rating'),
                'status' => $status,
                'remarks' => $this->request->getPost('remarks'),
            ];

            try {
                if ($this->InterviewModel->update($id, $data)) {
                    if ($status == 'Passed') {
                        $result = $this->make_employee($candidate_id);
                        if ($result['success']) {

                            $status = [
                                'status' => 'Hired',
                            ];

                            $this->CandidateModel->update($candidate_id, $status);

                            return $this->_json_response(true, 'Interview updated and employee created successfully');
                        } else {
                            return $this->_json_response(false, 'Employee creation failed: ' . $result['error']);
                        }
                    } else {
                        return $this->_json_response(true, 'Interview updated successfully');
                    }
                } else {
                    $errors = $this->InterviewModel->errors();
                    $message = implode(', ', $errors);
                    return $this->_json_response(false, $message);
                }
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }

        return $this->_json_response(false, 'Invalid request method');
    }

    public function delete_interview()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('id');
            if (empty($id)) {
                return $this->_json_response(false, 'Missing ID.');
            }
            try {
                if ($this->InterviewModel->delete($id)) {
                    return $this->_json_response(true, 'Interview deleted successfully');
                } else {
                    return $this->_json_response(false, 'Failed to delete interview');
                }
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }

        return $this->_json_response(false, 'Invalid request method');
    }

    public function make_employee($candidate_id)
    {
        $emp_id = $this->EmployeeModel->generateEmpId();

        $employee = $this->CandidateModel
            ->select('tbl_candidate.candidate_name, tbl_candidate.gender, tbl_candidate.phone, 
                  b.position, b.department, b.location')
            ->join('tbl_opening b', 'tbl_candidate.job_id = b.job_id')
            ->where('tbl_candidate.id', $candidate_id)
            ->first();

        if (!$employee) {
            return ['success' => false, 'error' => "Candidate not found for ID: {$candidate_id}"];
        }

        $data = [
            'emp_id' => $emp_id,
            'name' => $employee['candidate_name'],
            'gender' => $employee['gender'],
            'join_date' => date('Y-m-d'),
            'emp_type' => 'Non-Staff',
            'department' => $employee['department'],
            'job_title' => $employee['position'],
            'location' => $employee['location'],
            'status' => 'Active',
            'no_hp' => $employee['phone'],
            'photo' => $emp_id . '.jpg',
            'email' => null,
            'created_at' => null,
        ];

        try {
            if ($this->EmployeeModel->insert($data)) {
                return ['success' => true];
            } else {
                $errors = $this->EmployeeModel->errors();
                $errorString = implode(', ', $errors);
                return ['success' => false, 'error' => $errorString];
            }
        } catch (\Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function create_onboarding()
    {
        if ($this->request->is('post')) {
            $candidate_id = $this->request->getPost('candidate_id');
            $emp_id = $this->request->getPost('emp_id');
            if (empty($emp_id)) {
                return $this->_json_response(false, 'Missing ID.');
            }

            $checklist = $this->MstChecklistModel->findAll();

            if (empty($checklist)) {
                return $this->_json_response(false, 'There is no question for onboarding');
            }

            $questions = [];
            foreach ($checklist as $item) {
                $questions[] = [
                    'emp_id' => $emp_id,
                    'check_id' => $item['check_id'],
                    'check_cat' => $item['check_cat'],
                    'check_quest' => $item['check_quest'],
                    'created_at'  => date('Y-m-d H:i:s'),
                ];
            }

            $status = [
                'status' => 'Onboarding',
            ];

            if (!empty($questions)) {
                if ($this->OnboardingModel->insertBatch($questions)) {
                    $this->CandidateModel->update($candidate_id, $status);
                    return $this->_json_response(true, 'Onboarding checklist created successfully');
                } else {
                    $errors = $this->OnboardingModel->errors();
                    $errorString = implode(', ', $errors);
                    return $this->_json_response(false, $errorString);
                }
            } else {
                return $this->_json_response(false, 'No checklist items to insert');
            }
        }

        return $this->_json_response(false, 'Invalid request method');
    }
}
