<?
//// set the time zone to GMT+02:00
//date_default_timezone_set('Europe/Kiev');
//
//// open a log file
//$log_file = fopen("post_data_log.txt", "a") or die("Unable to open file!");
//
//// encode the POST and GET data as JSON strings
//$post_data = json_encode($_POST);
//$get_data = json_encode($_GET);
//
//// get the HTTP referer and client IP
//$referer = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : "unknown";
//$ip = $_SERVER['REMOTE_ADDR'];
//
//// write the data to the log file
//$log = date("Y-m-d H:i:s") . " POST: " . $post_data . " GET: " . $get_data . " Referer: " . $referer . " IP: " . $ip . "\n";
//fwrite($log_file, $log);
//
//// close the log file
//fclose($log_file);

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    die('<video src="videoplayback.mp4" controls autoplay playsinline></video>');
}

define('allow', TRUE);

require_once('inc.php');

/* GenerateAPI */
if (isset($GET['CreateApi'])) {

    // Check csrf
    $_csrf = @$Secure->SecureTxt($POST['_csrf']);
    if ($_csrf != $csrftoken) {
        $rMsg = ['error', 'Token is expired!'];
        echo json_encode($rMsg);
        die();
    }

    // Check Time
    $Time = (int)@$POST['duration'];
    // Is valid Time
    if (empty($Time)) {
        $rMsg = ['error', 'Duration is empty.'];
        echo json_encode($rMsg);
        die();
    }

    // Check Slots
    $Slots = (int)@$POST['slots'];
    // Is valid Slots
    if (empty($Slots)) {
        $rMsg = ['error', 'Slots are empty.'];
        echo json_encode($rMsg);
        die();
    }

    // Chekc Users plan
    if ($User->UserData()['plan'] == 0) {
        if ($User->UserData()['expire'] < time()) {
            $rMsg = ['error', 'You must get a plan.'];
            echo json_encode($rMsg);
            die();
        }
    }

    // Check IPAdress
    $ipAddress = @$_POST['ip-address'];

    // Validate IPv4 or IPv6 address using filter_var function
    if (!empty($ipAddress) && !filter_var($ipAddress, FILTER_VALIDATE_IP)) {
        $rMsg = ['error', 'Invalid ip address.'];
        echo json_encode($rMsg);
        die();
    }


    // Execute
    $Api->NewApiAccess($Time, $Slots, $ipAddress);
}

/* Delete Account */
if (isset($GET['DeleteUser'])) {
    // Check csrf
    $_csrf = @$Secure->SecureTxt($POST['_csrf']);
    if ($_csrf != $csrftoken) {
        $rMsg = ['error', 'Token is expired!'];
        echo json_encode($rMsg);
        die();
    }

    // Check ID
    $ID = (int)@$POST['id'];

    // Is valid ID
    if (empty($ID)) {
        $rMsg = ['error', 'Invalid ID.'];
        echo json_encode($rMsg);
        die();
    }

    if (!$User->UserDataID($ID, 1)['id'] == $User->UserData()['id']) {
        $rMsg = ['error', 'Invalid ID.'];
        echo json_encode($rMsg);
        die();
    }

    // Execute
    $User->DeleteUser($ID);
}

/* Delete API */
if (isset($GET['RemoveApi'])) {
// Check csrf
    $_csrf = @$Secure->SecureTxt($POST['_csrf']);
    if ($_csrf != $csrftoken) {
        $rMsg = ['error', 'Token is expired!'];
        echo json_encode($rMsg);
        die();
    }

    // Chekc User plan
    if ($User->UserData()['plan'] == 0) {
        if ($User->UserData()['Expire'] < time()) {
            $rMsg = ['error', 'You must get a plan.'];
            echo json_encode($rMsg);
            die();
        }
    }

    // Check ID
    $api_key = @$POST['id'];

    // Is valid ID
    if (empty($api_key)) {
        $rMsg = ['error', 'Invalid ID.'];
        echo json_encode($rMsg);
        die();
    }

    // Execute
    $Api->RemoveApi($api_key);
}

