<?php

define('allow', true);
define('json', true);

include_once $_SERVER['DOCUMENT_ROOT'] . '/inc.php';

$start = intval($_POST['start'] ?? 0);
$length = intval($_POST['length'] ?? 10);
$orderColumn = intval($_POST['order'][0]['column'] ?? 0);
$orderDir = strtolower($_POST['order'][0]['dir'] ?? '') === 'desc' ? 'DESC' : 'ASC';

$blacklistdata = $BlackList->BlackListDataAll();
$totalCount = count($blacklistdata['Response']);

// Apply sorting
usort($blacklistdata['Response'], function ($a, $b) use ($orderColumn, $orderDir) {
    $aVal = $a[array_keys($a)[$orderColumn]];
    $bVal = $b[array_keys($b)[$orderColumn]];
    return $orderDir === 'DESC' ? $bVal <=> $aVal : $aVal <=> $bVal;
});

// Apply pagination
$blacklistdata['Response'] = array_slice($blacklistdata['Response'], $start, $length);

$results = array_map(function ($av) use ($Api, $Secure) {
    return [
        "id" => (int)$av['id'],
        'word' => $Secure->SecureTxt($av['word']),
    ];
}, $blacklistdata['Response']);

$response = [
    'draw' => intval($_POST['draw'] ?? 1),
    'recordsTotal' => $totalCount,
    'recordsFiltered' => $totalCount,
    'data' => $results,
];

header('Content-Type: application/json');
echo json_encode($response);
?>