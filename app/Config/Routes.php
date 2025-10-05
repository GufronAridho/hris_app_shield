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

$routes->get('home/(:any)', 'Home::$1');
$routes->post('home/(:any)', 'Home::$1');

$routes->get('recruitment/(:any)', 'Recruitment::$1');
$routes->post('recruitment/(:any)', 'Recruitment::$1');

$routes->get('onboarding/(:any)', 'Onboarding::$1');
$routes->post('onboarding/(:any)', 'Onboarding::$1');

$routes->get('employee_info/(:any)', 'Employee_info::$1');
$routes->post('employee_info/(:any)', 'Employee_info::$1');

$routes->get('select_form/(:any)', 'Select_form::$1');
$routes->get('user_info/(:any)', 'UserInfo::$1');