/* Register */
if (isset($GET['Register'])) {
    // Check csrf
//    $_csrf = @$Secure->SecureTxt($POST['_csrf']);
//    if ($_csrf != $csrftoken) {
//        $rMsg = ['error', 'Token is expired!'];
//        echo json_encode($rMsg);
//        die();
//    }

    $Captcha = @$Secure->SecureTxt($POST['CaptchaCode']);
    if ($_SESSION["captcha"] !== $Captcha) {
        @$_SESSION['regattemp']['num'] = @$_SESSION['regattemp']['num'] + 1;

        $rMsg = ['error', 'Wrong Captcha.'];
        echo json_encode($rMsg);
        die();
    }

    $Username = @$Secure->SecureTxt($_POST['Username']);
    $Password1 = @$Secure->SecureTxt(@$_POST['Password1']);
    $Password2 = @$Secure->SecureTxt(@$_POST['Password2']);

    if (empty($Username) || empty($Password1) || empty($Password2)) {
        $rMsg = ['warning', 'Empty fields.'];
        echo json_encode($rMsg);
        die();
    }

    if ($Password1 != $Password2) {
        $rMsg = ['warning', 'Passwords must be same.'];
        echo json_encode($rMsg);
        die();
    }

    if (!ctype_alnum($Username)) {
        $rMsg = ['warning', 'Write correct username.'];
        echo json_encode($rMsg);
        die();
    }
    if (strlen($Username) > 35 || strlen($Username) < 4) {
        $rMsg = ['warning', 'Username must be 4-35 characters length.'];
        echo json_encode($rMsg);
        die();
    }

    if (strlen($Password1) > 20 || strlen($Password1) < 4) {
        $rMsg = ['warning', 'Password must be 5-20 characters length.'];
        echo json_encode($rMsg);
        die();
    }

    $Password = $Secure->encrypt($Password1);

    $User->Register($Username, $Password);
}

/* Login */
if (isset($GET['Login'])) {

    // Check csrf
//    $_csrf = @$Secure->SecureTxt($POST['_csrf']);
//    if ($_csrf != $csrftoken) {
//        $rMsg = ['error', 'Token is expired!'];
//        echo json_encode($rMsg);
//        die();
//    }

    if (@$_SESSION['attemp']['num'] >= 5) {
        if (isset($_SESSION['attemp']['block_until']) && $_SESSION['attemp']['block_until'] > time()) {
            $rMsg = ['error', 'Too many login attempts. Please wait ' . ($_SESSION['attemp']['block_until'] - time()) . ' seconds before trying again.'];
            echo json_encode($rMsg);
            die();
        } else {
            $_SESSION['attemp']['block_until'] = time() + 30;
        }
    }

    //Check login username
    $Username = @$Secure->SecureTxt($_POST['Username']);
    //Check password username
    $Password = @$Secure->SecureTxt($_POST['Password']);

    //Execute
    $User->LogIn($Username, $Secure->encrypt($Password));
}

/* Add Balance */
if (isset($GET['CreateInvoice'])) {

// Check
    $localprice = (int)@$Secure->SecureTxt($POST['amount']);
// Is valid Amount
    if (empty($localprice)) {
        $rMsg = ['error', 'Amount is empty.'];
        echo json_encode($rMsg);
        die();
    }

    if ($localprice < 1 || $localprice > 100000) {
        $rMsg = ['error', 'Fill valid amount.'];
        echo json_encode($rMsg);
        die();
    }


// Check
    $currency = @$Secure->SecureTxt($POST['gateway']);

// Is valid Cryptocoin
    if (empty($currency)) {
        $rMsg = ['error', 'Gateway is empty.'];
        echo json_encode($rMsg);
        die();
    }

    $pattern = '/^(BITCOIN|ETHEREUM|BINANCE_COIN|BITCOIN_CASH|LITECOIN|SKRILL|STRIPE|PERFECT_MONEY|CASH_APP|LEX_HOLDINGS_GROUP|CONCORDIUM|PAYDASH|MONERO|BITCOIN_LN|NANO|SOLANA|RIPPLE|POLYGON|PLZ:TRC20|PLZ:BEP20|USDC:MATIC|USDT:ERC20|USDT:MATIC|USDT:BEP20|USDT:TRC20|USDC:ERC20|USDC:BEP20|TRON)$/i';

    if (!preg_match($pattern, $currency)) {
        $rMsg = ['error', 'Inavlid Gateway.'];
        echo json_encode($rMsg);
        die();
    }

    $userID = $User->UserData()['username'];
    $created_at = time();

// Make Invoice and get info
    $OrderInfo = $Order->CreateOrder($localprice, $currency);

    if ($OrderInfo['data'] == null) {
        $rMsg = ['error', 'Failed to create invoice, contact support.'];
        echo json_encode($rMsg);
        die();
    }

    //Debug
//      file_put_contents ('wallet_data.json' , json_encode ($OrderInfo['data']));


    $wallet = $OrderInfo['data']['invoice']['crypto_address'];
    $amount = $OrderInfo['data']['invoice']['crypto_amount'];
    $invoice_id = $OrderInfo['data']['invoice']['uniqid'];


// Insert in base
    if (!($Order->NewOrder($invoice_id, $localprice, $amount, $currency, $created_at, $wallet)) == true) {
        $rMsg = ['error', 'Failed. Please contact support!'];
        echo json_encode($rMsg);
        die();
    }

// Send Success Message
    $rMsg = ['success', 'You will be redirected to invoice page.'];
    echo json_encode($rMsg);
    die();
}

