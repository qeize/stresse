<?php

if (!defined('allow')) {
   header("HTTP/1.0 404 Not Found");
}

if (!defined('k90plearptJQXxFZR2l7LRp8V')) {
   die('includes not found');
}

class Plan
{

   public function PlanDataAll()
   {
      global $DataBase;

      $DataBase->Query("SELECT * FROM `plans` ORDER BY `price` ASC");
      $DataBase->Execute();

      $Return = array(
       'Count' => $DataBase->RowCount(),
       'Response' => $DataBase->ResultSet()
      );

      return $Return;
   }

   public function PlanDataGlobal()
   {
      global $DataBase;

      $DataBase->Query("SELECT * FROM `plans` WHERE `id` <> 1 ORDER BY `price` ASC");
      $DataBase->Execute();

      $Return = array(
       'Count' => $DataBase->RowCount(),
       'Response' => $DataBase->ResultSet()
      );

      return $Return;
   }

   public function PlanData($pID)
   {
      global $DataBase;

      $DataBase->Query("SELECT * FROM `plans` WHERE `ID` = :pID");
      $DataBase->Bind(':pID', $pID);
      $DataBase->Execute();

      $Return = array(
       'Count' => $DataBase->RowCount(),
       'Response' => $DataBase->ResultSet()
      );

      return $Return;
   }

   public function PlanCheck($pID, $name)
   {
      global $DataBase;

      $DataBase->Query("SELECT * FROM `plans` WHERE `ID` = :pID AND `name` = :name");
      $DataBase->Bind(':pID', $pID);
      $DataBase->Bind(':name', $name);
      $DataBase->Execute();

      $Return = array(
       'Count' => $DataBase->RowCount(),
       'Response' => $DataBase->ResultSet()
      );

      return $Return;
   }

   public function AddPlan($name, $unit, $length, $mbt, $price, $premium, $concurrents, $private, $api)
   {
      global $DataBase;

      // Insert in Base
      $DataBase->Query("INSERT INTO `plans` (`ID`, `name`, `unit`, `length`, `mbt`, `price`, `premium`, `concurrents`, `private`, `api`) VALUES (NULL, :name, :unit, :length, :mbt, :price, :premium, :concurrents, :private, :api);");
      $DataBase->Bind(':name', $name);
      $DataBase->Bind(':mbt', $mbt);
      $DataBase->Bind(':price', $price);
      $DataBase->Bind(':unit', $unit);
      $DataBase->Bind(':length', $length);
      $DataBase->Bind(':premium', $premium);
      $DataBase->Bind(':concurrents', $concurrents);
      $DataBase->Bind(':private', $private);
      $DataBase->Bind(':api', $api);

      return $DataBase->Execute();
   }

   public function ChangePlan($name, $mbt, $price, $premium, $unit, $length, $concurrents, $private, $api, $ID)
   {
      global $DataBase;

      $DataBase->Query("UPDATE `plans` SET `name`=:name, `mbt`=:mbt, `price`=:price, `unit`=:unit, `length`=:length, `premium`=:premium, `concurrents`=:concurrents, `private`=:private, `api`=:api WHERE `ID`=:uID");
      $DataBase->Bind(':name', $name);
      $DataBase->Bind(':mbt', $mbt);
      $DataBase->Bind(':price', $price);
      $DataBase->Bind(':premium', $premium);
      $DataBase->Bind(':unit', $unit);
      $DataBase->Bind(':length', $length);
      $DataBase->Bind(':concurrents', $concurrents);
      $DataBase->Bind(':private', $private);
      $DataBase->Bind(':api', $api);
      $DataBase->Bind(':uID', $ID);

      return $DataBase->Execute();

   }

   public function DeletePlan($ID)
   {
      global $DataBase;

      $DataBase->Query("DELETE FROM `plans` WHERE `ID`=:uID");
      $DataBase->Bind(':uID', $ID);

      return $DataBase->Execute();
   }

   public function BuyCustomPlan($time, $concurrents, $month)
   {
      global $DataBase;
      global $User;
      global $Logs;

      // Calculate the price based on the number of concurrents and expire time
      $price = $this->calculatePrice($time, $concurrents, $month);

      if ($User->UserData()['money'] < $price) {
         $rMsg = ['error', 'You dont have enough money. Please add balance.', 'true'];
         echo json_encode($rMsg);
         die();
      }

      $UserID = $User->UserData()['id'];

      $NewBalance = $User->UserData()['money'] - $price;

      // Update the user's balance in the database
      $DataBase->Query("UPDATE `users` SET `money`=:MoneyUpdate WHERE `ID`=:uID");
      $DataBase->Bind(':MoneyUpdate', $NewBalance);
      $DataBase->Bind(':uID', $UserID);
      $MoneyUpdate = $DataBase->Execute();

      if ($MoneyUpdate == false) {
         $rMsg = ['error', 'Fail on Money Update!'];
         echo json_encode($rMsg);
         die();
      }

      if ($time < 3600) {
         $rMsg = ['error', 'Min. time is 1 hour'];
         echo json_encode($rMsg);
         die();
      }

      $addons = $time . "|" . $concurrents . "|" . 2 . "|" . 1;
      // Convert month in unix timestamp
      $seconds_per_month = 2592000;

      $expire = time() + ($month * $seconds_per_month);

      $DataBase->Query("UPDATE `users` SET `plan`=:plan, `addons`=:addons, `expire`=:expire WHERE `ID`=:uID");
      $DataBase->Bind(':plan', '1');
      $DataBase->Bind(':addons', $addons);
      $DataBase->Bind(':expire', $expire);
      $DataBase->Bind(':uID', $UserID);

      $PlanUpdate = $DataBase->Execute();

      if ($PlanUpdate == false) {
         $rMsg = ['error', 'Fail on Plan Update!'];
         echo json_encode($rMsg);
         die();
      }

      $rMsg = ['success', 'You purchased a custom plan.'];
      echo json_encode($rMsg);
      die();

   }

