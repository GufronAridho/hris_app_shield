<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;

class Employee_info extends BaseController
{
    protected $EmployeeModel;
    public function __construct()
    {
        $this->EmployeeModel = new EmployeeModel();
    }

    public function employee_managment()
    {
        return view('employee_info/employee_managment', [
            'title' => 'Employee Management',
        ]);
    }

    public function people()
    {
        return view('employee_info/people', [
            'title' => 'People',
        ]);
    }

    public function department()
    {
        return view('employee_info/department', [
            'title' => 'Department',
        ]);
    }

    public function employee_profile()
    {
        return view('employee_info/employee_profile', [
            'title' => 'Employee Profile',
        ]);
    }

    private function _json_response($status, $message)
    {
        echo json_encode([
            'status' => $status,
            'message'   => $message,
            'csrfHash' => csrf_hash()
        ]);
        exit;
    }

    public function employeeList()
    {
        $request = $this->request;

        $draw = intval($request->getPost('draw'));
        $start = intval($request->getPost('start'));
        $length = intval($request->getPost('length'));
        $order = $request->getPost('order');
        $search = $request->getPost('search')['value'] ?? '';

        $status = $request->getPost('status');
        $type = $request->getPost('type');
        $date_from = $request->getPost('date_from');
        $date_to = $request->getPost('date_to');

        // --- definisi kolom untuk ordering & searching ---
        $columns = [
            'emp_id',
            'name',
            'gender',
            'join_date',
            'emp_type',
            'organization',
            'department',
            'job_title',
            'manager',
            'hr_partner',
            'location',
            'emp_grade',
            'status',
            'resign_date'
        ];

        // --- total record tanpa filter ---
        $totalBuilder = $this->EmployeeModel->builder();
        $recordsTotal = $totalBuilder->countAllResults();

        // --- base builder untuk filter + data ---
        $builder = $this->EmployeeModel->builder();
        $builder->select('*');

        // --- apply filters ---
        if ($status) {
            $builder->where('status', $status);
        }
        if ($type) {
            $builder->where('emp_type', $type);
        }
        if ($date_from) {
            $builder->where('join_date >=', $date_from);
        }
        if ($date_to) {
            $builder->where('join_date <=', $date_to);
        }

        // --- global search ---
        if (!empty($search)) {
            $builder->groupStart();
            foreach ($columns as $col) {
                $builder->orLike($col, $search);
            }
            $builder->groupEnd();
        }

        // --- per-column search ---
        $columnsSearch = $request->getPost('columns');
        if (!empty($columnsSearch) && is_array($columnsSearch)) {
            foreach ($columnsSearch as $index => $col) {
                $colSearch = $col['search']['value'] ?? '';
                if ($colSearch !== '' && isset($columns[$index])) {
                    $builder->like($columns[$index], $colSearch);
                }
            }
        }

        // --- count filtered ---
        $countBuilder = clone $builder;
        $recordsFiltered = $countBuilder->countAllResults();

        // --- ordering ---
        if (!empty($order) && isset($columns[$order[0]['column']])) {
            $builder->orderBy($columns[$order[0]['column']], $order[0]['dir']);
        } else {
            $builder->orderBy('emp_id', 'asc');
        }

        // --- pagination ---
        if ($length != -1) {
            $builder->limit($length, $start);
        }

        // --- ambil data ---
        $employees = $builder->get()->getResultArray();

        // --- siapkan data untuk DataTables ---
        $data = [];
        foreach ($employees as $emp) {
            $data[] = $emp;
        }

        // --- return response JSON ---
        return $this->response->setJSON([
            'draw'            => $draw,
            'recordsTotal'    => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data'            => $data,
            'csrfHash'        => csrf_hash()
        ]);
    }