/* Buy Plan */
if (isset($GET['Purchase'])) {
// Check csrf
    $_csrf = @$Secure->SecureTxt($POST['_csrf']);
    if ($_csrf != $csrftoken) {
        $rMsg = ['error', 'Token is expired!'];
        echo json_encode($rMsg);
        die();
    }

    // Check Plan
    $planID = (int)@$Secure->SecureTxt($POST['id']);
    if (empty($planID)) {
        $rMsg = ['error', 'Invalid Plan.'];
        echo json_encode($rMsg);
        die();
    }

    // Check if plan is already bought
    if ($Plan->PlanData($planID)['Count'] == false) {
        $rMsg = ['error', 'This plan doesnt exist.'];
        echo json_encode($rMsg);
        die();
    }

// Check if plan is already bought
    if ($planID == $User->UserData()['plan']) {
        $rMsg = ['error', 'You already have this plan.'];
        echo json_encode($rMsg);
        die();
    }

// Check if plan is already bought
    if ($Plan->PlanData($planID)['Count'] == false) {
        $rMsg = ['error', 'This plan doesnt exist.'];
        echo json_encode($rMsg);
        die();
    }

// Check if plan is lower than he have now
    if ($User->UserData()['plan'] != 0) {
        if ($Plan->PlanDataID($planID)['price'] < $Plan->PlanDataID($User->UserData()['plan'])['price']) {
            $rMsg = ['error', 'This plan is worse than your current one.'];
            echo json_encode($rMsg);
            die();
        }
    }

    $Plan->BuyPlan($planID);
}

/* Buy Plan */
if (isset($GET['BuyCustomPlan'])) {
// Check csrf
    $_csrf = @$Secure->SecureTxt($POST['_csrf']);
    if ($_csrf != $csrftoken) {
        $rMsg = ['error', 'Token is expired!'];
        echo json_encode($rMsg);
        die();
    }

    // Check
    $time = (int)@$Secure->SecureTxt($POST['time']);
    // Is valid
    if (empty($time)) {
        $rMsg = ['error', 'Time is empty.'];
        echo json_encode($rMsg);
        die();
    }

    if ($time > 86000) {
        $rMsg = ['error', 'Boot time cannot be more than 86000'];
        echo json_encode($rMsg);
        die();
    }

    if ($time < 3600) {
        $rMsg = ['error', 'Boot time cannot be lower than 3600'];
        echo json_encode($rMsg);
        die();
    }

    // Check
    $slots = (int)@$Secure->SecureTxt($POST['slots']);
    // Is valid
    if (empty($slots)) {
        $rMsg = ['error', 'Slots is empty.'];
        echo json_encode($rMsg);
        die();
    }

    if ($slots > 100) {
        $rMsg = ['error', 'Months cannot be more than 100'];
        echo json_encode($rMsg);
        die();
    }

    if ($slots < 1) {
        $rMsg = ['error', 'Months cannot be lower than 1'];
        echo json_encode($rMsg);
        die();
    }

    // Check
    $month = (int)@$Secure->SecureTxt($POST['expire']);
    // Is valid
    if (empty($month)) {
        $rMsg = ['error', 'Month is empty.'];
        echo json_encode($rMsg);
        die();
    }

    if ($month > 12) {
        $rMsg = ['error', 'Months cannot be more than 12'];
        echo json_encode($rMsg);
        die();
    }

    if ($month < 1) {
        $rMsg = ['error', 'Months cannot be lower than 1'];
        echo json_encode($rMsg);
        die();
    }

    $Plan->BuyCustomPlan($time, $slots, $month);
}

