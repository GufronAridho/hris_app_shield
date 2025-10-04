<?php

namespace App\Controllers;

use App\Models\MstStatusModel;
use App\Models\MstJobModel;
use App\Models\MstEmpTypeModel;


class Select_form extends BaseController
{
    protected $MstStatusModel;
    protected $MstJobModel;
    protected $MstEmpTypeModel;

    public function __construct()
    {
        $this->MstStatusModel = new MstStatusModel();
        $this->MstJobModel = new MstJobModel();
        $this->MstEmpTypeModel = new MstEmpTypeModel();
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
}
