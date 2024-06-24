<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/todo', 'Todo::index');
$routes->post('/todo/add', 'Todo::add');
$routes->get('/todo/delete/(:num)', 'Todo::delete/$1');
$routes->get('/todo/toggle/(:num)', 'Todo::toggle/$1');
$routes->get('/todo/edit/(:num)', 'Todo::edit/$1');
$routes->post('/todo/update/(:num)', 'Todo::update/$1');
