<?php
define('allow', true);
define('json', true);

include_once $_SERVER['DOCUMENT_ROOT'] . '/inc.php';

$start = intval($_POST['start'] ?? 0);
$length = intval($_POST['length'] ?? 10);
$orderColumn = intval($_POST['order'][0]['column'] ?? 0);
$orderDir = strtolower($_POST['order'][0]['dir'] ?? '') === 'desc' ? 'DESC' : 'ASC';
$layer = isset($_POST['layer']) ? intval($_POST['layer']) : null;

$apiDataAll = $Api->ApiDataAll();

// Apply layer filtering
if ($layer !== null) {
    $apiDataAll['Response'] = array_filter($apiDataAll['Response'], function ($item) use ($layer) {
        return intval($item['layer']) === $layer;
    });
}

// Filter by 'status' equal to 0
$apiDataAll['Response'] = array_filter($apiDataAll['Response'], function ($item) {
    return intval($item['status']) === 0;
});

// We need to get the count again after we applied the filter
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
        'network' => $Secure->SecureTxt($av['network']),
        'status' => $av['status'] ? 'offline' : 'online',
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
