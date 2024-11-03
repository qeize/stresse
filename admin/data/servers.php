<?php

define('allow', true);
define('json', true);

include_once $_SERVER['DOCUMENT_ROOT'] . '/inc.php';

$start = intval($_POST['start'] ?? 0);
$length = intval($_POST['length'] ?? 10);
$orderColumn = intval($_POST['order'][0]['column'] ?? 0);
$orderDir = strtolower($_POST['order'][0]['dir'] ?? '') === 'desc' ? 'DESC' : 'ASC';

$apiDataAll = $Api->ApiDataAll();
$totalCount = count($apiDataAll['Response']);

// Apply sorting
usort($apiDataAll['Response'], function ($a, $b) use ($orderColumn, $orderDir) {
    $aVal = $a[array_keys($a)[$orderColumn]];
    $bVal = $b[array_keys($b)[$orderColumn]];
    return $orderDir === 'DESC' ? $bVal <=> $aVal : $aVal <=> $bVal;
});

// Apply pagination
$apiDataAll['Response'] = array_slice($apiDataAll['Response'], $start, $length);

$results = array_map(function ($av) use ($Api, $Secure) {
    return [
        "id" => (int)$av['id'],
        'name' => $Secure->SecureTxt($av['name']),
        'count' => $Api->CountApiOfAttacks($av['id']) . '/' . $av['slots'],
        'layer' => $Secure->SecureTxt($av['layer']),
        'status' => $av['status'] ? 'offline' : 'online',
        'lastUsed' => date('M d H:i:s', $av['lastUsed']),
    ];
}, $apiDataAll['Response']);

$response = [
    'draw' => intval($_POST['draw'] ?? 1),
    'recordsTotal' => $totalCount,
    'recordsFiltered' => $totalCount,
    'data' => $results,
];

header('Content-Type: application/json');
echo json_encode($response);
?>