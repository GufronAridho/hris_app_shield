<?php

namespace App\Controllers;

use App\Models\MstStatusModel;
use App\Models\MstJobModel;
use App\Models\MstEmpTypeModel;
use App\Models\MstDeptModel;
use App\Models\OpeningModel;
use App\Models\CandidateModel;
use App\Models\EmployeeModel;
use App\Models\MstShiftModel;

class Select_form extends BaseController
{
    protected $MstStatusModel;
    protected $MstJobModel;
    protected $MstEmpTypeModel;
    protected $MstDeptModel;
    protected $OpeningModel;
    protected $CandidateModel;
    protected $EmployeeModel;
    protected $MstShiftModel;

    public function __construct()
    {
        $this->MstStatusModel = new MstStatusModel();
        $this->MstJobModel = new MstJobModel();
        $this->MstEmpTypeModel = new MstEmpTypeModel();
        $this->MstDeptModel = new MstDeptModel();
        $this->OpeningModel = new OpeningModel();
        $this->CandidateModel = new CandidateModel();
        $this->EmployeeModel = new EmployeeModel();
        $this->MstShiftModel = new MstShiftModel();
    }

    public function statusSelect()
    {
        $q = $this->request->getGet('q');

        $builder = $this->MstStatusModel->builder();
        $builder->select('DISTINCT(status) as status');

        if (!empty($q)) {
            $builder->like('status', $q);
        }

        $query = $builder->get();
        $results = $query->getResult();

        $items = [];
        foreach ($results as $row) {
            $items[] = [
                'id' => $row->status,
                'name' => $row->status
            ];
        }

        return $this->response->setJSON(['items' => $items]);
    }

    public function jobTitleSelect()
    {
        $q = $this->request->getGet('q');

        $builder = $this->MstJobModel->builder();
        $builder->select('DISTINCT(job_title) as job_title');

        if (!empty($q)) {
            $builder->like('job_title', $q);
        }

        $query = $builder->get();
        $results = $query->getResult();

        $items = [];
        foreach ($results as $row) {
            $items[] = [
                'id' => $row->job_title,
                'name' => $row->job_title
            ];
        }

        return $this->response->setJSON(['items' => $items]);
    }

    public function empTypeSelect()
    {
        $q = $this->request->getGet('q');

        $builder = $this->MstEmpTypeModel->builder();
        $builder->select('DISTINCT(type) as type');

        if (!empty($q)) {
            $builder->like('type', $q);
        }

        $query = $builder->get();
        $results = $query->getResult();

        $items = [];
        foreach ($results as $row) {
            $items[] = [
                'id' => $row->type,
                'name' => $row->type
            ];
        }

        return $this->response->setJSON(['items' => $items]);
    }

    public function deptSelect()
    {
        $q = $this->request->getGet('q');

        $builder = $this->MstDeptModel->builder();
        $builder->select('DISTINCT(department) as department');

        if (!empty($q)) {
            $builder->like('department', $q);
        }

        $query = $builder->get();
        $results = $query->getResult();

        $items = [];
        foreach ($results as $row) {
            $items[] = [
                'id' => $row->department,
                'name' => $row->department
            ];
        }

        return $this->response->setJSON(['items' => $items]);
    }

    public function jobOpeningSelect()
    {
        $q = $this->request->getGet('q');

        $builder = $this->OpeningModel->builder();
        $builder->distinct();
        $builder->select('job_id, position');
        $builder->where('status', 'Open');

        if (!empty($q)) {
            $builder->groupStart()
                ->like('job_id', $q)
                ->orLike('position', $q)
                ->groupEnd();
        }

        $query = $builder->get();
        $results = $query->getResult();

        $items = [];
        foreach ($results as $row) {
            $items[] = [
                'id' => $row->job_id,
                'name' => $row->job_id . ' - ' . $row->position
            ];
        }

        return $this->response->setJSON(['items' => $items]);
    }

