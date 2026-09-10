<?php
require 'public/index.php'; // Bootstrap CI4 to use database

$db = \Config\Database::connect();

$sc_count = $db->table('sc')->countAllResults();
$ikzp_count = $db->table('ikzp')->countAllResults();

echo "SC table count: " . $sc_count . "\n";
echo "IKZP table count: " . $ikzp_count . "\n";
