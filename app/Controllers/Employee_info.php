<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use App\Models\InfoRecognitionModel;
use App\Models\InfoWorkExperienceModel;


class Employee_info extends BaseController
{
    protected $EmployeeModel;
    protected $RecognitionModel;
    protected $WorkExperienceModel;

    public function __construct()
    {
        $this->EmployeeModel = new EmployeeModel();
        $this->RecognitionModel = new InfoRecognitionModel();
        $this->WorkExperienceModel = new InfoWorkExperienceModel();
    }

    public function employee_managment()
    {
        return view('employee_info/employee_managment', [
            'title' => 'Employee Management',
        ]);
    }

    public function people()
    {
        // $count = $this->EmployeeModel->where('status', 'active')->countAllResults();
        $data = [
            'title' => 'People',
            // 'count' => $count,
        ];
        return view('employee_info/people', $data);
    }

    public function department()
    {
        return view('employee_info/department', [
            'title' => 'Department',
        ]);
    }

    public function employee_profile($emp_id = null)
    {
        $employee = $this->EmployeeModel->where('emp_id', $emp_id)->first();
        $recognition = $this->RecognitionModel->where('emp_id', $emp_id)
            ->orderby('date_given', 'desc')->findAll();
        $latest_recognition = reset($recognition) ?? null;
        $previous_exp = $this->WorkExperienceModel
            ->select('company_name, job_title, start_date, end_date')->where('emp_id', $emp_id)
            ->orderby('start_date', 'desc')->findAll();
        if ($employee) {
            $current_exp = [
                'company_name' => 'HRiS Company',
                'job_title' => $employee['job_title'],
                'start_date' => $employee['join_date'],
                'end_date' => null,
            ];
            array_unshift($previous_exp, $current_exp);
        }
        $work_exp = $previous_exp;
        $org_chart = null;
        if ($employee) {
            $org_chart = $this->EmployeeModel->getOrg($employee['department']);
        }

        $data = [
            'title' => 'Employee Profile',
            'emp' => $employee,
            'recognition' => $recognition,
            'latest_recognition' => $latest_recognition,
            'work_exp' => $work_exp,
            'org_chart' => $org_chart
        ];
        // echo "<pre>";
        // var_dump($data);
        // echo "</pre>";
        // exit;

        return view('employee_info/employee_profile', $data);
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

    public function employee_list()
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
            'resign_date',
            'shift_id',
            'shift_name',
        ];

        // --- total record tanpa filter ---
        $totalBuilder = $this->EmployeeModel->builder();
        $recordsTotal = $totalBuilder->countAllResults();

        // --- base builder untuk filter + data ---
        $builder = $this->EmployeeModel->builder();
        $builder->select('mst_employee.*, s.shift_name')
            ->join('mst_shift s', 'mst_employee.shift_id = s.shift_id');

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

