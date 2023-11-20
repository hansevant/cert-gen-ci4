<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->post('/', 'Login::processLogin');
$routes->get('/a', 'House::index');
$routes->get('/lab', 'Auth::lab');
$routes->get('/tambah', 'Auth::tambah');
$routes->post('/tambah', 'Auth::processTambah');
$routes->get('/ubah/(:num)', 'Auth::edit/$1');
$routes->post('/ubah/(:num)', 'Auth::processEdit/$1');
$routes->get('/cetak/(:num)', 'PrintGen::cetak/$1');
