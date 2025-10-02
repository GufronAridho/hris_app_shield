<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Auth::index');

$routes->get('auth/(:any)', 'Auth::$1');
$routes->post('auth/(:any)', 'Auth::$1');

$routes->get('home/(:any)', 'Home::$1');
$routes->post('home/(:any)', 'Home::$1');

$routes->get('recruitment/(:any)', 'Recruitment::$1');
$routes->post('recruitment/(:any)', 'Recruitment::$1');

$routes->get('onboarding/(:any)', 'Onboarding::$1');
$routes->post('onboarding/(:any)', 'Onboarding::$1');

service('auth')->routes($routes);
