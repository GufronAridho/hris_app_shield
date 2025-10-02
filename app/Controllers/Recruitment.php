<?php

namespace App\Controllers;

class Recruitment extends BaseController
{
    public function summary()
    {
        return view('recruitment/summary', [
            'title' => 'Summary',
        ]);
    }

    public function candidate()
    {
        return view('recruitment/candidate', [
            'title' => 'Candidate',
        ]);
    }

    public function interview()
    {
        return view('recruitment/interview', [
            'title' => 'Interview',
        ]);
    }
}
