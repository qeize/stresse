<?php
   
   if (!defined ('allow')) {
      header ("HTTP/1.0 404 Not Found");
   }
   
   if (!defined ('k90plearptJQXxFZR2l7LRp8V')) {
      die('includes not found');
   }
   
   class User
   {

      public function UserDataAll ()
      {
         global $DataBase;

         $DataBase -> Query ("SELECT * FROM `users`");
         $DataBase -> Execute ();

         $Return = array (
               'Count' => $DataBase -> RowCount () ,
               'Response' => $DataBase -> ResultSet ()
         );

         return $Return;
      }
      
      public function UserDataPaid ()
      {
         global $DataBase;
         
         $DataBase -> Query ("SELECT * FROM `users` WHERE `plan` != '0' AND `plan` != '1' AND `expire` > :time");
         $DataBase -> Bind (':time' , time ());
         $DataBase -> Execute ();
         
         $Return = array (
               'Count' => $DataBase -> RowCount () ,
               'Response' => $DataBase -> ResultSet ()
         );
         
         return $Return;
      }
      
      public function UserDataBanned ()
      {
         global $DataBase;
         
         $DataBase -> Query ("SELECT * FROM `users` WHERE `status` != '0'");
         $DataBase -> Bind (':time' , time ());
         $DataBase -> Execute ();
         
         $Return = array (
               'Count' => $DataBase -> RowCount () ,
               'Response' => $DataBase -> ResultSet ()
         );
         
         return $Return;
      }
      
      public function Online ()
      {
         global $DataBase;
         
         $DataBase -> Query ("SELECT * FROM `users` WHERE `activity` > :time");
         $DataBase -> Bind (':time' , time ());
         $DataBase -> Execute ();
         
         $Return = array (
               'Count' => $DataBase -> RowCount () ,
               'Response' => $DataBase -> ResultSet ()
         );
         
         return $Return;
      }
      
      public function UserDataID ($id , $num)
      {
         global $DataBase;
         
         $DataBase -> Query ("SELECT * FROM `users` WHERE `id` = :ID");
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
      
      public function ChangePassword ($Password , $User)
      {
         global $DataBase;
         global $Logs;
         
         $DataBase -> Query ("UPDATE `users` SET `Password`=:Pass WHERE `id`=:uID");
         $DataBase -> Bind (':Pass' , $Password);
         $DataBase -> Bind (':uID' , $User);
         
         $DataBase -> Execute ();
      }
      
      public function DeleteUser ($User)
      {
         global $DataBase;
         
         $DataBase -> Query ("DELETE FROM `users` WHERE `id`=:uID");
         $DataBase -> Bind (':uID' , $User);
         
         $DataBase -> Execute ();
      }
      
      public function LogIn ($Username , $Password)
      {
         global $DataBase;
         global $Alert;
         global $Logs;
         global $User;
         global $Main;
         
         $IP = $User -> UserIP ();
         
         $DataBase -> Query ("SELECT * FROM `users` WHERE `username` = :Username");
         $DataBase -> Bind (':Username' , $Username);
         $DataBase -> Execute ();
         
         $UserData = $DataBase -> Single ();
         $UserCount = $DataBase -> RowCount ();
         
         @$Check = $Password == $UserData['password'];
         
         if ($UserCount == true && $Check) {
            if ($UserData['status'] != '0') {
               $rMsg = ['error' , 'Account Suspended.'];
               echo json_encode ($rMsg);
               die();
            } else {
               //Session
               $_SESSION['UserLogin']['id'] = $UserData['id'];
               $cookie_expiration_time = time () + 3600; // for 1 hours
               
               $token = $_SESSION['token'] = bin2hex (random_bytes (32));
               setcookie ('token' , $token , $cookie_expiration_time);
               
               @$_SESSION['attemp']['num'] = 0;
               // Log
               $rMsg = ['success' , 'Success user has been logged.'];
               echo json_encode ($rMsg);
               die();
            }
         } else {
            @$_SESSION['attemp']['num'] = @$_SESSION['attemp']['num'] + 1;
            $rMsg = ['error' , 'Password or login is incorrect.'];
            echo json_encode ($rMsg);
            die();
         }
      }
      
      public function UserIP ()
      {
         $ipaddress = '';
         if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
         else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
         else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
         else if (isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
         else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
         else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
         else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
         else
            $ipaddress = 'UNKNOWN';
         return $ipaddress;
      }
      
      public function UserData ()
      {
         global $DataBase;
         
         if (isset($_SESSION['UserLogin'])) {
            $DataBase -> Query ("SELECT * FROM `users` WHERE `id` = :id");
            $DataBase -> Bind (':id' , $_SESSION['UserLogin']['id']);
            $DataBase -> Execute ();
            
            return $DataBase -> Single ();
         } else {
            return false;
         }
      }
      
      public function Register ($Username , $Password)
      {
         global $DataBase;
         global $Secure;
         global $Alert;
         global $Logs;
         
         $DataBase -> Query ("SELECT * FROM `users` WHERE `username` = :Username");
         $DataBase -> Bind (':Username' , $Username);
         $DataBase -> Execute ();
         
         $UsernameE = $DataBase -> RowCount ();
         
         // If Username exist
         if ($UsernameE == true) {
            $rMsg = ['error' , 'This username is already taken.'];
            echo json_encode ($rMsg);
            die();
         }
         
         // Insert in Base
         $DataBase -> Query ("INSERT INTO `users` (`id`, `username`, `password`, `rank`, `plan`, `expire`, `money`, `addons`, `status`,  `timestamp`,  `reason`) VALUES (NULL, :Username, :Password, '0', '0', '0', '0', '0|0|0|0', '0', :timestamp, '0');");
         $DataBase -> Bind (':Username' , $Username);
         $DataBase -> Bind (':Password' , $Password);
         $DataBase -> Bind (':timestamp' , time ());
         
         $DataBase -> Execute ();
         

         
         // Send Message
         $rMsg = ['success' , 'User has been registred.'];
         $_SESSION['token'] = bin2hex (random_bytes (32));
         unset($_SESSION['captcha']);
         echo json_encode ($rMsg);
         die();
      }
      
      public function IsLoged ()
      {
         if (isset($_SESSION['UserLogin']) && isset($_COOKIE['token'])) {
            return true;
         } else {
            return false;
         }
      }
      
   }

?>