<?php
   
   define ('allow' , true);
   define ('json' , true);
   
   include_once $_SERVER['DOCUMENT_ROOT'] . '/inc.php';
   
   $start = intval ($_POST['start'] ?? 0);
   $length = intval ($_POST['length'] ?? 10);
   $orderColumn = intval ($_POST['order'][0]['column'] ?? 0);
   $orderDir = strtolower ($_POST['order'][0]['dir'] ?? '') === 'desc' ? 'DESC' : 'ASC';
   
   $invoiceDataAll = $Order -> OrderDataAll ();
   $totalCount = count ($invoiceDataAll['Response']);

// Apply sorting
   usort ($invoiceDataAll['Response'] , function ($a , $b) use ($orderColumn , $orderDir) {
      $aVal = $a[array_keys ($a)[$orderColumn]];
      $bVal = $b[array_keys ($b)[$orderColumn]];
      return $orderDir === 'DESC' ? $bVal <=> $aVal : $aVal <=> $bVal;
   });

// Apply pagination
   $invoiceDataAll['Response'] = array_slice ($invoiceDataAll['Response'] , $start , $length);
   
   $results = array_map (function ($av) use ($Api , $Secure , $User) {
      
      $user = $User -> UserDataID ($av['userID'] , 1)['username'] ?? 'n/a';
      
      
      return [
            "order_id" => (int)$av['order_id'] ,
            'userID' => $Secure -> SecureTxt ($user) ,
            'local_price' => $Secure -> SecureTxt ($av['local_price']) ,
            'currency' => $Secure -> SecureTxt ($av['currency']) ,
            'invoice_expires' => date ('M d H:i:s' , $av['invoice_expires']) ,
            'invoice_created' => date ('M d H:i:s' , $av['invoice_created']) ,
            'invoice_status' => $Secure -> SecureTxt ($av['invoice_status']) ,
            'address' => $Secure -> SecureTxt ($av['address']) ,
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