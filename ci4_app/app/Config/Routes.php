<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');



// Dictionary Routes
$routes->get('dictionary', 'DictionaryController::index');
$routes->group('dictionary/api', function($routes) {
    $routes->get('list/(:segment)', 'DictionaryController::list/$1');
    $routes->get('show/(:segment)/(:segment)', 'DictionaryController::show/$1/$2');
    $routes->post('create/(:segment)', 'DictionaryController::create/$1');
    $routes->put('update/(:segment)/(:segment)', 'DictionaryController::update/$1/$2');
    $routes->delete('delete/(:segment)/(:segment)', 'DictionaryController::delete/$1/$2');
});

$routes->group('accounting', function ($routes) {
    $routes->get('initial-states', 'AccountingController::initialStates');
    $routes->post('initial-states/(:segment)', 'AccountingController::updateInitialStatePost/$1');
});

$routes->group('api/accounting', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('initial-states', 'AccountingController::index');
    $routes->get('initial-states/(:segment)', 'AccountingController::show/$1');
    $routes->post('initial-states', 'AccountingController::create');
    $routes->put('initial-states/(:segment)', 'AccountingController::update/$1');
    $routes->delete('initial-states/(:segment)', 'AccountingController::delete/$1');
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

// Invoices Routes (Receivables and Liabilities)
$routes->group('invoices', function($routes) {
    // Receivables (kp/kppol)
    $routes->get('receivables', 'ReceivableController::webIndex');
    $routes->get('api/receivables', 'ReceivableController::index');
    $routes->post('receivables', 'ReceivableController::create');
    $routes->get('receivables/(:segment)/(:segment)', 'ReceivableController::show/$1/$2');
    $routes->put('receivables/(:segment)/(:segment)', 'ReceivableController::update/$1/$2');
    $routes->delete('receivables/(:segment)/(:segment)', 'ReceivableController::delete/$1/$2');
    $routes->get('receivables/(:segment)/(:segment)/status', 'ReceivableController::calculateStatus/$1/$2');

    // Liabilities (kz/kzpol)
    $routes->get('liabilities', 'LiabilityController::webIndex');
    $routes->get('api/liabilities', 'LiabilityController::index');

    // Liabilities Attachments
    $routes->get('api/liabilities/attachments', 'LiabilityController::getAttachments');
    $routes->post('api/liabilities/attachments/upload', 'LiabilityController::uploadAttachment');
    $routes->get('api/liabilities/attachments/download/(:num)', 'LiabilityController::downloadAttachment/$1');

    $routes->post('liabilities', 'LiabilityController::create');
    $routes->get('liabilities/(:segment)/(:segment)', 'LiabilityController::show/$1/$2');
    $routes->put('liabilities/(:segment)/(:segment)', 'LiabilityController::update/$1/$2');
    $routes->delete('liabilities/(:segment)/(:segment)', 'LiabilityController::delete/$1/$2');
    $routes->get('liabilities/(:segment)/(:segment)/status', 'LiabilityController::calculateStatus/$1/$2');
});


// Cashbook Routes
// Cashbook Web UI Routes
$routes->get('cashbook', 'CashbookController::webIndex');
$routes->get('cashbook/create', 'CashbookController::create');
$routes->post('cashbook/store', 'CashbookController::store');
$routes->get('cashbook/edit/(:any)/(:num)', 'CashbookController::uiEdit/$1/$2');
$routes->post('cashbook/update/(:any)/(:num)', 'CashbookController::uiUpdate/$1/$2');
$routes->post('cashbook/delete/(:any)/(:num)', 'CashbookController::uiDelete/$1/$2');



// Bank Statement
$routes->post('bank/transfer_pd', 'BankStatementController::transferToPd');
$routes->post('bank/cash_transfer', 'BankStatementController::cashTransfer');
$routes->post('bank/pay_invoice', 'BankStatementController::payInvoice');

$routes->get('api/bank/unpaid', 'BankStatementController::getUnpaidInvoices');
$routes->get('bank', 'BankStatementController::webIndex');
$routes->get('bank/edit/(:num)', 'BankStatementController::uiEdit/$1');
$routes->post('bank/update/(:num)', 'BankStatementController::uiUpdate/$1');
$routes->post('bank/delete', 'BankStatementController::uiDelete');
$routes->post('bank/copy', 'BankStatementController::uiCopy');


// Cashbook API for Kódy Operácií
$routes->get('api/cashbook/codes', 'CashbookController::getCodesApi');
$routes->post('api/cashbook/update_code', 'CashbookController::updateCodeApi');
$routes->post('api/cashbook/update_desc', 'CashbookController::updateCodeDescriptionApi');

// Cashbook Legacy Procedures

$routes->get('cashbook/statistics', 'CashbookController::statistics');
$routes->get('cashbook/summary', 'CashbookController::summary');
$routes->get('cashbook/document/(:any)/(:num)', 'CashbookController::documentRedirect/$1/$2');

$routes->group('cashbook', function($routes) {

    // API
    $routes->get('api', 'CashbookController::index');
    $routes->get('api/reasons', 'CashbookController::reasons');
    $routes->get('api/totals/(:num)', 'CashbookController::totals/$1');
    $routes->get('api/(:segment)/(:num)', 'CashbookController::show/$1/$2');
});

// VAT (DPH) Routes
$routes->group('vat', function($routes) {
    $routes->get('api/calculate', 'VatController::calculate');
    $routes->get('api/rates', 'VatController::rates');
    $routes->get('api/history', 'VatController::history');
});

// Global Year context endpoint
$routes->post('api/settings/set-year', 'Home::setYear');
