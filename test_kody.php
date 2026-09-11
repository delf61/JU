<?php
$pdo = new PDO('mysql:host=localhost;dbname=ju_migration', 'root', '');
// But MariaDB test might not run directly unless seeded in CI4 db ... Let's use CI4 script
