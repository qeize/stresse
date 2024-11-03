<?php
   
   define ('allow' , true);
   define ('json' , true);
   
   include_once $_SERVER['DOCUMENT_ROOT'] . '/inc.php';
   
   $start = intval ($_POST['start'] ?? 0);
   $length = intval ($_POST['length'] ?? 10);
   $orderColumn = intval ($_POST['order'][0]['column'] ?? 0);
   $orderDir = strtolower ($_POST['order'][0]['dir'] ?? '') === 'desc' ? 'DESC' : 'ASC';
   
   $invoiceDataAll = $ALogs -> LogsDataAll ();
   $totalCount = count ($invoiceDataAll['Response']);

// Apply sorting
   usort ($invoiceDataAll['Response'] , function ($a , $b) use ($orderColumn , $orderDir) {
      $aVal = $a[array_keys ($a)[$orderColumn]];
      $bVal = $b[array_keys ($b)[$orderColumn]];
      return $orderDir === 'ASC' ? $bVal <=> $aVal : $aVal <=> $bVal;
   });

// Apply pagination
   $invoiceDataAll['Response'] = array_slice ($invoiceDataAll['Response'] , $start , $length);
   
   $results = array_map (function ($av) use ($Api , $Secure , $User, $Methods) {
      
      $user = $User -> UserDataID ($av['userID'] , 1)['username'] ?? 'n/a';
      $method = $Methods->MethodsDataID ($av['method'])['name'] ?? 'n/a';
      
      
      return [
            "id" => (int)$av['id'] ,
            'userID' => $Secure -> SecureTxt ($user) ,
            'host' => $Secure -> SecureTxt ($av['host']) ,
            'method' => $Secure -> SecureTxt ($method) ,
            'date' => date ('M d H:i:s' , $av['date']) ,
            'handler' => $Secure -> SecureTxt ($av['handler']) ,
            'where' => $Secure -> SecureTxt ($av['where']) ,
      ];
   } , $invoiceDataAll['Response']);
   
   $response = [
         'draw' => intval ($_POST['draw'] ?? 1) ,
         'recordsTotal' => $totalCount ,
         'recordsFiltered' => $totalCount ,
         'data' => $results ,
   ];
   
   header ('Content-Type: application/json');
   echo json_encode ($response);
?>