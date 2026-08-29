<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->get('cashbook', 'Home::cashbook');

// Dictionary Routes
$routes->get('dictionary', 'DictionaryController::index');
$routes->group('dictionary/api', function($routes) {
    $routes->get('list/(:segment)', 'DictionaryController::list/$1');
    $routes->get('show/(:segment)/(:segment)', 'DictionaryController::show/$1/$2');
    $routes->post('create/(:segment)', 'DictionaryController::create/$1');
    $routes->put('update/(:segment)/(:segment)', 'DictionaryController::update/$1/$2');
    $routes->delete('delete/(:segment)/(:segment)', 'DictionaryController::delete/$1/$2');
});
