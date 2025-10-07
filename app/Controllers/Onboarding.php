<?php

namespace App\Controllers;

use App\Models\MstChecklistModel;

class Onboarding extends BaseController
{
    protected $MstChecklistModel;

    public function __construct()
    {
        $this->MstChecklistModel = new MstChecklistModel;
    }

    public function summary()
    {
        return view('onboarding/summary', [
            'title' => 'Summary',
        ]);
    }

    public function profile()
    {
        return view('onboarding/profile', [
            'title' => 'Profile',
        ]);
    }

    public function document_checklist()
    {
        return view('onboarding/document_checklist', [
            'title' => 'Document Checklist',
        ]);
    }

    public function it_checklist()
    {
        return view('onboarding/it_checklist', [
            'title' => 'IT Checklist',
        ]);
    }

    public function onboarding_task()
    {
        return view('onboarding/onboarding_task', [
            'title' => 'Onboarding Task',
        ]);
    }

    private function _json_response($status, $message)
    {
        echo json_encode([
            'status' => $status,
            'message' => $message,
            'csrfHash' => csrf_hash()
        ]);
        exit;
    }

    public function get_checklist_item()
    {
        $check_cat = $this->request->getGet('check_cat');
        $item = $this->MstChecklistModel->where('check_cat', $check_cat)->findAll();
        $data = [
            'item' => $item
        ];
        return view('onboarding/partial/checklist_item', $data);
    }
}
