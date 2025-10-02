<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'mst_users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'name', 'email', 'password', 'level', 'created_at', 'updated_at'];

    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[100]|is_unique[mst_users.username,id,{id}]',
        'name' => 'required|min_length[3]|max_length[255]',
        'email' => 'required|valid_email|is_unique[mst_users.email,id,{id}]',
        'password' => 'required|min_length[6]',
        'level' => 'required'
    ];

    protected $validationMessages = [
        'username' => [
            'required' => 'Username is required.',
            'is_unique' => 'This username is already taken.'
        ],
        'email' => [
            'required' => 'Email is required.',
            'valid_email' => 'Please enter a valid email address.',
            'is_unique' => 'This email is already registered.'
        ],
        'password' => [
            'required' => 'Password is required.',
            'min_length' => 'Password must be at least 6 characters.'
        ],
        'level' => [
            'required' => 'User level is required.'
        ]
    ];

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];
    protected $skipValidation = false;

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }
}
