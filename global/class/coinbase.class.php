<?php
   
   class SellixGateway
   {
      
      private $api_key;
      
      public function __construct($api_key)
      {
         $this->api_key = $api_key;
      }
      
      public function createInvoice($value, $custom_invoice_id)
      {
         // Build the request
         $req = [
               "product_id" => $custom_invoice_id,
               "currency" => "USD",
               "amount" => $value,
               "email" => "vstresserapp@proton.me"
         ];
         
         // Make the API call
         return $this->api_call('invoices/create', $req);
      }
      
      private function api_call($endpoint, $req)
      {
         // Build the API URL
         $url = 'https://api.sellix.io/v1/' . $endpoint;
         
         // Build the cURL request
         $ch = curl_init($url);
         curl_setopt($ch, CURLOPT_POST, 1);
         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($req));
         curl_setopt($ch, CURLOPT_HTTPHEADER, [
               'Authorization: Bearer ' . $this->api_key,
               'Content-Type: application/json'
         ]);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         
         // Execute the request
         $res = curl_exec($ch);
         curl_close($ch);
         
         // Return the response
         return json_decode($res, true);
      }
      
   }

?>
