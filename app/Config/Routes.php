<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::index');
$routes->get('/login', 'AuthController::index');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/etudiants', 'EtudiantController::index');
$routes->get('/etudiants/(:num)', 'EtudiantController::show/$1');

$routes->get('/notes/create', 'NoteController::create');
$routes->post('/notes/store', 'NoteController::store');
