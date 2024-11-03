<?php
define('allow', TRUE);
include('inc.php');

function generateRandomString($length) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Generate a random number
// from 1000-9999
$captcha = generateRandomString(6);

// The capcha will be stored
// for the session
$_SESSION["captcha"] = $captcha;

// Generate a 50x24 standard captcha image
$im = imagecreatetruecolor(140, 35);

// My color
$bg = imagecolorallocate($im, 42, 42, 62);

// White color
$fg = imagecolorallocate($im, 255, 255, 255);

// Give the image a my background
imagefill($im, 0, 0, $bg);

// Print the captcha text in the image
// with random position & size
imagestring($im, 1000, rand(50,50),
			10, $captcha, $fg);

// VERY IMPORTANT: Prevent any Browser Cache!!

// The PHP-file will be rendered as image
header('Content-type: image/png');

// Finally output the captcha as
// PNG image the browser
imagepng($im);

// Free memory
imagedestroy($im);
?>
