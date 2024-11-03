<?
define('allow', TRUE);
define('admin', TRUE);

require_once('../inc.php');

/* Add News */
if (isset($GET['AddNews'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

   // Check Title
   $Title = $Secure->AdminSecureTxt($_POST['title']);
   if (empty($Title)) {
      $rMsg = ['error', 'Title is empty.'];
      echo json_encode($rMsg);
      die();
   }


   // Check Message
   $Message = $_POST['message'];

   if (empty($Message)) {
      $rMsg = ['error', 'Message is empty.'];
      echo json_encode($rMsg);
      die();
   }

   if (!($News->AddNews($Title, $Message)) == false) {
      $rMsg = ['success', 'News has been added'];
      echo json_encode($rMsg);
      die();
   } else {
      $rMsg = ['error', 'Error to add in database'];
      echo json_encode($rMsg);
      die();
   }
}

/* Change News */
if (isset($GET['ChangeNews'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

   // Check ID
   $id = (int)$Secure->SecureTxt($POST['id']);
   if (empty($id)) {
      $rMsg = ['error', 'ID is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Name
   $title = $Secure->SecureTxt($_POST['title']);
   if (empty($title)) {
      $rMsg = ['error', 'Title is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Description
   $message = $_POST['message'];
   if (empty($message)) {
      $rMsg = ['error', 'Messages is empty.'];
      echo json_encode($rMsg);
      die();
   }

   if (!($News->ChangeNews($title, $message, $id)) == false) {
      $rMsg = ['success', 'News has been changed'];
      echo json_encode($rMsg);
      die();
   } else {
      $rMsg = ['error', 'Error adding in database'];
      echo json_encode($rMsg);
      die();
   }
}

/* Delete News */
if (isset($GET['DeleteNews'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

   // Check ID
   $id = (int)$Secure->SecureTxt($POST['ID']);
   if (empty($id)) {
      $rMsg = ['error', 'ID is empty.'];
      echo json_encode($rMsg);
      die();
   }

   if (!($News->DeleteNews($id)) == false) {
      $rMsg = ['success', 'News has been deleted!'];
      echo json_encode($rMsg);
      die();
   } else {
      $rMsg = ['error', 'Error adding in database'];
      echo json_encode($rMsg);
      die();
   }
}

/* Add Method */
if (isset($_GET['AddMethod'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

   // Check csrf token
   $csrf = @$Secure->SecureTxt($_POST['_csrf']);
   if ($csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      exit;
   }

   // Check Name
   $name = $Secure->SecureTxt($_POST['name']);
   if (empty($name)) {
      $rMsg = ['error', 'Name is empty.'];
      echo json_encode($rMsg);
      exit;
   }

   // Check Name
   $hubname = $Secure->SecureTxt($_POST['hubname']);
   if (empty($hubname)) {
      $rMsg = ['error', 'Hub name is empty.'];
      echo json_encode($rMsg);
      exit;
   }

   // Check Name
   $apiname = $Secure->SecureTxt($_POST['apiname']);
   if (empty($apiname)) {
      $rMsg = ['error', 'Api name is empty.'];
      echo json_encode($rMsg);
      exit;
   }

   // Check Layer
   $layer = (int)$Secure->SecureTxt($_POST['layer']);
   if (empty($layer)) {
      $rMsg = ['error', 'Layer is empty.'];
      echo json_encode($rMsg);
      exit;
   }

   if ($layer != 7 && $layer != 4) {
      $rMsg = ['error', 'Invalid Layer.'];
      echo json_encode($rMsg);
      exit;
   }

   // Check Type
   $type = (int)$Secure->SecureTxt($_POST['type']);
   if (empty($type)) {
      $rMsg = ['error', 'Type is empty.'];
      echo json_encode($rMsg);
      exit;
   }

   if ($type != 1 && $type != 2 && $type != 3 && $type != 4) {
      $rMsg = ['error', 'Invalid Type.'];
      echo json_encode($rMsg);
      exit;
   }

   // Check Premium
   $class = (int)$Secure->SecureTxt($_POST['class']);

   if ($class != 0 && $class != 1 && $class != 2) {
      $rMsg = ['error', 'Invalid method class.'];
      echo json_encode($rMsg);
      exit;
   }

   // Check api
   $api = (int)$Secure->SecureTxt($_POST['api']);
   if ($api != 0 && $api != 1) {
      $rMsg = ['error', 'Invalid api option.'];
      echo json_encode($rMsg);
      exit;
   }

   // Check Description
   $description = $_POST['description'];
   if (empty($description)) {
      $rMsg = ['error', 'Description is empty.'];
      echo json_encode($rMsg);
      exit;
   }

   // Save to DB
   if ($Methods->AddMethod($name, $hubname, $apiname, $layer, $type, $class, $api, $description)) {
      $rMsg = ['success', 'Method has been added'];
      echo json_encode($rMsg);
      exit;
   } else {
      $rMsg = ['error', 'Error adding in database'];
      echo json_encode($rMsg);
      exit;
   }
}

/* Change Method */
if (isset($GET['ChangeMethod'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

   // Check Name
   $name = $Secure->SecureTxt($_POST['name']);
   if (empty($name)) {
      $rMsg = ['error', 'Name is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Name
   $hubname = $Secure->SecureTxt($_POST['hubname']);
   if (empty($name)) {
      $rMsg = ['error', 'Hub name is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Name
   $apiname = $Secure->SecureTxt($_POST['apiname']);
   if (empty($apiname)) {
      $rMsg = ['error', 'Hub name is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check ID
   $id = (int)$Secure->SecureTxt($POST['id']);
   if (empty($id)) {
      $rMsg = ['error', 'ID is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Premium
   $layer = (int)$Secure->SecureTxt($POST['layer']);
   if ($layer != 4 && $layer != 7) {
      $rMsg = ['error', 'Invalid layer type.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Type
   $type = (int)$Secure->SecureTxt($POST['type']);
   if (empty($type)) {
      $rMsg = ['error', 'Type is empty.'];
      echo json_encode($rMsg);
      die();
   }

   if (!($type) == 1 || !($type) == 2 || !($type) == 3 || !($type) == 4) {
      $rMsg = ['error', 'Invalid Type.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Premium
   $class = (int)$Secure->SecureTxt($POST['class']);
   if ($class != 0 && $class != 1) {
      $rMsg = ['error', 'Invalid method class.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Stop
   $api = (int)$Secure->SecureTxt($POST['api']);
   if ($api != 0 && $api != 1) {
      $rMsg = ['error', 'Invalid api option.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Name
   $description = $Secure->SecureTxt($_POST['description']);
   if (empty($description)) {
      $rMsg = ['error', 'Description is empty.'];
      echo json_encode($rMsg);
      die();
   }

   if (!($Methods->ChangeMethod($name, $hubname, $apiname, $layer, $type, $class, $api, $description, $id)) == false) {
      $rMsg = ['success', 'Method has been changed'];
      echo json_encode($rMsg);
      die();
   } else {
      $rMsg = ['error', 'Error adding in database'];
      echo json_encode($rMsg);
      die();
   }
}

/* Delete Method */
if (isset($GET['DeleteMethod'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

   // Check ID
   $id = (int)$Secure->SecureTxt($POST['id']);
   if (empty($id)) {
      $rMsg = ['error', 'ID is empty.'];
      echo json_encode($rMsg);
      die();
   }

   if (!($Methods->DeleteMethod($id)) == false) {
      $rMsg = ['success', 'Method has been deleted'];
      echo json_encode($rMsg);
      die();
   } else {
      $rMsg = ['error', 'Error adding in database'];
      echo json_encode($rMsg);
      die();
   }
}

/* Add Plan */
if (isset($GET['AddPlan'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

   // Check Name
   $name = $Secure->SecureTxt($_POST['name']);
   if (empty($name)) {
      $rMsg = ['error', 'Name is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check unit
   $unit = $Secure->SecureTxt($_POST['unit']);
   if (empty($unit)) {
      $rMsg = ['error', 'Unit is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check length
   $length = (int)$Secure->SecureTxt($POST['length']);
   if (empty($length)) {
      $rMsg = ['error', 'Length is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Price
   $price = (int)$Secure->SecureTxt($POST['price']);
   if (empty($price) && $price != 0) {
      $rMsg = ['error', 'Price is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Attack Time
   $mbt = (int)$Secure->SecureTxt($POST['mbt']);
   if (empty($mbt)) {
      $rMsg = ['error', 'Attack Time is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Concurrents
   $concurrents = (int)$Secure->SecureTxt($POST['slots']);
   if (empty($concurrents)) {
      $rMsg = ['error', 'Slots is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check API
   $api = (int)$Secure->SecureTxt($POST['plan_api']);

   if ($api != 0 && $api != 1) {
      $rMsg = ['error', 'Invalid API.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Private
   $private = (int)$Secure->SecureTxt($POST['private']);

   if ($private != 0 && $private != 1) {
      $rMsg = ['error', 'Invalid private.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Premium
   $premium = (int)$Secure->SecureTxt($POST['plan_class']);

   if ($premium != 0 && $premium != 1) {
      $rMsg = ['error', 'Invalid Class.'];
      echo json_encode($rMsg);
      die();
   }

   // Save to DB
   if (!($Plan->AddPlan($name, $unit, $length, $mbt, $price, $premium, $concurrents, $private, $api)) == false) {
      $rMsg = ['success', 'Plan has been added'];
      echo json_encode($rMsg);
      die();
   } else {
      $rMsg = ['warning', 'Error adding in database'];
      echo json_encode($rMsg);
      die();
   }

}

/* Delete Plan */
if (isset($GET['DeletePlan'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

   // Check ID
   $ID = (int)$Secure->SecureTxt($POST['ID']);
   if (empty($ID)) {
      $rMsg = ['error', 'ID is empty.'];
      echo json_encode($rMsg);
      die();
   }

   if (!($Plan->DeletePlan($ID)) == false) {
      $rMsg = ['success', 'Plan has been deleted'];
      echo json_encode($rMsg);
      die();
   } else {
      $rMsg = ['error', 'Error to delete plan'];
      echo json_encode($rMsg);
      die();
   }
}

/* Change Plan */
if (isset($GET['ChangePlan'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

   // Check ID
   $id = (int)$Secure->SecureTxt($POST['ID']);
   if (empty($id)) {
      $rMsg = ['error', 'ID is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check name
   $name = $Secure->SecureTxt($_POST['name']);
   if (empty($name)) {
      $rMsg = ['error', 'Name is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Price
   $price = (int)$Secure->SecureTxt($POST['price']);
   if (empty($price) && $price != 0) {
      $rMsg = ['error', 'Price is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check unit for length
   $unit = $Secure->SecureTxt($_POST['unit']);
   if (empty($unit)) {
      $rMsg = ['error', 'Unit of length is empty.'];
      echo json_encode($rMsg);
      die();
   }

   //Check length
   $length = (int)$Secure->SecureTxt($POST['length']);
   if (empty($length) && $length != 0) {
      $rMsg = ['error', 'Length is empty.'];
      echo json_encode($rMsg);
      die();
   }


   // Check Attack Time
   $mbt = (int)$Secure->SecureTxt($POST['mbt']);
   if (empty($mbt)) {
      $rMsg = ['error', 'Attack Time is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Concurrents
   $concurrents = (int)$Secure->SecureTxt($POST['slots']);
   if (empty($concurrents)) {
      $rMsg = ['error', 'Concurrents is empty.'];
      echo json_encode($rMsg);
      die();
   }

   if ($concurrents < 0 || $concurrents > 100000) {
      $rMsg = ['error', 'Invalid Concurrents.'];
      echo json_encode($rMsg);
      die();
   }

   // Check API
   $api = (int)$Secure->SecureTxt($POST['plan_api']);
   if ($api != 0 && $api != 1) {
      $rMsg = ['error', 'Invalid API.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Premium
   $premium = (int)$Secure->SecureTxt($POST['plan_class']);
   if (!($premium) == 0 && !($premium) == 1) {
      $rMsg = ['error', 'Invalid Premium value.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Private
   $private = (int)$Secure->SecureTxt($POST['private']);
   if (!($private) == 0 && !($private) == 1) {
      $rMsg = ['error', 'Invalid Private value.'];
      echo json_encode($rMsg);
      die();
   }

   // Save to DB
   if (!($Plan->ChangePlan($name, $mbt, $price, $premium, $unit, $length, $concurrents, $private, $api, $id)) == false) {
      $rMsg = ['success', 'Plan has been changed'];
      echo json_encode($rMsg);
      die();
   } else {
      $rMsg = ['error', 'Error inserting in DB.'];
      echo json_encode($rMsg);
      die();
   }
}

/* Delete Blacklist */
if (isset($GET['DeleteBlackList'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

   // Check ID
   $ID = (int)$Secure->SecureTxt($POST['id']);
   if (empty($ID)) {
      $rMsg = ['error', 'ID is empty.'];
      echo json_encode($rMsg);
      die();
   }

   if (!($BlackList->DeleteBlackList($ID)) == false) {
      $rMsg = ['success', 'Target has been removed from blacklist'];
      echo json_encode($rMsg);
      die();
   } else {
      $rMsg = ['error', 'Error to execute action'];
      echo json_encode($rMsg);
      die();
      // }
   }
}

/* Add BlackList */
if (isset($GET['AddBlackList'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

   // Check Word
   $word = $Secure->SecureTxt($_POST['word']);
   if (empty($word)) {
      $rMsg = ['error', 'Word/Ip is empty.'];
      echo json_encode($rMsg);
      die();
   }


   // Save to DB
   if (!($BlackList->AddBlackList($word)) == false) {
      $rMsg = ['success', 'Target has been blacklisted'];
      echo json_encode($rMsg);
      die();
   } else {
      $rMsg = ['error', 'Error'];
      echo json_encode($rMsg);
      die();
   }
}

/* Delete BlackList */
if (isset($GET['DeleteBlackList'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

// Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

   // Check ID
   $id = (int)$Secure->SecureTxt($POST['id']);
   if (empty($id)) {
      $rMsg = ['error', 'ID is empty.'];
      echo json_encode($rMsg);
      die();
   }

   if (!($BlackList->DeleteBlackList($id)) == false) {
      $rMsg = ['success', 'Successfully Executed'];
      echo json_encode($rMsg);
      die();
   } else {
      $rMsg = ['error', 'Error'];
      echo json_encode($rMsg);
      die();
   }
}

if (isset($GET['DisableApi'])) {
    //Admin rank check
    if ($Admin->AdminAllow() != true) {
        $rMsg = ['error', 'You don\'t have permission!'];
        echo json_encode($rMsg);
        die();
    }

    // Check csrf
    $_csrf = @$Secure->SecureTxt($POST['_csrf']);
    if ($_csrf != $csrftoken) {
        $rMsg = ['error', 'Token is expired!'];
        echo json_encode($rMsg);
        die();
    }

    // Check ID
    $id = $Secure->SecureTxt($POST['ID']);
    if (empty($id)) {
        $rMsg = ['error', 'ID is empty.'];
        echo json_encode($rMsg);
        die();
    }

    if (!($Api->DisableApi($id)) == false) {
        $rMsg = ['success', 'API Server has been disabled'];
        echo json_encode($rMsg);
        die();
    } else {
        $rMsg = ['error', 'Error to enable api'];
        echo json_encode($rMsg);
        die();
    }
}


if (isset($GET['EnableApi'])) {
    //Admin rank check
    if ($Admin->AdminAllow() != true) {
        $rMsg = ['error', 'You don\'t have permission!'];
        echo json_encode($rMsg);
        die();
    }

    // Check csrf
    $_csrf = @$Secure->SecureTxt($POST['_csrf']);
    if ($_csrf != $csrftoken) {
        $rMsg = ['error', 'Token is expired!'];
        echo json_encode($rMsg);
        die();
    }

    // Check ID
    $id = $Secure->SecureTxt($POST['ID']);
    if (empty($id)) {
        $rMsg = ['error', 'ID is empty.'];
        echo json_encode($rMsg);
        die();
    }

    if (!($Api->EnableApi($id)) == false) {
        $rMsg = ['success', 'API Server has been enabled'];
        echo json_encode($rMsg);
        die();
    } else {
        $rMsg = ['error', 'Error to enable api'];
        echo json_encode($rMsg);
        die();
    }
}

/* Add API */
if (isset($GET['AddAPI'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

   // Check Name
   $name = $Secure->SecureTxt($_POST['name']);
   if (empty($name)) {
      $rMsg = ['error', 'Name is empty.'];
      echo json_encode($rMsg);
      die();
   }


   // Check Link
   $link = $Secure->AdminSecureTxt($POST['link']);
   if (empty($link)) {
      $rMsg = ['error', 'Link is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Layer
   $layer = (int)$Secure->SecureTxt($POST['layer']);
   if (empty($layer)) {
      $rMsg = ['error', 'Layer is empty.'];
      echo json_encode($rMsg);
      die();
   }

   if ($layer != 4) {
      if ($layer != 7) {
         $rMsg = ['error', 'Layer is invalid.'];
         echo json_encode($rMsg);
         die();
      }
   }

   // Check status
   $Status = (int)$Secure->SecureTxt($POST['status']);

   if ($Status != 0) {
      if ($Status != 1) {
         $rMsg = ['error', 'Status is invalid.'];
         echo json_encode($rMsg);
         die();
      }
   }

   // Check slots
   $slots = (int)$Secure->SecureTxt($POST['slots']);
   if (empty($slots)) {
      $rMsg = ['error', 'Slots are empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Methods
   $methods = $Secure->SecureTxt(implode("|", $POST['methods']));

   if (empty($methods)) {
      $rMsg = ['error', 'Methods are empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Save to DB
   if (!($Api->AddAPI($name, $link, $slots, $methods, $layer, $Status, 0)) == false) {
      $rMsg = ['success', 'Api has been added'];
      echo json_encode($rMsg);
      die();
   } else {
      $rMsg = ['error', 'Error add in database'];
      echo json_encode($rMsg);
      die();
   }
}

/* Change API */
if (isset($GET['ChangeAPI'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

   // Check ID
   $id = (int)$Secure->SecureTxt($POST['ID']);
   if (empty($id)) {
      $rMsg = ['error', 'ID is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Name
   $Name = $Secure->SecureTxt($_POST['name']);
   if (empty($Name)) {
      $rMsg = ['error', 'Name is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Link
   $Link = $Secure->AdminSecureTxt($POST['link']);
   if (empty($Link)) {
      $rMsg = ['error', 'Link is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Slots
   $Slots = (int)@$Secure->SecureTxt($POST['slots']);
   if (empty($Slots)) {
      $rMsg = ['error', 'Slots is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Layer
   $layer = (int)$Secure->SecureTxt($POST['layer']);
   if (empty($layer)) {
      $rMsg = ['error', 'Layer is empty.'];
      echo json_encode($rMsg);
      die();
   }

   if ($layer != 4) {
      if ($layer != 7) {
         $rMsg = ['error', 'Layer is invalid.'];
         echo json_encode($rMsg);
         die();
      }
   }


   if (empty($POST['methods'])) {
      $rMsg = ['error', 'Methods is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Methods
   $Methods = @$Secure->SecureTxt(implode("|", $POST['methods']));
   if (empty($Methods)) {
      $rMsg = ['error', 'Methods are empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Status
   $Status = (int)@$Secure->SecureTxt($POST['status']);

   if ($Status != 0) {
      if ($Status != 1) {
         $rMsg = ['error', 'Status is invalid.'];
         echo json_encode($rMsg);
         die();
      }
   }

   if (!($Api->ChangeAPI($Name, $Link, $Slots, $Methods, $layer, $Status, $id)) == false) {
      $rMsg = ['success', 'Api has been changed'];
      echo json_encode($rMsg);
      die();
   } else {
      $rMsg = ['error', 'Error to change server'];
      echo json_encode($rMsg);
      die();
   }
}

if (isset($GET['DisableApi'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

   // Check ID
   $id = $Secure->SecureTxt($POST['ID']);
   if (empty($id)) {
      $rMsg = ['error', 'ID is empty.'];
      echo json_encode($rMsg);
      die();
   }

   if (!($Api->DisableApi($id)) == false) {
      $rMsg = ['success', 'API Server has been disabled'];
      echo json_encode($rMsg);
      die();
   } else {
      $rMsg = ['error', 'Error to enable api'];
      echo json_encode($rMsg);
      die();
   }
}


if (isset($GET['EnableApi'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

   // Check ID
   $id = $Secure->SecureTxt($POST['ID']);
   if (empty($id)) {
      $rMsg = ['error', 'ID is empty.'];
      echo json_encode($rMsg);
      die();
   }

   if (!($Api->EnableApi($id)) == false) {
      $rMsg = ['success', 'API Server has been enabled'];
      echo json_encode($rMsg);
      die();
   } else {
      $rMsg = ['error', 'Error to enable api'];
      echo json_encode($rMsg);
      die();
   }
}


/* Delete API */
if (isset($GET['DeleteAPI'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

   // Check ID
   $id = $Secure->SecureTxt($POST['ID']);
   if (empty($id)) {
      $rMsg = ['error', 'ID is empty.'];
      echo json_encode($rMsg);
      die();
   }

   if (!($Api->DeleteAPI($id)) == false) {
      $rMsg = ['success', 'API Server has been deleted'];
      echo json_encode($rMsg);
      die();
   } else {
      $rMsg = ['error', 'Error to delete api'];
      echo json_encode($rMsg);
      die();
   }
}

/* Change User */
if (isset($GET['ChangeUser'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

   // Check ID
   $id = (int)$Secure->SecureTxt($POST['ID']);
   if (empty($id)) {
      $rMsg = ['error', 'ID is empty.'];
      echo json_encode($rMsg);
      die();
   }

   // Check Plan
   $Plan = (int)@$Secure->SecureTxt($POST['plan']);

   // Check Expire
   $Expire = $Secure->SecureTxt($POST['expire']);
   if (empty($Expire)) {
      $Expire = 0;
   } else {
      // Calculate Expire
      $dateTime = new DateTime($Expire);
      $Expire = $dateTime->format('U');
   }

   // Check Money
   $Money = (int)$Secure->SecureTxt($POST['money']);

   // Check Status
   $Status = (int)$Secure->SecureTxt($POST['status']);

   // Check Seconds
   $Seconds = (int)$Secure->SecureTxt($POST['seconds']);

   // Check Concurrents
   $Concurrents = (int)$Secure->SecureTxt($POST['concurrents']);

   // Check Api
   $Api = (int)$Secure->SecureTxt($POST['api']);

   // Check Premium
   $Premium = (int)$Secure->SecureTxt($POST['premium']);


   // Check for Password Changing
   $newpw1 = $_POST['newpw1'];
   $newpw2 = $_POST['newpw2'];

   $AddonsUpdate = $Concurrents . "|" . $Seconds . "|" . $Api . "|" . $Premium;

   if (!empty($newpw1) || !empty($newpw2)) {
      if ($newpw1 == $newpw2) {
         // Save to DB;
         $Admin->ChangeUser($id, $Plan, $Expire, $Money, $Status, $newpw1, $AddonsUpdate);
      } else {
         $rMsg = ['error', 'New passwords are not same.'];
         echo json_encode($rMsg);
         die();
      }
   } else {
      // Save to DB;
      $Admin->ChangeUser($id, $Plan, $Expire, $Money, $Status, '0', $AddonsUpdate);
   }
}

/* Delete User */
if (isset($GET['DeleteUser'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

   // Check ID
   $id = (int)$Secure->SecureTxt($POST['ID']);
   if (empty($id)) {
      $rMsg = ['error', 'ID is empty.'];
      echo json_encode($rMsg);
      die();
   }

   if (!($Admin->DeleteUser($id)) == false) {
      $rMsg = ['success', 'Successfully Executed!'];
      echo json_encode($rMsg);
      die();
   } else {
      $rMsg = ['error', 'User has been deleted'];
      echo json_encode($rMsg);
      die();
   }
}

if (isset($GET['MaintainceUpdate'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

   // Check csrf
   $csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

   $value = (int)$Secure->SecureTxt($POST['value']);

   if ($value != 0) {
      if ($value != 1) {
         $rMsg = ['error', 'Value is invalid.'];
         echo json_encode($rMsg);
         die();
      }
   }

   $type = $Secure->SecureTxt($POST['type']);

   if (empty($type)) {
      $rMsg = ['erro', 'Empty maintaince type'];
      echo json_encode($rMsg);
      die();
   }
   // Execute
   $Main->MaintainceUpdate($type, $value);

}

/* Add Users Time */
if (isset($GET['AddTimeAllUsers'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

   // Check Time
   $Time = (int)$Secure->SecureTxt($POST['Time']);
   if (empty($Time)) {
      $rMsg = ['error', 'Time is empty.'];
      echo json_encode($rMsg);
      die();
   }

   $timeAdd = $Time * 86400;

   $Admin->AddTimeAllUsers($timeAdd);
}


/* Stop Attack */
if (isset($GET['AdminStop'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }
   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

// Check
   $id = (int)@$Secure->SecureTxt($POST['id']);
// Is valid Attack ID
   if (empty($id)) {
      $rMsg = ['error', 'Invalid ID.'];
      echo json_encode($rMsg);
      die();
   }

   if ($ALogs->LogsDataID($id, 1)['stopped'] != 0) {
      $rMsg = ['error', 'This attack is stopped.'];
      echo json_encode($rMsg);
      die();
   }

   if ($ALogs->LogsDataID($id, 1)['date'] + $ALogs->LogsDataID($id, 1)['time'] < time()) {
      $rMsg = ['error', 'This attack is expired.'];
      echo json_encode($rMsg);
      die();
   }
   // Execute
   $Attack->Stop($id);
}


/* Delete Method */
if (isset($GET['DeleteAttacks'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }

   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

   // Check ID
   $id = (int)$Secure->SecureTxt($POST['ID']);
   if (empty($id)) {
      $rMsg = ['error', 'ID is empty.'];
      echo json_encode($rMsg);
      die();
   }

   if (!($ALogs->DeleteAttacks($id)) == false) {
      $rMsg = ['success', 'Attacks has been deleted'];
      echo json_encode($rMsg);
      die();
   } else {
      $rMsg = ['error', 'Error adding in database'];
      echo json_encode($rMsg);
      die();
   }
}

/* Stop All Attacks */
if (isset($GET['StopAll'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }
   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);
   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }
// Execute
   $Attack->StopAllAdmin();
}


/* Clear Attacks Logs */
if (isset($GET['ClearOldAttacks'])) {
   //Admin rank check
   if ($Admin->AdminAllow() != true) {
      $rMsg = ['error', 'You don\'t have permission!'];
      echo json_encode($rMsg);
      die();
   }
   // Check csrf
   $_csrf = @$Secure->SecureTxt($POST['_csrf']);

   if ($_csrf != $csrftoken) {
      $rMsg = ['error', 'Token is expired!'];
      echo json_encode($rMsg);
      die();
   }

// Execute
   if (!($Admin->ClearOldAttacks()) == false) {
      $rMsg = ['success', 'Successfully Executed!'];
      echo json_encode($rMsg);
      die();
   } else {
      $rMsg = ['error', 'Something error'];
      echo json_encode($rMsg);
      die();
   }
}

?>