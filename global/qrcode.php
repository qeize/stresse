<?php
define('allow', TRUE);
define('api', TRUE);

include_once('../inc.php');
require_once('phpqrcode/qrlib.php');

if(!isset($_SERVER['HTTP_REFERER'])) {
   header("HTTP/1.0 403 Forbidden");
   exit();
}


function generateQR($wallet, $amount, $level = 'L', $size = 6, $margin = 1)
{
   $pngData = QRcode::png($wallet . "?amount=" . $amount, false, $level, $size, $margin);
   return base64_encode($pngData);
}

$amount = $Order->LastUserOrder($User->UserData()['id'], 1)['amount'];
$wallet = $Order->LastUserOrder($User->UserData()['id'], 1)['address'];

$qrImage = generateQR($wallet, $amount);

header('Content-type: image/png');
?>