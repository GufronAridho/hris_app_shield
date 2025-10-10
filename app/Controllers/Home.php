<?php

namespace App\Controllers;

class home extends BaseController
{
    // public function index(): string
    // {
    //     return view('welcome_message');
    // }

    public function trial()
    {
        return view('home/trial', [
            'title' => 'Trial',
        ]);
    }

    public function index()
    {
        return view('home/index', [
            'title' => 'home',
        ]);
    }

    public function dashboard()
    {
        return view('home/dashboard', [
            'title' => 'Dashboard',
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
}