    public function create_employee()
    {
        if ($this->request->is('post')) {
            $data = [
                'emp_id' => $this->request->getPost('emp_id'),
                'name' => $this->request->getPost('name'),
                'gender' => $this->request->getPost('gender'),
                'join_date' => $this->request->getPost('join_date'),
                'emp_type' => $this->request->getPost('emp_type'),
                'department' => $this->request->getPost('department'),
                'job_title' => $this->request->getPost('job_title'),
                'manager' => $this->request->getPost('manager'),
                'hr_partner'  => $this->request->getPost('hr_partner'),
                'organization' => $this->request->getPost('organization'),
                'location' => $this->request->getPost('location'),
                'emp_grade' => $this->request->getPost('emp_grade'),
                'status' => $this->request->getPost('status'),
                'resign_date' => $this->request->getPost('resign_date') ?: null,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            try {
                if ($this->EmployeeModel->insert($data)) {
                    return $this->_json_response(true, 'Employee created successfully');
                } else {
                    $errors = $this->EmployeeModel->errors();
                    $message = implode(', ', $errors);
                    return $this->_json_response(false, $message);
                }
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }

    public function update_employee()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('id');
            if (!$id) {
                return $this->_json_response(false, 'Employee ID is required');
            }
            $data = [
                'name' => $this->request->getPost('name'),
                'gender' => $this->request->getPost('gender'),
                'join_date' => $this->request->getPost('join_date'),
                'emp_type' => $this->request->getPost('emp_type'),
                'department' => $this->request->getPost('department'),
                'job_title' => $this->request->getPost('job_title'),
                'manager' => $this->request->getPost('manager'),
                'hr_partner'  => $this->request->getPost('hr_partner'),
                'organization' => $this->request->getPost('organization'),
                'location' => $this->request->getPost('location'),
                'emp_grade' => $this->request->getPost('emp_grade'),
                'status' => $this->request->getPost('status'),
                'resign_date' => $this->request->getPost('resign_date') ?: null,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            try {
                if ($this->EmployeeModel->update($id, $data)) {
                    return $this->_json_response(true, 'Employee updated successfully');
                } else {
                    $errors = $this->EmployeeModel->errors();
                    $message = implode(', ', $errors);
                    return $this->_json_response(false, $message);
                }
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }

    public function delete_employee()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getPost('id');
            if (!$id) {
                return $this->_json_response(false, 'Employee ID is required');
            }
            try {
                if ($this->EmployeeModel->delete($id)) {
                    return $this->_json_response(true, 'Employee deleted successfully');
                } else {
                    $errors = $this->EmployeeModel->errors();
                    $message = implode(', ', $errors);
                    return $this->_json_response(false, $message);
                }
            } catch (\Exception $e) {
                return $this->_json_response(false, $e->getMessage());
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }

    public function upload_employee()
    {
        if ($this->request->is('post')) {
            $validationRules = [
                'excel_file' => [
                    'rules' => 'uploaded[excel_file]|mime_in[excel_file,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]|max_size[excel_file,2048]',
                    'errors' => [
                        'uploaded' => 'Please select an Excel file to upload.',
                        'mime_in'  => 'Only .xls and .xlsx files are allowed.',
                        'max_size' => 'The file size exceeds the allowed limit (2MB).'
                    ]
                ]
            ];

            if (!$this->validate($validationRules)) {
                $errors = $this->validator->getErrors();
                $message = implode('<br>', $errors);
                return $this->_json_response(false, $message);
            }

            $file = $this->request->getFile('excel_file');

            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads', $newName);

                $filePath = WRITEPATH . 'uploads/' . $newName;

                try {
                    $spreadsheet = IOFactory::load($filePath);
                    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
                    $rowCount = 0;
                    $validData = [];
                    $errors = [];

                    foreach ($sheetData as $i => $row) {
                        if ($i == 1) continue;

                        $data = [
                            'emp_id' => $row['A'],
                            'name' => $row['B'],
                            'gender' => $row['C'],
                            'join_date' => !empty($row['D']) ? date('Y-m-d', strtotime($row['D'])) : null,
                            'emp_type' => $row['E'],
                            'organization' => $row['F'],
                            'department' => $row['G'],
                            'job_title' => $row['H'],
                            'manager' => $row['I'],
                            'hr_partner' => $row['J'],
                            'location' => $row['K'],
                            'emp_grade' => $row['L'],
                            'status' => $row['M'],
                            'resign_date' => !empty($row['N']) ? date('Y-m-d', strtotime($row['N'])) : null,
                            'created_at' => date('Y-m-d H:i:s'),
                        ];

                        if ($this->EmployeeModel->validate($data)) {
                            $validData[] = $data;
                        } else {
                            $rowErrors = $this->EmployeeModel->errors();
                            $errors[] = [
                                'row'    => $i,
                                'emp_id' => $data['emp_id'],
                                'errors' => $rowErrors,
                            ];
                        }
                    }

                    if (!empty($errors)) {
                        $errorMessages = [];
                        foreach ($errors as $err) {
                            $rowNum = $err['row'];
                            $empId  = $err['emp_id'] ?? '-';
                            $msg    = implode(', ', $err['errors']);
                            $errorMessages[] = "Row {$rowNum} (EmpID: {$empId}) → {$msg}";
                        }

                        $errorText = implode("<br>", $errorMessages);

                        return $this->_json_response(false, "Validation Error:<br>" . $errorText);
                    }

                    if (!empty($validData)) {
                        $this->EmployeeModel->insertBatch($validData);
                        $rowCount = count($validData);
                    }
                    return $this->_json_response(true, "Upload success. $rowCount employees inserted.");
                } catch (Exception $e) {
                    return $this->_json_response(false, $e->getMessage());
                }
            } else {
                return $this->_json_response(true, 'File upload failed.');
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }


    public function filterStatus()
    {
        $q = $this->request->getGet('q');

        $builder = $this->EmployeeModel->builder();
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

    public function filterEmpType()
    {
        $q = $this->request->getGet('q');

        $builder = $this->EmployeeModel->builder();
        $builder->select('DISTINCT(emp_type) as emp_type');

        if (!empty($q)) {
            $builder->like('emp_type', $q);
        }

        $query = $builder->get();
        $results = $query->getResult();

        $items = [];
        foreach ($results as $row) {
            $items[] = [
                'id' => $row->emp_type,
                'name' => $row->emp_type
            ];
        }

        return $this->response->setJSON(['items' => $items]);
    }
}
