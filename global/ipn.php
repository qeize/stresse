<?php

define('allow', TRUE);
define('api', TRUE);

include_once('../inc.php');

set_time_limit(0);

// Set the shared secret provided sellix
$secret = 'hmac';

// Get the request body and X-CC-Webhook-Signature header
$input = file_get_contents('php://input');
$header_signature = $_SERVER['HTTP_X_SELLIX_SIGNATURE'];

//   file_put_contents ("test.json" , $input);

// Calculate the HMAC signature of the request body using the shared secret
$signature = hash_hmac('sha512', $input, $secret);

//   error_log ("$signature" . date ("d.m.Y H:i:s" , time ()) . " \n" , 3 , "error_log");
//   error_log ("Calculated Signature: " . $signature . " | Provided Signature: " . $header_signature . " | " . date ("d.m.Y H:i:s" , time ()) . " \n" , 3 , "error_log");

// Compare the calculated signature to the signature provided in the request
if (hash_equals($signature, $header_signature)) {

//      file_put_contents ("test.json" , $input);

// Parse the request data and extract the charge status
   $data = json_decode($input, true);

   $charge_status = $data['data']['status'];
   $invoice_id = $data['data']['uniqid'];
   $Money = $data['data']['total'];
   $userID = $data['data']['custom_fields']['user_id'];


//Search invoice with own ID

   $DataBase->Query("SELECT * FROM `invoice` WHERE `invoice_id` = :invoice_id");
   $DataBase->Bind(':invoice_id', $invoice_id);
   $DataBase->Execute();

   if ($DataBase->RowCount() != 1) {
      error_log("Invoice: $invoice_id of UserID: $userID with status: $charge_status doesnt exists " . date("d.m.Y H:i:s", time()) . " \n", 3, "error_log");
   }

   $Data = $DataBase->Single();


   if ($charge_status == 'PENDING') {

      // Update Payment
      $DataBase->Query("UPDATE `invoice` SET `invoice_status`=:status WHERE `invoice_id`=:invoice_id");
      $DataBase->Bind(':status', 'charge:pending');
      $DataBase->Bind(':invoice_id', $invoice_id);
      $DataBase->Execute();

   }

   if ($charge_status == 'VOIDED') {
      // Update Payment
      $DataBase->Query("UPDATE `invoice` SET `invoice_status`=:status WHERE `invoice_id`=:invoice_id");
      $DataBase->Bind(':status', 'charge:expired');
      $DataBase->Bind(':invoice_id', $invoice_id);
      $DataBase->Execute();
   }

   if ($charge_status == 'COMPLETED') {

      $MoneyNew = $Money + $User->UserDataID($userID, 1)['money'];

      // Update Payment
      $DataBase->Query("UPDATE `invoice` SET `invoice_status`=:status WHERE `invoice_id`=:invoice_id");
      $DataBase->Bind(':status', 'charge:confirmed');
      $DataBase->Bind(':invoice_id', $invoice_id);
      $DataBase->Execute();

      // Update Users money
      $DataBase->Query("UPDATE `users` SET `money`=:money WHERE `id`=:uID");
      $DataBase->Bind(':money', $MoneyNew);
      $DataBase->Bind(':uID', $userID);
      $DataBase->Execute();

   }
} else {
   header("HTTP/1.0 404 Not Found");
   exit();
}

?>
