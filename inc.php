<?php
   if (!defined ('allow')) {
      header ("HTTP/1.0 404 Not Found");
   }
   
   define ('k90plearptJQXxFZR2l7LRp8V' , TRUE);
   
   $errors = true;
   
   if ($errors == true) {
      error_reporting (E_ALL);
      error_reporting (1);
      ini_set ('display_errors' , 1);
      ini_set ('display_startup_errors' , 1);
   } else {
      ini_set ('display_errors' , 0);
      ini_set ('display_startup_errors' , 0);
   }
   
   ini_set ('error_log' , 'error_logs');
   error_reporting (E_ALL | E_STRICT | E_NOTICE);

   if (session_status () == PHP_SESSION_NONE) {
      session_start ();
   }


   if (empty($_SESSION['token'])) {
      $_SESSION['token'] = bin2hex (random_bytes (32));
   }
   
   
   $csrftoken = $_SESSION['token'];
   
   ob_start ();
   
   date_default_timezone_set ('UTC');
   
   
   $POST = filter_input_array (INPUT_POST , FILTER_SANITIZE_ADD_SLASHES);
   $GET = filter_input_array (INPUT_GET , FILTER_SANITIZE_ADD_SLASHES);
   
   /**
    * @see Indicate assets path
    */
   
   $assets = "/";
   $domain = "stresse.re";
   $preheder = "Stresse RE";
   /**
    * @see root path
    */
   
   $path = $_SERVER['DOCUMENT_ROOT'];
   
   $path = './';
   
   switch (true) {
      case defined ('admin'):
      case defined ('api'):
      case defined ('error'):
         $path = '../';
         break;
      case defined ('json'):
         $path = '../../';
         break;
   }
   
   /**
    * @see class path
    */
   
   include_once ($path . 'global/config/initdatabase.php');// MySQL Config File
   include_once ($path . 'global/class/user.class.php');// User Managment Class
   include_once ($path . 'global/class/secure.class.php');// Secure Managment Class
   include_once ($path . 'global/class/alert.class.php');// Alert Managment Class
   include_once ($path . 'global/class/plan.class.php');// Plan FOR TEST Managment Class
   include_once ($path . 'global/class/news.class.php');// News Managment Class
   include_once ($path . 'global/class/logs.class.php');// Action logs Managment Class
   include_once ($path . 'global/class/alogs.class.php');// Info logs Managment Class
   include_once ($path . 'global/class/order.class.php');// Info logs Managment Class
   include_once ($path . 'global/class/api.class.php');// API Managment Class
   include_once ($path . 'global/class/main.class.php');// Main Managment
   include_once ($path . 'global/class/attack.class.php');// Attack Managment
   include_once ($path . 'global/class/admin.class.php');// Admin Managment
   include_once ($path . 'global/class/methods.class.php');// Methods Managment Class
   include_once ($path . 'global/class/blacklist.class.php');// BlackList Managment Class
   include_once ($path . 'global/class/db.class.php');// MySQL Managment Class
//   include_once ($path . 'global/class/coinbase.class.php');// Coinbase Managment Class
   include_once ($path . 'global/class/sellix.class.php');// Sellix Managment Class
   /**
    * # Install Composer
    * curl -sS https://getcomposer.org/installer | php
    * composer require guzzlehttp/guzzle:^7.0
    */
   
   require ('vendor/autoload.php');
   
   use GuzzleHttp\Client;
   use GuzzleHttp\Psr7\Request;

   $Client = new Client();
   
   /**
    * @see init class
    */
   
   $User = new User();
   $Admin = new Admin();
   $Secure = new Secure();
   $Alert = new Alert();
   $Plan = new Plan();
   $News = new News();
   $Logs = new Logs();
   $ALogs = new ALogs();
   $Order = new Order();
   $Api = new Api();
   $Methods = new Methods();
   $BlackList = new BlackList();
   $Main = new Main();
   $Attack = new Attack();
$DataBase = DataBase::getInstance();

//   $Coinbasee = new CoinbaseCommerceGateway('api_key');
   $Sellix = new SellixAutopayment('key');
   
   /**
    * @see redirect to ban/page
    */
   
   
   if ($User -> IsLoged () == true) {
      if ($User -> UserData ()['status'] != false) {
         include_once ("global/public/banned.php");
         die();
      }
   }
   
?>