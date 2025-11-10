<?php

namespace App\Controllers;

use App\Models\EmployeeModel;

class home extends BaseController
{
    // public function index(): string
    // {
    //     return view('welcome_message');
    // }
    protected $EmployeeModel;
    protected $layout_emp;

    public function __construct()
    {
        $this->EmployeeModel = new EmployeeModel();
        $this->layout_emp = $this->EmployeeModel->get_layout_emp();
    }

    public function trial()
    {
        return view('home/trial', [
            'title' => 'Trial',
            'layout_emp' => $this->layout_emp
        ]);
    }

    public function index()
    {

        return view('home/index', [
            'title' => 'home',
            'layout_emp' => $this->layout_emp
        ]);
    }

    public function dashboard()
    {
        return view('home/dashboard', [
            'title' => 'Dashboard',
            'layout_emp' => $this->layout_emp
        ]);
    }

    public function privacy_policy()
    {
        return view('home/privacy_policy', [
            'title' => 'Privacy Policy',
        ]);
    }

    public function report()
    {
        return view('home/report', [
            'title' => 'Report',
        ]);
    }

    public function test_csrf()
    {
        return $this->response->setJSON([
            'success' => true,
            'csrfHash' => csrf_hash()
        ]);
    }

    public function refresh_session()
    {
        session()->set('last_action', time());

        return $this->response->setJSON([
            'status' => true,
            'message' => 'Session refreshed'
        ]);
    }
}
