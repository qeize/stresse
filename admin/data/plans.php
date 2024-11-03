<?php

define('allow', true);
define('json', true);

include_once $_SERVER['DOCUMENT_ROOT'] . '/inc.php';

$start = intval($_POST['start'] ?? 0);
$length = intval($_POST['length'] ?? 10);
$orderColumn = intval($_POST['order'][0]['column'] ?? 0);
$orderDir = strtolower($_POST['order'][0]['dir'] ?? '') === 'desc' ? 'DESC' : 'ASC';

$planDataAll = $Plan->PlanDataGlobal();
$totalCount = count($planDataAll['Response']);

// Apply sorting
usort($planDataAll['Response'], function ($a, $b) use ($orderColumn, $orderDir) {
    $aVal = $a[array_keys($a)[$orderColumn]];
    $bVal = $b[array_keys($b)[$orderColumn]];
    return $orderDir === 'DESC' ? $bVal <=> $aVal : $aVal <=> $bVal;
});

// Apply pagination
$planDataAll['Response'] = array_slice($planDataAll['Response'], $start, $length);

$results = array_map(function ($av) use ($Plan, $Secure) {
    return [
        "ID" => (int)$av['ID'],
        'name' => $Secure->SecureTxt($av['name']),
        'price' => $Secure->SecureTxt($av['price']),
        'length' => $Secure->SecureTxt($av['length']),
        'unit' => $Secure->SecureTxt($av['unit']),
        'concurrents' => $Secure->SecureTxt($av['concurrents']),
        'mbt' => $Secure->SecureTxt($av['mbt']),
        'premium' => $av['premium'] ? 'Premium' : 'Basic',
        'api' => $av['premium'] ? 'True' : 'False',
    ];
}, $planDataAll['Response']);

$response = [
    'draw' => intval($_POST['draw'] ?? 1),
    'recordsTotal' => $totalCount,
    'recordsFiltered' => $totalCount,
    'data' => $results,
];

header('Content-Type: application/json');
echo json_encode($response);
?>