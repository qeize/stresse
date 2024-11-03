<?php

define('allow', true);
define('json', true);

include_once $_SERVER['DOCUMENT_ROOT'] . '/inc.php';

$start = intval($_POST['start'] ?? 0);
$length = intval($_POST['length'] ?? 10);
$orderColumn = intval($_POST['order'][0]['column'] ?? 0);
$orderDir = strtolower($_POST['order'][0]['dir'] ?? '') === 'desc' ? 'DESC' : 'ASC';

// Get the user's ID
$user_id = $User->UserData()['id'];

// Get the logs data for the user
$attacksDataAll = $ALogs->LogsDataUserID($user_id, 0)['Response'];

// Filter attacks that are still active and not stopped
$attacksDataAll = array_filter($attacksDataAll, function ($Sv) {
    return $Sv['time'] + $Sv['date'] > time() && $Sv['stopped'] == 0;
});

$totalCount = count($attacksDataAll);

if (!empty($attacksDataAll) && is_array(reset($attacksDataAll))) {
    $orderColumns = array_keys(reset($attacksDataAll)); // Assuming all elements have the same keys
} else {
    $orderColumns = []; // Fallback value if not an array
}
$orderColumnKey = $orderColumns[$orderColumn] ?? null;

if ($orderColumnKey) {
    usort($attacksDataAll, function ($a, $b) use ($orderColumnKey, $orderDir) {
        $aVal = $a[$orderColumnKey];
        $bVal = $b[$orderColumnKey];
        return $orderDir === 'DESC' ? $bVal <=> $aVal : $aVal <=> $bVal;
    });
}

// Apply pagination
$attacksDataAllSliced = array_slice($attacksDataAll, $start, $length);

$results = array_map(function ($Sv) use ($csrftoken, $Secure, $Methods, $User, $Api) {
    $target = $Sv['port'] == 0 ? $Sv['host'] : $Sv['target'] . ":" . $Sv['port'];
    $time = $Sv['time'] + $Sv['date'] - time();
    $method = @$Methods->MethodsDataID($Sv['method'])['hubname'] ?? 'n/a';
    $handler = $Api->ApiDataID($Sv['handler'], 1)['name'] ?? 'n/a';

    return [
        "id" => (int)$Sv['id'],
        "csrftoken" => $csrftoken,
        "target" => $Secure->SecureTxt($target) ?? 'n/a',
        "time" => $time ?? 'n/a',
        "method" => $Secure->SecureTxt($method),
        "handler" => $Secure->SecureTxt($handler),
    ];
}, $attacksDataAllSliced);

$response = [
    'draw' => intval($_POST['draw'] ?? 1),
    'recordsTotal' => $totalCount,
    'recordsFiltered' => $totalCount, // Filtering is not applied, so it should be the same as the total count
    'data' => $results,
];

header('Content-Type: application/json');
echo json_encode($response);

?>
