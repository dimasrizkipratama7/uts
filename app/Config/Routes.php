<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Set default controller ke AuthController untuk halaman login
$routes->setDefaultController('AuthController');
$routes->setDefaultMethod('login');

// Route untuk halaman login (GET) dan proses login (POST)
$routes->get('/', 'AuthController::login');
$routes->post('login', 'AuthController::loginProcess');

// Route untuk logout
$routes->get('logout', 'AuthController::logout');

// Route untuk dashboard user dan admin
$routes->get('admin', 'DashboardController::adminDashboard', ['filter' => 'role:admin']);
$routes->get('user', 'DashboardController::userDashboard', ['filter' => 'role:user']);
