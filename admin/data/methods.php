<?php
   
   define ('allow' , true);
   define ('json' , true);
   
   include_once $_SERVER['DOCUMENT_ROOT'] . '/inc.php';
   
   $start = intval ($_POST['start'] ?? 0);
   $length = intval ($_POST['length'] ?? 10);
   $orderColumn = intval ($_POST['order'][0]['column'] ?? 0);
   $orderDir = strtolower ($_POST['order'][0]['dir'] ?? '') === 'desc' ? 'DESC' : 'ASC';
   
   $methodDataAll = $Methods -> MethodsDataAll ();
   $totalCount = count ($methodDataAll['Response']);

// Apply sorting
   usort ($methodDataAll['Response'] , function ($a , $b) use ($orderColumn , $orderDir) {
      $aVal = $a[array_keys ($a)[$orderColumn]];
      $bVal = $b[array_keys ($b)[$orderColumn]];
      return $orderDir === 'DESC' ? $bVal <=> $aVal : $aVal <=> $bVal;
   });

// Apply pagination
   $methodDataAll['Response'] = array_slice ($methodDataAll['Response'] , $start , $length);
   
   $results = array_map (function ($av) use ($Api , $Secure) {
      return [
            "id" => (int)$av['id'] ,
            'name' => $Secure -> SecureTxt ($av['name']) ,
            'hubname' => $Secure -> SecureTxt ($av['hubname']) ,
            'apiname' => $Secure -> SecureTxt ($av['apiname']) ,
            'layer' => $Secure -> SecureTxt ($av['layer']) ,
            'class' => $Secure -> SecureTxt ($av['class']) ? 'Premium' : 'Basic',
            'description' => $Secure -> SecureTxt ($av['description']) ,
            'type' => $Secure -> SecureTxt ($av['type']),
            'api' => $Secure -> SecureTxt ($av['api']) ? 'True' : 'False' ,
      ];
   } , $methodDataAll['Response']);
   
   $response = [
         'draw' => intval ($_POST['draw'] ?? 1) ,
         'recordsTotal' => $totalCount ,
         'recordsFiltered' => $totalCount ,
         'data' => $results ,
   ];
   
   header ('Content-Type: application/json');
   echo json_encode ($response);
?>