/* Layer 4 Attack */
if (isset($GET['StartLayer4'])) {

    $Addons = explode('|', $User->UserData()['addons']);

    // Check Users plan
    if ($User->UserData()['plan'] == 0) {
        if ($User->UserData()['expire'] < time()) {
            $rMsg = ['error', 'You must get a plan.'];
            echo json_encode($rMsg);
            die();
        }
    }

    // Check is valid method
    $method = (int)@$Secure->SecureTxt($POST['method']);
    if (empty($method)) {
        $rMsg = ['error', 'Method is empty.'];
        echo json_encode($rMsg);
        die();
    }

    // Check Target
    $target = @$Secure->SecureTxt($_POST['target']);
    // Is valid Target
    if (empty($target)) {
        $rMsg = ['error', 'Address is empty.'];
        echo json_encode($rMsg);
        die();
    }

    if (strlen($target) > 300 || strlen($target) < 1) {
        $rMsg = ['error', 'Target can be 1-300 characters length.'];
        echo json_encode($rMsg);
        die();
    }

    // Check Port
    $port = (int)@$Secure->SecureTxt($POST['port']);

    if (!is_numeric($port) || strlen($port) < 0 || strlen($port) > 65535) {
        $rMsg = ['error', 'Port can be 0-65535 length.'];
        echo json_encode($rMsg);
        die();
    }

    // Check Time
    $time = (int)@$Secure->SecureTxt($POST['time']);

    if (!isset($time) || empty(trim($time))) {
        $time = $Plan->PlanDataID($User->UserData()['plan'])['mbt'] + $Addons[0];
    } else if (!is_numeric($time) || (int)$time < 10) {
        echo json_encode(['error', 'Duration must be a number  10 seconds.']);
        die();
    }

// Check PPS
    $pps = (int)@$Secure->SecureTxt($POST['pps']);
    if (!is_numeric($pps) || $pps < 0 || $pps > 1000000) {
        echo json_encode(['error', 'PPS must be a number between 0 and 1,000,000.']);
        die();
    }

    $planData = $Plan->PlanDataID($User->UserData()['plan']) ?? [];
    $load = number_format(($planData['concurrents'] ?? 0) + $Addons[1] - $ALogs->UserAttacks($User->UserData()['id'])['Count'], 0);

    if ($load < 1) {
        echo json_encode(['error', 'You have exceeded your total slots in running.']);
        die();
    }

    // Execute
    $Attack->Layer4($target, $port, $time, $method, $pps);
}

