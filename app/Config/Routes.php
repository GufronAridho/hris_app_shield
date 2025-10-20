<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

service('auth')->routes($routes);

$routes->get('/', function () {
    if (! auth()->loggedIn()) {
        return redirect()->to('/login');
    }
    return redirect()->to('/home/index');
});

$routes->get('test-shield', 'TestShield::index');
$routes->get('test-shield/manage', 'TestShield::manageUsers', ['filter' => 'group:admin']);  // Admin only
$routes->match(['get', 'post'], 'test-shield/edit/(:num)', 'TestShield::editUser/$1', ['filter' => 'group:admin']);
$routes->get('test-shield/delete/(:num)', 'TestShield::deleteUser/$1', ['filter' => 'group:admin']);
$routes->post('test-shield/logout', 'TestShield::logout');
$routes->get('user_info/(:any)', 'UserInfo::$1');

// $routes->get('home/(:any)', 'Home::$1');
// $routes->post('home/(:any)', 'Home::$1');
$routes->group('home', function ($routes) {
    $routes->get('index', 'Home::index');
    $routes->get('trial', 'Home::trial');
    $routes->get('dashboard', 'Home::dashboard');
    $routes->get('report', 'Home::report');
    $routes->get('privacy_policy', 'Home::privacy_policy');
    $routes->get('test_csrf', 'Home::test_csrf');
});

$routes->get('recruitment/(:any)', 'Recruitment::$1');
$routes->post('recruitment/(:any)', 'Recruitment::$1');
// $routes->group('recruitment',  function ($routes) {
//     $routes->get('summary', 'Recruitment::summary');
//     $routes->get('candidate', 'Recruitment::candidate');
//     $routes->get('interview', 'Recruitment::interview');
// });

// $routes->get('onboarding/(:any)', 'Onboarding::$1');
// $routes->post('onboarding/(:any)', 'Onboarding::$1');
$routes->group('onboarding', function ($routes) {
    $routes->get('index', 'Onboarding::summary');
    $routes->get('summary', 'Onboarding::summary');
    $routes->get('profile', 'Onboarding::profile');
    $routes->get('document_checklist', 'Onboarding::document_checklist');
    $routes->get('it_checklist', 'Onboarding::it_checklist');
    $routes->get('onboarding_task', 'Onboarding::onboarding_task');

    $routes->get('get_checklist_item', 'Onboarding::get_checklist_item');
});

// $routes->get('employee_info/(:any)', 'Employee_info::$1');
// $routes->post('employee_info/(:any)', 'Employee_info::$1');
$routes->group('employee_info', function ($routes) {

    $routes->get('employee_managment', 'Employee_info::employee_managment');
    $routes->get('people', 'Employee_info::people');
    $routes->get('department', 'Employee_info::department');
    $routes->get('employee_profile', 'Employee_info::employee_profile');
    $routes->get('employee_profile/(:any)', 'Employee_info::employee_profile/$1');

    $routes->post('employee_list', 'Employee_info::employee_list');
    $routes->post('create_employee', 'Employee_info::create_employee');
    $routes->post('update_employee', 'Employee_info::update_employee');
    $routes->post('delete_employee', 'Employee_info::delete_employee');
    $routes->post('upload_employee', 'Employee_info::upload_employee');

    $routes->get('get_department_profile', 'Employee_info::get_department_profile');
    $routes->get('count_employee_dept', 'Employee_info::count_employee_dept');
    $routes->get('get_employee_card', 'Employee_info::get_employee_card');
    $routes->get('count_employee', 'Employee_info::count_employee');

    $routes->get('filterStatus', 'Employee_info::filterStatus');
    $routes->get('filterEmpType', 'Employee_info::filterEmpType');
});

$routes->group('select_form',  function ($routes) {
    $routes->get('statusSelect', 'Select_form::statusSelect');
    $routes->get('jobTitleSelect', 'Select_form::jobTitleSelect');
    $routes->get('empTypeSelect', 'Select_form::empTypeSelect');
    $routes->get('deptSelect', 'Select_form::deptSelect');
    $routes->get('jobOpeningSelect', 'Select_form::jobOpeningSelect');
    $routes->get('candidateSelect', 'Select_form::candidateSelect');
});

// $routes->group('master_data', function ($routes) {
//     $routes->get('mst_checklist', 'Master_data::mst_checklist');
//     $routes->get('mst_dept', 'Master_data::mst_dept');
//     $routes->get('mst_emp_type', 'Master_data::mst_emp_type');
//     $routes->get('mst_job', 'Master_data::mst_job');
//     $routes->get('mst_status', 'Master_data::mst_status');
//     $routes->get('mst_user', 'Master_data::mst_user');
// });
$routes->get('master_data/(:any)', 'Master_data::$1');
$routes->post('master_data/(:any)', 'Master_data::$1');
