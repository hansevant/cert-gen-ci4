<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->post('/', 'Login::processLogin');
$routes->get('/lab', 'Auth::lab');
$routes->get('/lab/(:num)', 'Auth::lab/$1');
$routes->get('/tambah', 'Auth::tambah');
$routes->post('/tambah', 'Auth::processTambah');
$routes->post('/upload', 'Auth::processUpload');
$routes->get('/ubah/(:num)', 'Auth::edit/$1');
$routes->post('/ubah/(:num)', 'Auth::processEdit/$1');
$routes->get('/hapus/(:num)', 'Auth::delete/$1');
$routes->get('/clear', 'Auth::deleteAll');
$routes->get('/surket/(:num)', 'PrintGen::surket/$1');
$routes->get('/sertif/(:num)', 'PrintGen::sertif/$1');