/* Layer 7 Attack */
if (isset($GET['StartLayer7'])) {

    $_csrf = @$Secure->SecureTxt($POST['_csrf']);
    if ($_csrf != $csrftoken) {
        $rMsg = ['error', 'Token is expired!'];
        echo json_encode($rMsg);
        die();
    }

// Get addons
    $Addons = explode('|', $User->UserData()['addons']);

// Chekc Users plan
    if ($User->UserData()['plan'] == 0) {
        if ($User->UserData()['expire'] < time()) {
            $rMsg = ['error', 'You must get a plan.'];
            echo json_encode($rMsg);
            die();
        }
    }

    // Check Method
    $method = (int)@$Secure->SecureTxt($POST['method']);
    // Is valid Method
    if (empty($method)) {
        $rMsg = ['error', 'Method is empty.'];
        echo json_encode($rMsg);
        die();
    }

// Check Target
    $target = @$Secure->SecureTxt($POST['target']);

// Is valid target
    if (empty($target)) {
        $rMsg = ['error', 'Target is empty.'];
        echo json_encode($rMsg);
        die();
    }

//Set https
    if (!preg_match('/^https?:\/\//', $target)) {
        $target = 'https://' . $target;
    }

// Is valid url
    if (!filter_var($target, FILTER_VALIDATE_URL)) {
        $rMsg = ['error', 'Address is invalid.'];
        echo json_encode($rMsg);
        die();
    }

// Check target length
    if (strlen($target) > 500 || strlen($target) < 1) {
        $rMsg = ['error', 'Target can be 1-500 characters length.'];
        echo json_encode($rMsg);
        die();
    }

// Check time
    $time = (int)@$Secure->SecureTxt($POST['time']);

    $default_time = in_array($method, array(0)) ? 60 : 10;

    if (!isset($time) || empty(trim($time))) {
        $time = $Plan->PlanDataID($User->UserData()['plan'])['mbt'] + $Addons[0];
    }

    if (!is_numeric($time) || (int)$time < $default_time) {
        echo json_encode(['error', 'Duration must be a number ' . $default_time . ' seconds.']);
        die();
    }


    // Set default ratelimits
    $defaultRatelimits = [
        'default' => 100,
    ];

    // Set default method-specific ratelimits
    $methodRatelimits = [
        8 => 100,
        26 => 100,
    ];

    // Get ratelimit from post data
    $ratelimit = (float)$Secure->SecureTxt(@$POST['ratelimit']);

    // Determine which ratelimit to use based on method
    if (empty($ratelimit)) {
        $ratelimit = $methodRatelimits[$method] ?? $defaultRatelimits['default'];
    }

    // Check if ratelimit is less than 0
    if ($ratelimit < 0) {
        $rMsg = ['error', "Ratelimit cannot be less than 0."];
        echo json_encode($rMsg);
        die();
    }

    // Set default and method-specific ranges
    $defaultRange = [1, 256];
    $methodRanges = [
        8 => [1, 256],
        26 => [1, 256],
    ];

    // Determine which range to use based on method
    $range = $methodRanges[$method] ?? $defaultRange;

    // Set min and max ratelimit from the selected range
    $minRatelimit = $range[0];
    $maxRatelimit = $range[1];

    // Check if ratelimit is within the selected range for the given method
    if (isset($methodRatelimits[$method]) && ($ratelimit < $methodRanges[$method][0] || $ratelimit > $methodRanges[$method][1])) {
        $rMsg = ['error', "Ratelimit for that method has $ratelimit an invalid range. min: {$methodRanges[$method][0]}, max: {$methodRanges[$method][1]}"];
        echo json_encode($rMsg);
        die();
    } elseif (!isset($methodRatelimits[$method]) && ($ratelimit < $defaultRange[0] || $ratelimit > $defaultRange[1])) {
        $rMsg = ['error', "Ratelimit has an invalid range. min: {$defaultRange[0]}, max: {$defaultRange[1]}"];
        echo json_encode($rMsg);
        die();
    }

// Check if ratelimit is a number
    if (!is_numeric($ratelimit)) {
        echo json_encode(['error', 'Rate limit must be a number.']);
        die();
    }


// Check Reqmethod
    $requestmethod = !empty($POST['requestmethod']) ? $Secure->SecureTxt($POST['requestmethod']) : 'GET';


    $postdata = $_POST['postdata'];


    // Check cookie
    $cookie = isset($_POST['cookie']) ? $Secure->SecureTxt($_POST['cookie']) : '';

    if (!empty($cookie) && !preg_match('/^[\p{L}\p{N}\p{S}\p{P}]+$/u', $cookie)) {
        $rMsg = ['error', "Invalid cookie."];
        echo json_encode($rMsg);
        die();
    }


    $planData = $Plan->PlanDataID($User->UserData()['plan']) ?? [];
    $load = number_format(($planData['concurrents'] ?? 0) + $Addons[0] - $ALogs->UserAttacks($User->UserData()['id'])['Count'], 0);

    if ($load < 1) {
        echo json_encode(['error', 'You have exceeded your total slots in running.']);
        die();
    }

    $reconnection = isset($_POST['reconnection']) ? (int)@$Secure->SecureTxt($_POST['reconnection']) : 50;

    if (!empty($_POST['reconnection']) && (!is_numeric($reconnection) || (int)$reconnection < 1 || (int)$reconnection > 75)) {
        echo json_encode(['error', 'Reconnection must be a number min 1 max 75.']);
        die();
    }


// Execute
    $Attack->Layer7($target, $time, $method, $ratelimit, $requestmethod, $postdata, $cookie, $reconnection);

}