   function calculatePrice($time, $slots, $month)
   {

      if ($time <= 0 || $slots <= 0 || $month <= 0) {
         $rMsg = ['error', 'Input values must be positive.'];
         echo json_encode($rMsg);
         die();
      }

      // fixed price for time
      $price = 50 * ($time / 3600);

      // fixed price for slots
      $price += 50 * ($slots - 1);

      // add additional price for each additional month
      if ($month > 1) {
         $price += $price * ($month - 1);
      }

      // apply discount if more than 50 slots are selected
      if ($slots >= 50) {
         $price *= 0.9; // 10% discount
      }

      // apply discount if more than 5 slots are selected
      if ($slots >= 5) {
         $price *= 0.9; // 10% discount
      }

      // apply discount if more than 32,000 seconds of time are selected
      if ($time >= 32000) {
         $price *= 0.9; // 10% discount
      }

      // apply discount if more than 3 months are selected
      if ($month >= 3) {
         $price *= 0.9; // 10% discount
      }

      // round the price to 2 decimal places
      return round($price, 2);
   }

   public function BuyPlan($planID)
   {
      global $DataBase;
      global $User;
      global $Plan;
      global $Logs;

      $Price = $Plan->PlanDataID($planID)['price'];
      $unit = $Plan->PlanDataID($planID)['unit'];
      $length = $Plan->PlanDataID($planID)['length'];

      if ($User->UserData()['money'] < $Price) {
         $rMsg = ['error', 'You dont have enough money. Please add balance.', 'true'];
         echo json_encode($rMsg);
         die();
      }

      $UserID = $User->UserData()['id'];
      $NewBalance = $User->UserData()['money'] - $Price;

      $Expire = $this->setExpire($unit, $length);

      $DataBase->Query("UPDATE `users` SET `money`=:MoneyUpdate WHERE `ID`=:uID");
      $DataBase->Bind(':MoneyUpdate', $NewBalance);
      $DataBase->Bind(':uID', $UserID);

      $MoneyUpdate = $DataBase->Execute();

      if ($MoneyUpdate == false) {
         $rMsg = ['error', 'Fail on Money Update!'];
         echo json_encode($rMsg);
         die();
      }

      $DataBase->Query("UPDATE `users` SET `plan`=:plan WHERE `ID`=:uID");
      $DataBase->Bind(':plan', $planID);
      $DataBase->Bind(':uID', $UserID);

      $PlanUpdate = $DataBase->Execute();

      if ($PlanUpdate == false) {
         $rMsg = ['error', 'Fail on Plan Update!'];
         echo json_encode($rMsg);
         die();
      }

      $DataBase->Query("UPDATE `users` SET `expire`=:expire WHERE `ID`=:uID");
      $DataBase->Bind(':expire', $Expire);
      $DataBase->Bind(':uID', $UserID);

      $ExpireUpdate = $DataBase->Execute();

      if ($ExpireUpdate == false) {
         $rMsg = ['error', 'Fail on Expire Update!'];
         echo json_encode($rMsg);
         die();
      }

      $rMsg = ['success', 'You purchased a plan.'];
      echo json_encode($rMsg);
      die();
   }

   public function PlanDataID($pID)
   {
      global $DataBase;

      $DataBase->Query("SELECT * FROM `plans` WHERE `ID` = :pID");
      $DataBase->Bind(':pID', $pID);
      $DataBase->Execute();

      return $DataBase->Single();
   }

   private function setExpire($unit, $length)
   {
      switch ($unit) {
         case 'days':
            $expire = time() + ($length * 86400);
            break;
         case 'weeks':
            $expire = time() + ($length * 604800);
            break;
         case 'months':
            $expire = time() + ($length * 2629743);
            break;
         default:
            $expire = time();
      }
      return $expire;
   }

   public function resetCustomPlan()
   {
      global $DataBase;
      global $User;

      $UserData = $User->UserData();
      $UserID = $UserData['id'];
      $addons = $UserData['addons'];

      if ($addons !== '0|0|0|0' && $UserData['expire'] < time()) {
         $DataBase->Query("UPDATE `users` SET `addons` = '0|0|0|0', `expire` = '0' WHERE `id` = :uID");
         $DataBase->Bind(':uID', $UserID);
         return $DataBase->Execute();
      }
   }


}

?>