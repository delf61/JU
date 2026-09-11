<?php
// Simulator for copy logic
$b = "12";
$b_copy = substr($b . '_COPY', 0, 8);
echo "Resulting b for copy: " . $b_copy . "\n";

$b2 = "12345678";
$b_copy2 = substr($b2 . '_COPY', 0, 8);
echo "Resulting b for copy 2: " . $b_copy2 . "\n";
