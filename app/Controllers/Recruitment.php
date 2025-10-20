<?php

namespace App\Controllers;

use App\Models\CandidateModel;
use App\Models\InterviewModel;
use App\Models\OpeningModel;

class Recruitment extends BaseController
{
    protected $CandidateModel;
    protected $InterviewModel;
    protected $OpeningModel;
    public function __construct()
    {
        $this->CandidateModel = new CandidateModel();
        $this->InterviewModel = new InterviewModel();
        $this->OpeningModel = new OpeningModel();
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
        ]);
    }

    public function candidate()
    {
        return view('recruitment/candidate', [
            'title' => 'Candidate',
        ]);
    }

    public function interview()
    {
        return view('recruitment/interview', [
            'title' => 'Interview',
        ]);
    }

    public function opening()
    {
        return view('recruitment/opening', [
            'title' => 'Opening',
        ]);
    }

    public function summary_table()
    {
        $item = $this->OpeningModel
            ->select('tbl_opening.job_id, tbl_opening.position, COUNT(b.id) AS applicant, 
            tbl_opening.status, COALESCE(SUM(CASE WHEN c.status = "Passed" THEN 1 ELSE 0 END), 0) AS hired')
            ->join('tbl_candidate b', 'tbl_opening.job_id = b.job_id', 'left')
            ->join('tbl_interview c', 'b.id = c.candidate_id', 'left')
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
            ->select('tbl_candidate.*, tbl_opening.position')
            ->join('tbl_opening', 'tbl_candidate.job_id = tbl_opening.job_id', 'left')
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
            tbl_candidate.id as candidate_id')
            ->join('tbl_interview b', 'tbl_candidate.id = b.candidate_id')
            ->join('tbl_opening c', 'tbl_candidate.job_id = c.job_id', 'left')
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
            $data = [
                'candidate_id' => $this->request->getPost('candidate_id'),
                'interviewer' => $this->request->getPost('interviewer'),
                'interview_date' => $this->request->getPost('interview_date'),
                'rating' => $this->request->getPost('rating'),
                'status' => $this->request->getPost('status'),
                'remarks' => $this->request->getPost('remarks'),
            ];

            try {
                if ($this->InterviewModel->insert($data)) {
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
            $data = [
                'candidate_id' => $this->request->getPost('candidate_id'),
                'interviewer' => $this->request->getPost('interviewer'),
                'interview_date' => $this->request->getPost('interview_date'),
                'rating' => $this->request->getPost('rating'),
                'status' => $this->request->getPost('status'),
                'remarks' => $this->request->getPost('remarks'),
            ];

            try {
                if ($this->InterviewModel->update($id, $data)) {
                    return $this->_json_response(true, 'Interview updated successfully');
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
}
