
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Landing::index');

// Auth
$routes->get('/admin/login', 'Auth::login');
$routes->post('/admin/login', 'Auth::attemptLogin');
$routes->get('/admin/logout', 'Auth::logout');

// Dashboard (harus login)
$routes->get('/admin/dashboard', 'Admin::index', ['filter' => 'auth']);
// --- Rute Kostum ---
$routes->get('/admin/kostum', 'Admin::kostum', ['filter' => 'auth']);
$routes->post('/admin/kostum/store', 'Admin::kostum_store', ['filter' => 'auth']);
$routes->get('/admin/kostum/edit/(:num)', 'Admin::kostum_edit/$1', ['filter' => 'auth']); // EDIT
$routes->post('/admin/kostum/update/(:num)', 'Admin::kostum_update/$1', ['filter' => 'auth']); // UPDATE
$routes->get('/admin/kostum/delete/(:num)', 'Admin::kostum_delete/$1', ['filter' => 'auth']); // DELETE

// --- Rute Props ---
$routes->get('/admin/props', 'Admin::props', ['filter' => 'auth']);
$routes->post('/admin/props/store', 'Admin::props_store', ['filter' => 'auth']);
$routes->get('/admin/props/edit/(:num)', 'Admin::props_edit/$1', ['filter' => 'auth']); // EDIT
$routes->post('/admin/props/update/(:num)', 'Admin::props_update/$1', ['filter' => 'auth']); // UPDATE
$routes->get('/admin/props/delete/(:num)', 'Admin::props_delete/$1', ['filter' => 'auth']); // DELETE
$routes->get('/admin/pembayaran', 'Admin::pembayaran', ['filter' => 'auth']);

// Alias untuk halaman admin utama
$routes->get('/admin', 'Admin::index', ['filter' => 'auth']);