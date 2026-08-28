<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->get('cashbook', 'Home::cashbook');

// Dictionaries Module
$routes->get('dictionary', 'DictionaryController::index');
$routes->group('api/dictionary', function($routes) {
    $routes->get('(:segment)', 'DictionaryController::list/$1');
    $routes->post('(:segment)', 'DictionaryController::create/$1');
    $routes->put('(:segment)/(:any)', 'DictionaryController::update/$1/$2');
    $routes->delete('(:segment)/(:any)', 'DictionaryController::delete/$1/$2');
});
