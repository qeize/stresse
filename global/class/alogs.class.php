<?php

if (!defined('allow')) {
    header("HTTP/1.0 404 Not Found");
}

if (!defined('k90plearptJQXxFZR2l7LRp8V')) {
    die('includes not found');
}

class ALogs
{
    public function LogsDataAll()
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs`");
        $DataBase->Execute();

        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }

    public function TotalAttacks()
    {
        global $DataBase;

        $DataBase->Query("SELECT MAX(`id`) AS last_id FROM `attack_logs`");
        $DataBase->Execute();

        $result = $DataBase->Single();

        return $result['last_id'];
    }


    public function LogsDataToday()
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE `date` >= UNIX_TIMESTAMP() - 86400");
        $DataBase->Execute();

        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }

    public function LogsDataLastMonth()
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE FROM_UNIXTIME(`date`) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND FROM_UNIXTIME(`date`) <= NOW()");
        $DataBase->Execute();

        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }

    public function DeleteAttacks($handler)
    {
        global $DataBase;
        $DataBase->Query("DELETE FROM `attack_logs` WHERE `handler`=:handler AND `time` + `date` < UNIX_TIMESTAMP()");
        $DataBase->Bind(':handler', $handler);

        return $DataBase->Execute();
    }


    public function LogsDataID($id, $num)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE `id` = :ID ORDER BY `date` DESC");
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

    public function LogsDataUserID($id, $num)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE `userID` = :ID ORDER BY `id`");
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

    public function LogsDataRunningUserID($id, $num)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` =! 1 AND `userID` = :ID ORDER BY `id`");
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

    public function LogsDataStopper($stopper, $num)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE `stopper` = :stopper ORDER BY id DESC");
        $DataBase->Bind(':stopper', $stopper);
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

    public function LogsDataTarget($Target, $num)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE `target` = :Target");
        $DataBase->Bind(':Target', $Target);
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


    public function LogsDataMethodRunning($method)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0 AND `method` = :method");
        $DataBase->Bind(':method', $method);
        $DataBase->Execute();

        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }

    public function LogsDataRunningByTimeInterval($startTime, $endTime)
    {
        global $DataBase;

        // Define the SQL query with the time interval condition
        $query = "SELECT * FROM `attack_logs` WHERE `time` + `date` > :startTime AND `time` + `date` < :endTime AND `stopped` = 0";

        // Bind the parameters to the query
        $DataBase->Query($query);
        $DataBase->Bind(':startTime', $startTime);
        $DataBase->Bind(':endTime', $endTime);
        $DataBase->Execute();

        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }

    public function LogsDataRunning()
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0");
        $DataBase->Execute();

        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }

    public function LogsDataRunningL4()
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0 AND `type` = 4");
        $DataBase->Execute();

        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }

    public function LogsDataRunningL7()
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0 AND `type` = 7");
        $DataBase->Execute();

        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }

    public function LogsDataRunningOnAPI($userID)
    {
        global $DataBase;

        $DataBase->Query("SELECT COUNT(*) AS Count FROM `attack_logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = :stopped AND `userID` = :userID");
        $DataBase->Bind(':userID', $userID);
        $DataBase->Bind(':stopped', 0);
        $DataBase->Execute();

        return $DataBase->Single()['Count'];
    }

    public function abuseCheck($host)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = :stopped AND `host` = :host");
        $DataBase->Bind(':host', $host);
        $DataBase->Bind(':stopped', '0');
        $DataBase->Execute();

        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }

    public function MapLogs()
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE  `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = :stopped");
        $DataBase->Bind(':stopped', '0');
        $DataBase->Execute();

        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }

    public function LastUserAttack($id, $num)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE `time` + `date`  AND `stopped` = 0 AND `userID` = :userID ORDER BY `id` DESC LIMIT 10");
        $DataBase->Bind(':userID', $id);
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

    public function UserAttacks($uID)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0 AND `userID`  = :uID");
        $DataBase->Bind(':uID', $uID);
        $DataBase->Execute();

        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }

    public function RunningAttacksL4()
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0 AND `type` = '4'");
        $DataBase->Execute();

        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }

    public function RunningAttacksL7()
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `attack_logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0 AND `type` = '7'");
        $DataBase->Execute();

        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }

    public function CreateLog($userID, $target, $host, $time, $port, $method, $stopper, $handler, $where, $type)
    {
        global $DataBase;

        $DataBase->Query("INSERT INTO `attack_logs` (`id`, `userID`, `target`, `host`, `time`, `port`, `method`, `stopper`, `date`, `stopped`, `handler`, `where`, `type`) VALUES (NULL, :userID, :target, :host, :time, :port, :method, :stopper, :date, '0', :handler, :where, :type);");
        $DataBase->Bind(':userID', $userID);
        $DataBase->Bind(':target', $target);
        $DataBase->Bind(':host', $host);
        $DataBase->Bind(':port', $port);
        $DataBase->Bind(':time', $time);
        $DataBase->Bind(':method', $method);
        $DataBase->Bind(':stopper', $stopper);
        $DataBase->Bind(':date', time());
        $DataBase->Bind(':handler', $handler);
        $DataBase->Bind(':where', $where);
        $DataBase->Bind(':type', $type);

        return $DataBase->Execute();
    }

    public function UpdateLog($source_stopper, $stopper)
    {
        global $DataBase;

        $DataBase->Query("UPDATE `attack_logs` SET `stopper`=:stopper WHERE `stopper`=:source_stopper");
        $DataBase->Bind(':stopper', $stopper);
        $DataBase->Bind(':source_stopper', $source_stopper);

        return $DataBase->Execute();
    }


    public function DeleteLog($source_stopper)
    {
        global $DataBase;
        $DataBase->Query("DELETE FROM `attack_logs` WHERE `stopper`=:source_stopper");
        $DataBase->Bind(':source_stopper', $source_stopper);

        return $DataBase->Execute();

    }

}

?>