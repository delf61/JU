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

// Partners and Udaje Routes
$routes->group('partners', function($routes) {
    // Views
    $routes->get('', 'PartnerController::index');
    $routes->get('udaje', 'PartnerController::udaje');

    // API - Partners
    $routes->get('api', 'PartnerController::getPartners');
    $routes->get('api/(:num)', 'PartnerController::getPartner/$1');
    $routes->post('api', 'PartnerController::createPartner');
    $routes->put('api/(:num)', 'PartnerController::updatePartner/$1');
    $routes->delete('api/(:num)', 'PartnerController::deletePartner/$1');

    // API - Udaje
    $routes->get('api/udaje', 'PartnerController::getUdajeInfo');
    $routes->post('api/udaje', 'PartnerController::updateUdajeInfo');
});
