<?php

if (!defined('allow')) {
   header("HTTP/1.0 404 Not Found");
}

if (!defined('k90plearptJQXxFZR2l7LRp8V')) {
   die('includes not found');
}

class BlackList
{

   public function BlackListDataAll()
   {
      global $DataBase;

      $DataBase->Query("SELECT * FROM `blacklist` ORDER BY `id` ASC");
      $DataBase->Execute();

      $Return = array(
       'Count' => $DataBase->RowCount(),
       'Response' => $DataBase->ResultSet()
      );

      return $Return;
   }

   public function BlackListData($pID)
   {
      global $DataBase;

      $DataBase->Query("SELECT * FROM `blacklist` WHERE `id` = :pID");
      $DataBase->Bind(':pID', $pID);
      $DataBase->Execute();

      $Return = array(
       'Count' => $DataBase->RowCount(),
       'Response' => $DataBase->ResultSet()
      );

      return $Return;
   }

   public function BlackListDataID($pID)
   {
      global $DataBase;

      $DataBase->Query("SELECT * FROM `blacklist` WHERE `id` = :pID");
      $DataBase->Bind(':pID', $pID);
      $DataBase->Execute();

      return $DataBase->Single();
   }

   public function AddBlackList($word)
   {
      global $DataBase;

      // Insert in Base
      $DataBase->Query("INSERT INTO `blacklist` (`id`, `word`) VALUES (NULL, :word);");
      $DataBase->Bind(':word', $word);

      return $DataBase->Execute();
   }


   public function DeleteBlackList($id)
   {
      global $DataBase;

      $DataBase->Query("DELETE FROM `blacklist` WHERE `id`=:uID");
      $DataBase->Bind(':uID', $id);

      return $DataBase->Execute();
   }

}

?>
