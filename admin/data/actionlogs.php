<?php
   
   define ('allow' , true);
   define ('json' , true);
   
   include_once $_SERVER['DOCUMENT_ROOT'] . '/inc.php';
   
   $start = intval ($_POST['start'] ?? 0);
   $length = intval ($_POST['length'] ?? 10);
   $orderColumn = intval ($_POST['order'][0]['column'] ?? 0);
   $orderDir = strtolower ($_POST['order'][0]['dir'] ?? '') === 'desc' ? 'DESC' : 'ASC';
   
   $actionDataAll = $Logs -> LogsDataAll ();
   $totalCount = count ($actionDataAll['Response']);

// Apply sorting
   usort ($actionDataAll['Response'] , function ($a , $b) use ($orderColumn , $orderDir) {
      $aVal = $a[array_keys ($a)[$orderColumn]];
      $bVal = $b[array_keys ($b)[$orderColumn]];
      return $orderDir === 'ASC' ? $bVal <=> $aVal : $aVal <=> $bVal;
   });

// Apply pagination
   $actionDataAll['Response'] = array_slice ($actionDataAll['Response'] , $start , $length);
   
   $results = array_map (function ($av) use ($Api , $Secure , $User) {
      
      $user = $User -> UserDataID ($av['uID'] , 1)['username'] ?? 'n/a';
      
      
      return [
            "id" => (int)$av['id'] ,
            'uID' => $Secure -> SecureTxt ($user) ,
            'action' => $Secure -> SecureTxt ($av['action']) ,
            'date' => date ('M d H:i:s' , $av['timestamp']) ,
      ];
   } , $actionDataAll['Response']);
   
   $response = [
         'draw' => intval ($_POST['draw'] ?? 1) ,
         'recordsTotal' => $totalCount ,
         'recordsFiltered' => $totalCount ,
         'data' => $results ,
   ];
   
   header ('Content-Type: application/json');
   echo json_encode ($response);
?>