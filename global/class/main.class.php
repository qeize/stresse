<?php

if (!defined('allow')) {
   header("HTTP/1.0 404 Not Found");
}

if (!defined('k90plearptJQXxFZR2l7LRp8V')) {
   die('includes not found');
}

class Main
{

   public function Data($ID = 1)
   {
      global $DataBase;

      $DataBase->Query("SELECT * FROM `settings` WHERE `id` = :ID");
      $DataBase->Bind(':ID', $ID);
      $DataBase->Execute();

      return $DataBase->Single();

   }

   public function UpdateAttacks($totalboots, $ID = 1)
   {
      global $DataBase;

      $DataBase->Query("UPDATE `settings` SET `stats` = :totalboots WHERE `id` = :ID");
      $DataBase->Bind(':totalboots', $totalboots);
      $DataBase->Execute();

   }

   public function MaintainceUpdate($Type, $Value, $ID = 1)
   {
      global $DataBase;

      if ($Type == 'maintenance') {
         $DataBase->Query("UPDATE `settings` SET `maintenance` = :Value WHERE `id` = :ID");
         $DataBase->Bind(':Value', $Value);
         $DataBase->Bind(':ID', $ID);

         $DataBase->Execute();
      } elseif ($Type == 'layer4') {
         $DataBase->Query("UPDATE `settings` SET `layer4` = :Value WHERE `id` = :ID");
         $DataBase->Bind(':Value', $Value);
         $DataBase->Bind(':ID', $ID);

         $DataBase->Execute();
      } elseif ($Type == 'layer7') {
         $DataBase->Query("UPDATE `settings` SET `layer7` = :Value WHERE `id` = :ID");
         $DataBase->Bind(':Value', $Value);
         $DataBase->Bind(':ID', $ID);

         $DataBase->Execute();
      } elseif ($Type == 'api') {
         $DataBase->Query("UPDATE `settings` SET `api` = :Value WHERE `id` = :ID");
         $DataBase->Bind(':Value', $Value);
         $DataBase->Bind(':ID', $ID);

         $DataBase->Execute();
      }

      $rMsg = ['success', 'Maintenance has been updated.'];
      echo json_encode($rMsg);
      die();

   }

   public function Activity($uID)
   {
      global $DataBase;

      $DataBase->Query("UPDATE `users` SET `activity`= :timestamp  WHERE `id`= :ID");
      $DataBase->Bind(':ID', $uID);
      $DataBase->Bind(':timestamp', time() + 300);

      $DataBase->Execute();
   }
   

   function check_isp_by_ip($ip)
   {
      $data = json_decode(file_get_contents("http://ip-api.com/json/$ip"));
      $isp = explode(" ", $data->isp)[0];
      return $isp;
   }

//   public function checkForNewLogin($uID)
//   {
//      global $Logs;
//      // retrieve the action_logs from the database
//      $logs = $Logs->LogsActionAll()['Response'];
//      // iterate through the logs and check for a new login for the same user
//      foreach ($logs as $logs) {
//         if ($logs['uID'] == $uID && $logs['action'] == 'Logged' && $logs['timestamp'] >= time()) {
//            return true;
//         }
//      }
//      return false;
//   }

}

?>