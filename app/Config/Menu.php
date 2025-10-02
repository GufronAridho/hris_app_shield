<?php

namespace Config;

class Menu
{
    public static array $menus = [
        'home' => [
            ['label' => 'Home', 'url' => 'home/index', 'icon' => 'fas fa-home'],
            ['label' => 'Privacy Policy', 'url' => 'home/privacy_policy', 'icon' => 'fas fa-shield-alt'],
            ['label' => 'Dashboard', 'url' => 'home/dashboard', 'icon' => 'fas fa-tachometer-alt'],
            ['label' => 'Report', 'url' => 'home/report', 'icon' => 'fas fa-file-alt'],
        ],
        'recruitment' => [
            ['label' => 'Home', 'url' => 'home/index', 'icon' => 'fas fa-home'],
            ['label' => 'Summary', 'url' => 'recruitment/summary', 'icon' => 'fas fa-chart-pie'],
            ['label' => 'Candidate', 'url' => 'recruitment/candidate', 'icon' => 'fas fa-user-friends'],
            ['label' => 'Interview', 'url' => 'recruitment/interview', 'icon' => 'fas fa-comments'],
        ],
        'onboarding' => [
            ['label' => 'Home', 'url' => 'home/index', 'icon' => 'fas fa-home'],
            ['label' => 'Summary', 'url' => 'onboarding/summary', 'icon' => 'fas fa-chart-pie'],
            ['label' => 'Profile', 'url' => 'onboarding/profile', 'icon' => 'fas fa-user'],
            ['label' => 'Document Checklist', 'url' => 'onboarding/document_checklist', 'icon' => 'fas fa-file-alt'],
            ['label' => 'IT Checklist', 'url' => 'onboarding/it_checklist', 'icon' => 'fas fa-desktop'],
            ['label' => 'Onboarding Task', 'url' => 'onboarding/onboarding_task', 'icon' => 'fas fa-tasks'],
        ],
        'module4' => [
            ['label' => 'Page A', 'url' => 'module4/pagea', 'icon' => 'fas fa-file'],
            ['label' => 'Page B', 'url' => 'module4/pageb', 'icon' => 'fas fa-file-alt'],
        ],
    ];
}
