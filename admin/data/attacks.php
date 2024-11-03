<?php
 
 define ('allow' , true);
 define ('json' , true);
 
 include_once $_SERVER['DOCUMENT_ROOT'] . '/inc.php';
 
 $start = intval ($_POST['start'] ?? 0);
 $length = intval ($_POST['length'] ?? 10);
 $orderColumn = intval ($_POST['order'][0]['column'] ?? 0);
 $orderDir = strtolower ($_POST['order'][0]['dir'] ?? '') === 'desc' ? 'DESC' : 'ASC';
 
 $attacksDataAll = $ALogs -> LogsDataRunning ();
 
 $totalCount = count ($attacksDataAll['Response']);
 
 // Apply sorting
 usort ($attacksDataAll['Response'] , function ($a , $b) use ($orderColumn , $orderDir) {
  $aVal = $a[array_keys ($a)[$orderColumn]];
  $bVal = $b[array_keys ($b)[$orderColumn]];
  return $orderDir === 'ASC' ? $bVal <=> $aVal : $aVal <=> $bVal;
 });
 
 // Apply pagination
 $attacksDataAll['Response'] = array_slice ($attacksDataAll['Response'] , $start , $length);
 
 $results = array_map (function ($Sv) use ($csrftoken , $Secure , $Methods , $User , $Api) {
  
  // Check if the attack is still active and not stopped
  if ($Sv['time'] + $Sv['date'] > time () && $Sv['stopped'] == 0) {
   // Determine the target
   $target = $Sv['port'] == 0 ? $Sv['target'] : $Sv['target'] . ":" . $Sv['port'];
   
   // Calculate the countdown
   $time = $Sv['time'] + $Sv['date'] - time ();
   
   // Set "n/a" for missing or null values
   $method = @$Methods->MethodsDataID($Sv['method'])['hubname'] ?? 'n/a';
   $user = $User->UserDataID($Sv['userID'], 1)['username'] ?? 'n/a';
   $path = $Sv['where'] ?? 'n/a';
   $handler = $Api->ApiDataID($Sv['handler'], 1)['name'] ?? 'n/a';
   
   return [
     "id" => (int)$Sv['id'],
     "csrftoken" => $csrftoken,
     "target" => $Secure->SecureTxt($target) ?? 'n/a',
     "time" => $time ?? 'n/a',
     "method" => $Secure->SecureTxt($method),
     "user" => $Secure->SecureTxt($user),
     "path" => $path,
     "handler" => $Secure->SecureTxt($handler),
   ];
  }
 }, $attacksDataAll['Response']);
 
 $response = [
   'draw' => intval ($_POST['draw'] ?? 1),
   'recordsTotal' => $totalCount,
   'recordsFiltered' => $totalCount,
   'data' => $results,
 ];
 
 header ('Content-Type: application/json');
 echo json_encode ($response);
?>
