<?php

declare(strict_types=1);

// Set error reporting and display errors
error_reporting(E_ALL);
ini_set('display_errors', '1');

define('allow', true);
define('json', true);

include_once $_SERVER['DOCUMENT_ROOT'] . '/inc.php';

// Retrieve all API data from the database
$Slots = $Api->ApiSlotsL7Method('GAMBA');
$Load = $ALogs->LogsDataMethodRunning('2')['Count'];

// Encode the $Load and $Slots as JSON and return them
header('Content-Type: application/json');
echo json_encode([
 'total_slots' => $Slots,
 'slots' => $Load,
]);

?>
