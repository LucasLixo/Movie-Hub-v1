<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index', [
    'as' => 'home',
]);
$routes->get('/movie/search/(:segment)', 'Home::searchMovie/$1');
