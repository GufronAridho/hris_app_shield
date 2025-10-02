<?php

namespace App\Controllers;

class Onboarding extends BaseController
{
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
}
