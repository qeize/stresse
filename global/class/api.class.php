<?php

if (!defined('allow')) {
    header("HTTP/1.0 404 Not Found");
}

if (!defined('k90plearptJQXxFZR2l7LRp8V')) {
    die('includes not found');
}

class Api
{

    public function ApiDataAll()
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `api` ORDER BY `id`");
        $DataBase->Execute();

        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }

    public function ApiDataBySlotsL4()
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `api` WHERE `layer` = 4");
        $DataBase->Execute();

        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }

    public function ApiDataBySlotsL7()
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `api` WHERE `layer` = 7");
        $DataBase->Execute();

        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }

    public function ApiSlots()
    {
        global $DataBase;

        $DataBase->Query("SELECT sum(slots) FROM `api` WHERE `status` = 0");
        $DataBase->Execute();

        return $DataBase->FetchColumn();
    }

    public function ApiSlotsL4()
    {
        global $DataBase;

        $DataBase->Query("SELECT sum(slots) FROM `api` WHERE `layer` = 4 AND `status` = 0");
        $DataBase->Execute();

        return $DataBase->FetchColumn();
    }

    public function ApiSlotsL7()
    {
        global $DataBase;

        $DataBase->Query("SELECT sum(slots) FROM `api` WHERE `layer` = 7 AND `status` = 0");
        $DataBase->Execute();

        return $DataBase->FetchColumn();
    }

    public function ApiSlotsL7Method($method)
    {
        global $DataBase;

        $DataBase->Query("SELECT SUM(slots) FROM `api` WHERE `layer` = 7 AND `methods` = :method AND `status` = 0");
        $DataBase->Bind(':method', $method);
        $DataBase->Execute();

        return $DataBase->FetchColumn();
    }


    public function CountOfAttacks()
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0");
        $DataBase->Execute();

        return $DataBase->RowCount();
    }


    public function CountOfAttacks4()
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE `type` = 4 AND `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0");
        $DataBase->Execute();

        return $DataBase->RowCount();
    }

    public function CountOfAttacks7()
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE `type` = 7 AND `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0");
        $DataBase->Execute();

        return $DataBase->RowCount();
    }

    public function CountApiOfAttacks($id)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE `handler` = :ID AND `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0");
        $DataBase->Bind(':ID', $id);
        $DataBase->Execute();

        return $DataBase->RowCount();
    }

    public function UserAttacks($id, $num)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE `userID` = :ID AND `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0");
        $DataBase->Bind(':ID', $id);
        $DataBase->Execute();

        if ($num == 0) {
            $Return = array(
                'Count' => $DataBase->RowCount(),
                'Response' => $DataBase->ResultSet()
            );

            return $Return;
        } else {
            return $DataBase->Single();
        }
    }

    public function UsersApiDataAll()
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `users_api`");
        $DataBase->Execute();

        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }

    public function UsersApiDataUserID($id, $num)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `users_api` WHERE `userID` = :ID");
        $DataBase->Bind(':ID', $id);
        $DataBase->Execute();

        if ($num == 0) {
            $Return = array(
                'Count' => $DataBase->RowCount(),
                'Response' => $DataBase->ResultSet()
            );

            return $Return;
        } else {
            return $DataBase->Single();
        }
    }

    public function NewApiAccess($Time, $Slots, $Ips)
    {
        global $DataBase;
        global $Plan;
        global $Logs;
        global $Secure;
        global $User;
        global $Api;

        $Addons = explode('|', $User->UserData()['addons']);

        if ($Plan->PlanDataID($User->UserData()['plan'])['api'] != 1 && $Addons[2] != 1) {
            $rMsg = ['error', 'You need plan with api access.'];
            echo json_encode($rMsg);
            die();
        }


        if ($Plan->PlanDataID($User->UserData()['plan'])['mbt'] + $Addons[1] < $Time || $Time < 30) {
            $rMsg = ['error', 'Invalid Time, min: 30s.'];
            echo json_encode($rMsg);
            die();
        }

        if ($Plan->PlanDataID($User->UserData()['plan'])['concurrents'] + $Addons[0] < $Slots || $Slots < 1) {
            $rMsg = ['error', 'Invalid Slots.'];
            echo json_encode($rMsg);
            die();
        }

        $IpExplode = explode('|', $Secure->ApiIps($Ips));

        if (!empty($Ips)) {
            if (!filter_var(@$IpExplode[0], FILTER_VALIDATE_IP)) {
                $rMsg = ['error', 'First ip-address is invalid.'];
                echo json_encode($rMsg);
                die();
            }

            if (!empty(@$IpExplode[1])) {
                if (!filter_var(@$IpExplode[1], FILTER_VALIDATE_IP)) {
                    $rMsg = ['error', 'Second ip-address is invalid.'];
                    echo json_encode($rMsg);
                    die();
                }
            }

            if (!empty(@$IpExplode[2])) {
                if (!filter_var(@$IpExplode[2], FILTER_VALIDATE_IP)) {
                    $rMsg = ['error', 'Third ip-address is invalid.'];
                    echo json_encode($rMsg);
                    die();
                }
            }
        }

        $userID = $User->UserData()['id'];
        $api_key = $Secure->RandKey(10);
        $wl = @$IpExplode[0] . "|" . @$IpExplode[1] . "|" . @$IpExplode[2];

        if ($Api->UsersApiDataID($userID, 0)['Count'] < 3) {

            $DataBase->Query("INSERT INTO `users_api` (`id`, `userID`, `AttackTime`, `Slots`,  `api_key`,  `WhiteList`) VALUES (NULL, :userID, :AttackTime, :Slots, :api_key, :WhiteList);");
            $DataBase->Bind(':userID', $userID);
            $DataBase->Bind(':AttackTime', $Time);
            $DataBase->Bind(':Slots', $Slots);
            $DataBase->Bind(':api_key', $api_key);
            $DataBase->Bind(':WhiteList', $wl);

            $return = $DataBase->Execute();

        } else {
            $rMsg = ['error', 'You can have maximum 3 API`s.'];
            echo json_encode($rMsg);
            die();
        }

        if ($return == false) {
            $rMsg = ['error', 'Action return error code.'];
            echo json_encode($rMsg);
            die();
        } else {
            $rMsg = ['success', 'API Key has been created.'];
            echo json_encode($rMsg);
            die();
        }
    }

    public function UsersApiDataID($id, $num)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `users_api` WHERE `id` = :ID");
        $DataBase->Bind(':ID', $id);
        $DataBase->Execute();

        if ($num == 0) {
            $Return = array(
                'Count' => $DataBase->RowCount(),
                'Response' => $DataBase->ResultSet()
            );

            return $Return;
        } else {
            return $DataBase->Single();
        }
    }

    public function UsersApiDataID2($api_key, $num)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `users_api` WHERE `api_key` = :api_key");
        $DataBase->Bind(':api_key', $api_key);
        $DataBase->Execute();

        if ($num == 0) {
            $Return = array(
                'Count' => $DataBase->RowCount(),
                'Response' => $DataBase->ResultSet()
            );

            return $Return;
        } else {
            return $DataBase->Single();
        }
    }

    public function DisableApi($id)
    {
        global $DataBase;

        $DataBase->Query("UPDATE `api` SET `status`=:status WHERE `id`=:id");
        $DataBase->Bind(':id', $id);
        $DataBase->Bind(':status', '1');
        return $DataBase->Execute();
    }

    public function EnableApi($id)
    {
        global $DataBase;

        $DataBase->Query("UPDATE `api` SET `status`=:status WHERE `id`=:id");
        $DataBase->Bind(':id', $id);
        $DataBase->Bind(':status', '0');
        return $DataBase->Execute();
    }


    public function RemoveApi($api_key)
    {
        global $DataBase;

        $DataBase->Query("DELETE FROM `users_api` WHERE `api_key`=:api_key");
        $DataBase->Bind(':api_key', $api_key);

        $return = $DataBase->Execute();

        if ($return == false) {
            $rMsg = ['error', 'Action return error code.'];
            echo json_encode($rMsg);
            die();
        } else {
            $rMsg = ['success', 'API Key has been deleted.'];
            echo json_encode($rMsg);
            die();
        }
    }

    public function AddAPI($name, $link, $slots, $methods, $layer, $status, $lastUsed)
    {
        global $DataBase;

        $DataBase->Query("INSERT INTO `api` (`id`, `name`, `link`, `slots`, `methods`, `layer`, `status`, `lastUsed`) VALUES (NULL, :name, :link, :slots, :methods, :layer, :status, :lastUsed);");
        $DataBase->Bind(':name', $name);
        $DataBase->Bind(':link', $link);
        $DataBase->Bind(':slots', $slots);
        $DataBase->Bind(':methods', $methods);
        $DataBase->Bind(':layer', $layer);
        $DataBase->Bind(':status', $status);
        $DataBase->Bind(':lastUsed', $lastUsed);

        return $DataBase->Execute();
    }

    public function ChangeAPI($name, $link, $slots, $methods, $layer, $status, $id)
    {
        global $DataBase;

        $DataBase->Query("UPDATE `api` SET `name`=:name, `link`=:link, `slots`=:slots, `layer`=:layer, `methods`=:methods, `status`=:status WHERE `id`=:id");
        $DataBase->Bind(':name', $name);
        $DataBase->Bind(':link', $link);
        $DataBase->Bind(':slots', $slots);
        $DataBase->Bind(':layer', $layer);
        $DataBase->Bind(':methods', $methods);
        $DataBase->Bind(':status', $status);
        $DataBase->Bind(':id', $id);

        return $DataBase->Execute();
    }

    public function DeleteAPI($id)
    {
        global $DataBase;

        $DataBase->Query("DELETE FROM `api` WHERE `id`=:uID");
        $DataBase->Bind(':uID', $id);

        return $DataBase->Execute();
    }

    public function LastUsed($id)
    {
        global $DataBase;

        $DataBase->Query("UPDATE `api` SET `lastUsed`=:lastUsed WHERE `id`=:id");
        $DataBase->Bind(':lastUsed', time());
        $DataBase->Bind(':id', $id);

        return $DataBase->Execute();
    }


    public function ApiDataID($id, $num)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `api` WHERE `id` = :ID");
        $DataBase->Bind(':ID', $id);
        $DataBase->Execute();

        if ($num == 0) {
            $Return = array(
                'Count' => $DataBase->RowCount(),
                'Response' => $DataBase->ResultSet()
            );

            return $Return;
        } else {
            return $DataBase->Single();
        }
    }

    public function EnableAll()
    {
        global $DataBase;

        $DataBase->Query("UPDATE (*) SET `status`=:status");
        $DataBase->Bind(':status', "1");

        return $DataBase->Execute();
    }

    public function DisableAll()
    {
        global $DataBase;

        $DataBase->Query("UPDATE (*)  SET `status`=:status");
        $DataBase->Bind(':status', "0");

        return $DataBase->Execute();
    }

}

?>