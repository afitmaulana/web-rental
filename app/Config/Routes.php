<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Landing::index');  
$routes->get('/', 'Landing::index');
$routes->get('/admin', 'Admin::index');

// Auth
$routes->get('/admin/login', 'Auth::login');
$routes->post('/admin/login', 'Auth::attemptLogin');
$routes->get('/admin/logout', 'Auth::logout');

// Dashboard (harus login)
$routes->get('/admin/dashboard', 'Admin::index', ['filter' => 'auth']);
$routes->get('/admin/kostum', 'Admin::kostum', ['filter' => 'auth']);
$routes->get('/admin/props', 'Admin::props', ['filter' => 'auth']);

