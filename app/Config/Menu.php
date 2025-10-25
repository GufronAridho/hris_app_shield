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
            ['label' => 'Opening', 'url' => 'recruitment/opening', 'icon' => 'fas fa-briefcase'],
            ['label' => 'Summary', 'url' => 'recruitment/summary', 'icon' => 'fas fa-chart-pie'],
            ['label' => 'Candidate', 'url' => 'recruitment/candidate', 'icon' => 'fas fa-user-friends'],
            ['label' => 'Interview', 'url' => 'recruitment/interview', 'icon' => 'fas fa-comments'],
        ],
        'onboarding' => [
            ['label' => 'Home', 'url' => 'home/index', 'icon' => 'fas fa-home'],
            ['label' => 'Summary', 'url' => 'onboarding/summary', 'icon' => 'fas fa-chart-pie'],
            ['label' => 'Profile', 'url' => 'onboarding/profile', 'icon' => 'fas fa-user'],
            // ['label' => 'Document Checklist', 'url' => 'onboarding/document_checklist', 'icon' => 'fas fa-file-alt'],
            // ['label' => 'IT Checklist', 'url' => 'onboarding/it_checklist', 'icon' => 'fas fa-desktop'],
            // ['label' => 'Onboarding Task', 'url' => 'onboarding/onboarding_task', 'icon' => 'fas fa-tasks'],
        ],
        'employee_info' => [
            ['label' => 'Home', 'url' => 'home/index', 'icon' => 'fas fa-home'],
            ['label' => 'Employee Management', 'url' => 'employee_info/employee_managment', 'icon' => 'fas fa-users-cog'],
            ['label' => 'People', 'url' => 'employee_info/people', 'icon' => 'fas fa-user-friends'],
            ['label' => 'Department', 'url' => 'employee_info/department', 'icon' => 'fas fa-building'],
            ['label' => 'Employee Profile', 'url' => 'employee_info/employee_profile', 'icon' => 'fas fa-id-card'],
        ],
        'master_data' => [
            ['label' => 'Home', 'url' => 'home/index', 'icon' => 'fas fa-home'],
            ['label' => 'Checklist', 'url' => 'master_data/mst_checklist', 'icon' => 'fas fa-clipboard-check'],
            ['label' => 'Department', 'url' => 'master_data/mst_dept', 'icon' => 'fas fa-building'],
            ['label' => 'Employee Type', 'url' => 'master_data/mst_emp_type', 'icon' => 'fas fa-user-tag'],
            ['label' => 'Job', 'url' => 'master_data/mst_job', 'icon' => 'fas fa-briefcase'],
            ['label' => 'Status', 'url' => 'master_data/mst_status', 'icon' => 'fas fa-toggle-on'],
            ['label' => 'User', 'url' => 'master_data/mst_user', 'icon' => 'fas fa-user-cog'],
            ['label' => 'Shift', 'url' => 'master_data/mst_shift', 'icon' => 'fas fa-business-time'],

        ],
        'attendance' => [
            ['label' => 'Home', 'url' => 'home/index', 'icon' => 'fas fa-home'],
            ['label' => 'Attendance', 'url' => 'attendance/attendance', 'icon' => 'fas fa-clipboard-check'],
            ['label' => 'Summary', 'url' => 'attendance/summary', 'icon' => 'fas fa-chart-pie'],
            ['label' => 'Leave', 'url' => 'attendance/leave', 'icon' => 'fas fa-umbrella-beach'],
        ],
    ];
}
