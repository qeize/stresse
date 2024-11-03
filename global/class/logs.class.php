<?php

   if (!defined ('allow')) {
      header ("HTTP/1.0 404 Not Found");
   }

   if (!defined ('k90plearptJQXxFZR2l7LRp8V')) {
      die('includes not found');
   }

   class Logs
   {

      public function TotalUsersMonth ()
      {
         global $DataBase;

         $DataBase -> Query ("SELECT * FROM `users` WHERE  FROM_UNIXTIME(`timestamp`) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND FROM_UNIXTIME(`timestamp`) <= NOW()");
         $DataBase -> Execute ();

         $Return = array (
               'Count' => $DataBase -> RowCount () ,
               'Response' => $DataBase -> ResultSet ()
         );

         return $Return;
      }

      public function LogsDataAll ()
      {
         global $DataBase;

         $DataBase -> Query ("SELECT * FROM `action_logs`");
         $DataBase -> Execute ();

         $Return = array (
               'Count' => $DataBase -> RowCount () ,
               'Response' => $DataBase -> ResultSet ()
         );

         return $Return;
      }

      public function LogsActionAll ()
      {
         global $DataBase;

         $DataBase -> Query ("SELECT * FROM `action_logs`");
         $DataBase -> Execute ();

         $Return = array (
               'Count' => $DataBase -> RowCount () ,
               'Response' => $DataBase -> ResultSet ()
         );

         return $Return;
      }

      public function LogsDataID ($id , $num)
      {
         global $DataBase;

         $DataBase -> Query ("SELECT * FROM `action_logs` WHERE `uID` = :ID");
         $DataBase -> Bind (':ID' , $id);
         $DataBase -> Execute ();

         if ($num == 0) {
            $Return = array (
                  'Count' => $DataBase -> RowCount () ,
                  'Response' => $DataBase -> ResultSet ()
            );

            return $Return;
         } else {
            return $DataBase -> Single ();
         }
      }

      public function CreateLog ($uID , $action)
      {
         global $DataBase;

         $DataBase -> Query ("INSERT INTO `action_logs` (`id`, `uID`, `action`, `timestamp`) VALUES (NULL, :uID, :action, :timestamp);");
         $DataBase -> Bind (':uID' , $uID);
         $DataBase -> Bind (':action' , $action);
         $DataBase -> Bind (':timestamp' , time ());

         return $DataBase -> Execute ();

      }


      public function AuthLogFalse ($token)
      {
         global $DataBase;
         $DataBase -> Query ("UPDATE `action_logs` SET `action` = :action WHERE `token` =:token");
         $DataBase -> Bind (':token' , $token);
         $DataBase -> Bind (':action' , 'Logout');

         return $DataBase -> Execute ();
      }

      public function AdminAlerts ()
      {
         global $DataBase;

         $DataBase -> Query ("SELECT * FROM `action_logs` WHERE `uID` = '0'  ORDER BY `ID` DESC");
         $DataBase -> Execute ();

         $Return = array (
               'Count' => $DataBase -> RowCount () ,
               'Response' => $DataBase -> ResultSet ()
         );

         return $Return;
      }

   }

?>