    public function candidateSelect()
    {
        $q = $this->request->getGet('q');

        $builder = $this->CandidateModel->builder();
        $builder->distinct();
        $builder->select('id, candidate_name');

        if (!empty($q)) {
            $builder->like('candidate_name', $q);
        }
        $builder->orderBy('candidate_name');

        $query = $builder->get();
        $results = $query->getResult();

        $items = [];
        foreach ($results as $row) {
            $items[] = [
                'id' => $row->id,
                'name' => $row->candidate_name
            ];
        }

        return $this->response->setJSON(['items' => $items]);
    }

    public function managerSelect()
    {
        $q = $this->request->getGet('q');

        $builder = $this->EmployeeModel->builder();
        $builder->distinct();
        $builder->select('name');
        $builder->like('job_title', 'Manager');

        if (!empty($q)) {
            $builder->like('name', $q);
        }
        $builder->orderBy('name');

        $query = $builder->get();
        $results = $query->getResult();

        $items = [];
        foreach ($results as $row) {
            $items[] = [
                'id' => $row->name,
                'name' => $row->name
            ];
        }

        return $this->response->setJSON(['items' => $items]);
    }

    public function hrSelect()
    {
        $q = $this->request->getGet('q');

        $builder = $this->EmployeeModel->builder();
        $builder->distinct();
        $builder->select('name');
        $builder->like('department', 'Human');

        if (!empty($q)) {
            $builder->like('name', $q);
        }
        $builder->orderBy('name');

        $query = $builder->get();
        $results = $query->getResult();

        $items = [];
        foreach ($results as $row) {
            $items[] = [
                'id' => $row->name,
                'name' => $row->name
            ];
        }

        return $this->response->setJSON(['items' => $items]);
    }

    public function employeeSelect()
    {
        $q = $this->request->getGet('q');

        $builder = $this->EmployeeModel->builder();
        $builder->distinct();
        $builder->select('name');

        if (!empty($q)) {
            $builder->like('name', $q);
        }
        $builder->orderBy('name');

        $query = $builder->get();
        $results = $query->getResult();

        $items = [];
        foreach ($results as $row) {
            $items[] = [
                'id' => $row->name,
                'name' => $row->name
            ];
        }

        return $this->response->setJSON(['items' => $items]);
    }

    public function employeeIDSelect()
    {
        $q = $this->request->getGet('q');

        $builder = $this->EmployeeModel->builder();
        $builder->distinct();
        $builder->select('emp_id, name');

        if (!empty($q)) {
            $builder->groupStart()
                ->like('emp_id', $q)
                ->orLike('name', $q)
                ->groupEnd();
        }
        $builder->orderBy('emp_id');

        $query = $builder->get();
        $results = $query->getResult();

        $items = [];
        foreach ($results as $row) {
            $items[] = [
                'id' => $row->emp_id,
                'name' => $row->emp_id . ' - ' . $row->name
            ];
        }

        return $this->response->setJSON(['items' => $items]);
    }

    public function shiftSelect()
    {
        $q = $this->request->getGet('q');

        $builder = $this->MstShiftModel->builder();
        $builder->distinct();
        $builder->select('shift_id, shift_name');

        if (!empty($q)) {
            $builder->like('shift_name', $q);
        }
        $builder->orderBy('shift_name');

        $query = $builder->get();
        $results = $query->getResult();

        $items = [];
        foreach ($results as $row) {
            $items[] = [
                'id' => $row->shift_id,
                'name' => $row->shift_name
            ];
        }

        return $this->response->setJSON(['items' => $items]);
    }

    public function emailSelect()
    {
        $q = $this->request->getGet('q');

        $builder = $this->EmployeeModel->builder();
        $builder->distinct();
        $builder->select('email');

        if (!empty($q)) {
            $builder->like('email', $q);
        }
        $builder->orderBy('email');

        $query = $builder->get();
        $results = $query->getResult();

        $items = [];
        foreach ($results as $row) {
            $items[] = [
                'id' => $row->email,
                'name' => $row->email
            ];
        }

        return $this->response->setJSON(['items' => $items]);
    }
}
