<?php

if (!defined('allow')) {
    header("HTTP/1.0 404 Not Found");
}

if (!defined('k90plearptJQXxFZR2l7LRp8V')) {
    die('includes not found');
}

class Admin
{
    public function AdminAllow()
    {
        global $User;
        if ($User->UserData()['rank'] == 888) {
            return true;
        } else {
            return false;
        }
    }

    public function CheckIfAdmin($id)
    {
        global $User;

        if ($User->UserDataID($id, 1)['rank'] == 888) {
            return true;
        } else {
            return false;
        }
    }


    public function ClearOldAttacks()
    {
        global $DataBase;
        $DataBase->Query("DELETE FROM `attack_logs` WHERE `time` + `date` < UNIX_TIMESTAMP()");

        return $DataBase->Execute();
    }


    public function ChangeUser($userID, $Plan, $Expire, $Money, $Status, $Pw, $Addons)
    {
        global $DataBase;
        global $User;
        global $Secure;

        if (!$Pw == '0') {
            $DataBase->Query("UPDATE `users` SET  `plan`=:Plan,`expire`=:Expire,`money`=:Money,`status`=:Status,`password`=:Pw, `addons`=:Addons WHERE `id`=:uID");
            $DataBase->Bind(':Plan', $Plan);
            $DataBase->Bind(':Expire', $Expire);
            $DataBase->Bind(':Money', $Money);
            $DataBase->Bind(':Status', $Status);
            $DataBase->Bind(':Pw', $Secure->encrypt($Pw));
            $DataBase->Bind(':Addons', $Addons);
            $DataBase->Bind(':uID', $userID);

            $execute = $DataBase->Execute();

            if ($execute == false) {
                $rMsg = ['error', 'Error to change user'];
                echo json_encode($rMsg);
                die();
            } else {
                $rMsg = ['success', 'User data has been changed'];
                echo json_encode($rMsg);
                die();
            }
        } else {
            $DataBase->Query("UPDATE `users` SET `plan`=:Plan,`expire`=:Expire,`money`=:Money,`status`=:Status, `addons`=:Addons WHERE `id`=:uID");
            $DataBase->Bind(':Plan', $Plan);
            $DataBase->Bind(':Expire', $Expire);
            $DataBase->Bind(':Money', $Money);
            $DataBase->Bind(':Status', $Status);
            $DataBase->Bind(':Addons', $Addons);
            $DataBase->Bind(':uID', $userID);

            $execute = $DataBase->Execute();

            if ($execute == false) {
                $rMsg = ['error', 'Error to change user'];
                echo json_encode($rMsg);
                die();
            } else {
                $rMsg = ['success', 'User data has been changed'];
                echo json_encode($rMsg);
                die();
            }
        }
    }

    public function AddTimeAllUsers($Time)
    {
        global $DataBase;

        // Insert in DB
        $DataBase->Query("UPDATE `users` SET `expire` = `expire` + :Time WHERE `expire` > UNIX_TIMESTAMP()  + 86000 AND `plan` != 1");
        $DataBase->Bind(':Time', $Time);

        $return = $DataBase->Execute();

        if ($return == false) {
            $rMsg = ['error', 'Error.'];
            echo json_encode($rMsg);
            die();
        } else {
            $rMsg = ['success', 'Additional time has been added.'];
            echo json_encode($rMsg);
            die();
        }
    }

    public function DeleteUser($id)
    {
        global $DataBase;

        $DataBase->Query("DELETE FROM `users` WHERE `id`=:uID");
        $DataBase->Bind(':uID', $id);

        $DataBase->Execute();

        $DataBase->Query("DELETE FROM `attack_logs` WHERE `userID`=:uID");
        $DataBase->Bind(':uID', $id);

        $DataBase->Execute();

        $DataBase->Query("DELETE FROM `action_logs` WHERE `uID`=:uID");
        $DataBase->Bind(':uID', $id);

        $DataBase->Execute();

        $DataBase->Query("DELETE FROM `invoice` WHERE `userID`=:uID");
        $DataBase->Bind(':uID', $id);

        $DataBase->Execute();

    }

    public function ClearLogs($type)
    {
        global $DataBase;

        if ($type == 'attack_logs') {
            $DataBase->Query("DELETE FROM `attack_logs` WHERE 1=1");

            $DataBase->Execute();
        } else if ($type == 'action_logs') {
            $DataBase->Query("DELETE FROM `action_logs` WHERE 1=1");

            $DataBase->Execute();
        } else if ($type == 'news') {
            $DataBase->Query("DELETE FROM `news` WHERE 1=1");

            $DataBase->Execute();
        } else if ($type == 'payments') {
            $DataBase->Query("DELETE FROM `payments` WHERE 1=1");

            $DataBase->Execute();
        } else if ($type == 'users_api') {
            $DataBase->Query("DELETE FROM `users_api` WHERE 1=1");

            $DataBase->Execute();
        }

        $rMsg = ['success', 'Logs has been cleared.'];
        echo json_encode($rMsg);
        die();
    }

}

?>
