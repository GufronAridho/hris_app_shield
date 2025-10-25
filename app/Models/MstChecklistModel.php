<?php

namespace App\Models;

use CodeIgniter\Model;

class MstChecklistModel extends Model
{
    protected $table = 'mst_checklist';
    protected $primaryKey = 'id';
    protected $allowedFields = ['check_id', 'check_cat', 'check_quest'];
    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    public function generateCheckID($check_cat)
    {
        if ($check_cat === 'Document') {
            $code = 'DOC';
        } elseif ($check_cat === 'IT') {
            $code = 'IT';
        } elseif ($check_cat === 'Onboarding') {
            $code = 'ONB';
        } else {
            $code = 'CODE';
        }

        $lastEmp = $this->select('check_id')
            ->where('check_cat', $check_cat)
            ->orderBy('check_id', 'DESC')
            ->first();

        if ($lastEmp && preg_match("/{$code}(\d+)/", $lastEmp['check_id'], $matches)) {
            $nextNumber = intval($matches[1]) + 1;
        } else {
            $nextNumber = 1;
        }

        return $code . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);
    }

    protected $skipValidation = false;
    protected $validationRules = [
        'check_cat' => 'required|safe_string',
        'check_quest' => 'required|safe_string',
    ];
    protected $validationMessages = [
        'check_cat' => [
            'required' => 'Checklist category is required.',
            'safe_string' => 'Checklist category contains invalid characters.'
        ],
        'check_quest' => [
            'required' => 'Checklist question is required.',
            'safe_string' => 'Checklist question contains invalid characters.'
        ]
    ];
}