/* Stop Attack */
if (isset($GET['Stop'])) {

// Chekc Users plan
    if ($User->UserData()['plan'] == 0) {
        if ($User->UserData()['expire'] < time()) {
            $rMsg = ['error', 'You must get a plan.'];
            echo json_encode($rMsg);
            die();
        }
    }

    // Check csrf
    $_csrf = @$Secure->SecureTxt($POST['_csrf']);
    if ($_csrf != $csrftoken) {
        $rMsg = ['error', "$csrftoken"];
        echo json_encode($rMsg);
        die();
    }

// Check
    $ID = (int)@$Secure->SecureTxt($POST['id']);
// Is valid Attack ID
    if (empty($ID)) {
        $rMsg = ['error', 'Invalid ID.'];
        echo json_encode($rMsg);
        die();
    }

    if ($ALogs->LogsDataID($ID, 1)['userID'] != $User->UserData()['id']) {
        $rMsg = ['error', 'Invalid Attack.'];
        echo json_encode($rMsg);
        die();
    }

    if ($ALogs->LogsDataID($ID, 1)['stopped'] != 0) {
        $rMsg = ['error', 'This attack is already stopped.'];
        echo json_encode($rMsg);
        die();
    }

    if ($ALogs->LogsDataID($ID, 1)['date'] + $ALogs->LogsDataID($ID, 1)['time'] < time()) {
        $rMsg = ['error', 'This attack is expired.'];
        echo json_encode($rMsg);
        die();
    }

// Execute
    $Attack->Stop($ID);
}

/* Stop All Attacks */
if (isset($GET['StopAll'])) {

// Check Users plan
    if ($User->UserData()['plan'] == 0) {
        if ($User->UserData()['expire'] < time()) {
            $rMsg = ['error', 'You must get a plan.'];
            echo json_encode($rMsg);
            die();
        }
    }

    if ($ALogs->UserAttacks($User->UserData()['id'])['Count'] < 1) {
        $rMsg = ['error', 'You dont have started attacks.'];
        echo json_encode($rMsg);
        die();
    }

// Execute
    $Attack->StopAll();
}

/* ChangePassword */
if (isset($GET['UpdateProfile'])) {
// Check csrf
    $_csrf = @$Secure->SecureTxt($POST['_csrf']);
    if ($_csrf != $csrftoken) {
        $rMsg = ['error', 'Token is expired!'];
        echo json_encode($rMsg);
        die();
    }

    // Check
    $CPassword = @$_POST['CPassword'];
    // Is valid CPassword
    if (empty($CPassword)) {
        $rMsg = ['error', 'Current Password is empty.'];
        echo json_encode($rMsg);
        die();
    }

    if ($Secure->encrypt($CPassword) != $User->UserData()['password']) {
        $rMsg = ['error', 'Current Password is invalid.'];
        echo json_encode($rMsg);
        die();
    }

    // Check Passwords
    $Password = @$_POST['Password1'];
    $Password2 = @$_POST['Password2'];
    // Is valid Password
    if (empty($Password)) {
        $rMsg = ['error', 'Password 1 is empty.'];
        echo json_encode($rMsg);
        die();
    }
    if (empty($Password2)) {
        $rMsg = ['error', 'Password 2 is empty.'];
        echo json_encode($rMsg);
        die();
    }

    if ($Password != $Password2) {
        $rMsg = ['error', 'New passwords are not same.'];
        echo json_encode($rMsg);
        die();
    }

    if (strlen($Password) > 15 || strlen($Password) < 4) {
        $rMsg = ['error', 'Password must be 4-15 characters length.'];
        echo json_encode($rMsg);
        die();
    }

    if ($Password == $CPassword) {
        $rMsg = ['error', 'New Password cant be your current.'];
        echo json_encode($rMsg);
        die();
    }

    $User->ChangePassword($Secure->encrypt($Password), $User->UserData()['id']);

    // Send Success Message
    $rMsg = ['success', 'You changed your password.'];
    echo json_encode($rMsg);
    die();
}

?>