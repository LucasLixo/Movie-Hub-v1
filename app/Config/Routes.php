<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Home
$routes->get('/', 'Home::index');
$routes->get('/index.html', 'Home::index', [
    'as' => 'index',
]);
$routes->get('/home', 'Home::index', [
    'as' => 'home',
]);
$routes->get('/home.html', 'Home::index');

// Search
$routes->get('/movie/search/(:num)/(:segment)', 'Home::searchMovie/$1/$2');
$routes->get('/serie/search/(:num)/(:segment)', 'Home::searchSerie/$1/$2');

// Details
$routes->get('/movie/details/(:alphanum).html', 'Home::detailsMovie/$1');
$routes->get('/serie/details/(:alphanum).html', 'Home::detailsSerie/$1');
