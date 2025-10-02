<?php

namespace App\Controllers;

class Home extends BaseController
{
    // public function index(): string
    // {
    //     return view('welcome_message');
    // }

    public function trial()
    {
        return view('Home/trial', [
            'title' => 'Trial',
        ]);
    }

    public function index()
    {
        return view('Home/index', [
            'title' => 'Home',
        ]);
    }

    public function dashboard()
    {
        return view('Home/dashboard', [
            'title' => 'Dashboard',
        ]);
    }

    public function privacy_policy()
    {
        return view('Home/privacy_policy', [
            'title' => 'Privacy Policy',
        ]);
    }

    public function report()
    {
        return view('Home/report', [
            'title' => 'Report',
        ]);
    }
}
