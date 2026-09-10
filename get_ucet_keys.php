<?php
// Let's connect directly via pdo using known credentials for tests
$pdo = new PDO('mysql:host=localhost;dbname=ju_migration_test', 'root', '');
$stmt = $pdo->query("SHOW INDEX FROM ucet");
$indexes = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($indexes);
