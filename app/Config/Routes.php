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
// Notes management (list, edit, update, delete)
$routes->get('/notes', 'NoteController::index');
$routes->get('/notes/edit/(:num)', 'NoteController::edit/$1');
$routes->post('/notes/update/(:num)', 'NoteController::update/$1');
$routes->post('/notes/delete/(:num)', 'NoteController::delete/$1');
