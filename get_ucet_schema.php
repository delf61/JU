<?php
// Simulate running within CI4 environment
chdir('ci4_app');
require 'vendor/autoload.php';
$app = require_once 'system/bootstrap.php';
$db = \Config\Database::connect();
print_r($db->getFieldNames('ucet'));
