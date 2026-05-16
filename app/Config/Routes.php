<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
//Login
$routes->post('/login', 'Auth::login');
$routes->get('/dashboard', 'Auth::dashboard');


$routes->get('/logout','Auth::logout');
//
$routes->get('/view', 'Employee::index');

$routes->get('/create', 'Employee::create');
$routes->post('/store', 'Employee::store');

$routes->get('/edit/(:num)', 'Employee::edit/$1');
$routes->post('update/(:num)', 'Employee::update/$1');

$routes->get('delete/(:num)', 'Employee::delete/$1');
$routes->get('/employee/excel', 'Employee::excel');

$routes->get('/employee/pdf', 'Employee::pdf');
$routes->get('/employee/view', 'Employee::view');