        return $this->response->setJSON([
            'draw' => $draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
            'csrfHash' => csrf_hash()
        ]);
    }

    public function create_employee()
    {
        if ($this->request->is('post')) {
            $validationRules = [
                'photo' => [
                    'rules' => 'uploaded[photo]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/gif,image/png]',
                    'errors' => [
                        'uploaded' => 'Please select an image file.',
                        'is_image' => 'The uploaded file is not a valid image.',
                        'mime_in' => 'Only JPG, JPEG, GIF, and PNG images are allowed.'
                    ]
                ]
            ];

            if (!$this->validate($validationRules)) {
                $errors = $this->validator->getErrors();
                $message = implode('<br>', $errors);
                return $this->_json_response(false, $message);
            }

            $photoFile = $this->request->getFile('photo');
            $destinationFolder = FCPATH . 'assets/profile';

            if ($photoFile && $photoFile->isValid()) {
                $photoName = compress_image($photoFile, $destinationFolder);
            } else {
                $photoName = null;
            }

            $emp_id = $this->EmployeeModel->generateEmpId();

            $data = [
                'emp_id' => $emp_id,
                'name' => $this->request->getPost('name'),
                'gender' => $this->request->getPost('gender'),
                'join_date' => $this->request->getPost('join_date'),
                'emp_type' => $this->request->getPost('emp_type'),
                'department' => $this->request->getPost('department'),
                'job_title' => $this->request->getPost('job_title'),
                'manager' => $this->request->getPost('manager') ?: null,
                'hr_partner' => $this->request->getPost('hr_partner') ?: null,
                'organization' => $this->request->getPost('organization') ?: null,
                'location' => $this->request->getPost('location'),
                'emp_grade' => $this->request->getPost('emp_grade'),
                'status' => $this->request->getPost('status'),
                'resign_date' => $this->request->getPost('resign_date') ?: null,
                'created_at' => date('Y-m-d H:i:s'),
                'photo' => $photoName,
                'email' => $this->request->getPost('email') ?: null,
                'no_hp' => $this->request->getPost('no_hp') ?: null,
                'shift_id' => $this->request->getPost('shift_id'),
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

            $employee = $this->EmployeeModel->select('photo')->where('id', $id)->first();
            $existing_photo = $employee['photo'] ?? null;
            $photoFile = $this->request->getFile('photo');
            $photoName = $existing_photo;

            if ($photoFile && $photoFile->isValid() && !$photoFile->hasMoved()) {
                $validationRules = [
                    'photo' => [
                        'rules' => 'is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/gif,image/png]',
                        'errors' => [
                            'is_image' => 'The uploaded file is not a valid image.',
                            'mime_in' => 'Only JPG, JPEG, GIF, and PNG images are allowed.'
                        ]
                    ]
                ];

                if (!$this->validate($validationRules)) {
                    $errors = $this->validator->getErrors();
                    $message = implode('<br>', $errors);
                    return $this->_json_response(false, $message);
                }

                $destinationFolder = FCPATH . 'assets/profile';
                $photoName = compress_image($photoFile, $destinationFolder);
            }

            $data = [
                'name' => $this->request->getPost('name'),
                'gender' => $this->request->getPost('gender'),
                'join_date' => $this->request->getPost('join_date'),
                'emp_type' => $this->request->getPost('emp_type'),
                'department' => $this->request->getPost('department'),
                'job_title' => $this->request->getPost('job_title'),
                'manager' => $this->request->getPost('manager') ?: null,
                'hr_partner' => $this->request->getPost('hr_partner') ?: null,
                'organization' => $this->request->getPost('organization') ?: null,
                'location' => $this->request->getPost('location'),
                'emp_grade' => $this->request->getPost('emp_grade'),
                'status' => $this->request->getPost('status'),
                'resign_date' => $this->request->getPost('resign_date') ?: null,
                'updated_at' => date('Y-m-d H:i:s'),
                'photo' => $photoName,
                'email' => $this->request->getPost('email') ?: null,
                'no_hp' => $this->request->getPost('no_hp') ?: null,
                'shift_id' => $this->request->getPost('shift_id'),
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
                    'rules' => 'uploaded[excel_file]|mime_in[excel_file,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]',
                    'errors' => [
                        'uploaded' => 'Please select an Excel file to upload.',
                        'mime_in' => 'Only .xls and .xlsx files are allowed.',
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
                $file->move(FCPATH . 'uploads', $newName);

                $filePath = FCPATH . 'uploads/' . $newName;

                try {
                    $spreadsheet = IOFactory::load($filePath);
                    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
                    $rowCount = 0;
                    $validData = [];
                    $errors = [];
                    $firstId = $this->EmployeeModel->generateEmpId();
                    preg_match('/EMP(\d+)/', $firstId, $matches);
                    $nextNumber = intval($matches[1]);

                    foreach ($sheetData as $i => $row) {
                        if ($i == 1) continue;

                        $emp_id = 'EMP' . str_pad($nextNumber++, 3, '0', STR_PAD_LEFT);

                        $data = [
                            'emp_id' => $emp_id,
                            'name' => trim_excel($row['A']),
                            'gender' => trim_excel($row['B']),
                            'email' => trim_excel($row['C']),
                            'no_hp' => trim_excel($row['D']),
                            'join_date' => !empty($row['E']) ? date('Y-m-d', strtotime($row['E'])) : null,
                            'emp_type' => trim_excel($row['F']),
                            'organization' => trim_excel($row['G']),
                            'department' => trim_excel($row['H']),
                            'job_title' => trim_excel($row['I']),
                            'manager' => trim_excel($row['J']),
                            'hr_partner' => trim_excel($row['K']),
                            'location' => trim_excel($row['L']),
                            'emp_grade' => trim_excel($row['M']),
                            'status' => trim_excel($row['N']),
                            'resign_date' => !empty($row['O']) ? date('Y-m-d', strtotime($row['O'])) : null,
                            'created_at' => date('Y-m-d H:i:s'),
                            'photo' => $emp_id . '.jpg'
                        ];

                        if ($this->EmployeeModel->validate($data)) {
                            $validData[] = $data;
                        } else {
                            $rowErrors = $this->EmployeeModel->errors();
                            $errors[] = [
                                'row' => $i,
                                // 'emp_id' => $data['emp_id'],
                                'data' => $data,
                                'errors' => $rowErrors,
                            ];
                        }
                    }

                    if (!empty($errors)) {
                        $data = [
                            'errors' => $errors
                        ];
                        $message = view('employee_info/partial/upload_validation', $data);

                        return $this->_json_response(false, $message, true);
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
                return $this->_json_response(false, 'File upload failed.');
            }
        }
        return $this->_json_response(false, 'Invalid request method');
    }

    public function get_department_profile()
    {
        $text = trim($this->request->getGet('text'));

        $builder = $this->EmployeeModel
            ->select('mst_employee.department, COUNT(emp_id) AS employee, b.dept_code AS code')
            ->join('mst_dept b', 'mst_employee.department = b.department')
            ->where('status', 'active')
            ->groupBy('mst_employee.department, b.dept_code');

        if (!empty($text)) {
            $builder->groupStart()
                ->like('mst_employee.department', $text)
                ->orWhere('b.dept_code', $text)
                ->groupEnd();
        }
        $result = $builder->findAll();
        $data = [
            'department' => $result
        ];
        return view('employee_info/partial/department', $data);
    }

    public function count_employee_dept()
    {
        $text = trim($this->request->getGet('text'));
        $builder = $this->EmployeeModel->where('status', 'Active')
            ->join('mst_dept b', 'mst_employee.department = b.department');

        if (!empty($text)) {
            $builder->groupStart()
                ->like('mst_employee.department', $text)
                ->orWhere('b.dept_code', $text)
                ->groupEnd();
        }

        $count = $builder->countAllResults();

        return $this->response->setJSON(['count' => $count]);
    }


    public function get_employee_card()
    {
        $text = trim($this->request->getGet('text'));
        $sort_by = $this->request->getGet('sort_by');
        $type = $this->request->getGet('type');
        $dept = $this->request->getGet('dept') ?: null;

        $builder = $this->EmployeeModel->where('status', 'Active');

        if (!empty($dept)) {
            $builder->where('department', $dept);
        }
        if (!empty($text)) {
            $builder->like('name', $text);
        }
        if (!empty($sort_by)) {
            if ($sort_by == 'name') {
                $builder->orderBy('name', 'ASC');
            } elseif ($sort_by == 'department') {
                $builder->orderBy('department', 'ASC');
            }
        }
        $result = $builder->findAll();
        $data = [
            'employee' => $result,
        ];
        if ($type == 'profile') {
            return view('employee_info/partial/employee_card', $data);
        } else {
            return view('employee_info/partial/employee_table', $data);
        }
    }

    public function count_employee()
    {
        $text = trim($this->request->getGet('text'));
        $dept = $this->request->getGet('dept') ?: null;

        $builder = $this->EmployeeModel->where('status', 'Active');

        if (!empty($dept)) {
            $builder->where('department', $dept);
        }
        if (!empty($text)) {
            $builder->like('name', $text);
        }
        $count = $builder->countAllResults();

        return $this->response->setJSON(['count' => $count]);
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
