<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $UserModel;

    public function __construct()
    {
        $this->helpers = ['form', 'url', 'session'];
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        return view('Auth/index', [
            'title' => 'Login',
        ]);
    }
    public function register()
    {
        return view('Auth/register', [
            'title' => 'Register',
        ]);
    }

    public function login()
    {
        $session = session();
        if ($this->request->is('post')) {
            $username = $this->request->getPost('username', TRUE);
            $password = $this->request->getPost('password', TRUE);

            $user = $this->UserModel->where('username', $username)->first();
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $sessionData = [
                        'user_id' => $user['id'],
                        'username' => $user['username'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'level' => $user['level'],
                        'isLoggedIn' => true,
                    ];
                    $session->set($sessionData);
                    return redirect()->to(base_url('home/index'));
                } else {
                    $session->setFlashdata('error', 'Wrong password.');
                    return redirect()->back()->withInput();
                }
            } else {
                $session->setFlashdata('error', 'User not found.');
                return redirect()->back()->withInput();
            }
        }
        return redirect()->to(base_url('auth/index'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('auth/index'));
    }

    public function register_account()
    {
        if ($this->request->is('post')) {
            $data = [
                'username' => $this->request->getPost('username', TRUE),
                'name' => $this->request->getPost('name', TRUE),
                'email' => $this->request->getPost('email', TRUE),
                'level' => "User",
                'password' => $this->request->getPost('password', TRUE),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            if ($this->UserModel->insert($data)) {
                return redirect()->to(base_url('auth/index'))
                    ->with('success', 'Account created successfully! Please login.');
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('error', $this->UserModel->errors());
            }
        }
        return redirect()->to(base_url('auth/index'));
    }
}
