<?php

if (!defined('allow')) {
    header("HTTP/1.0 404 Not Found");
}

if (!defined('k90plearptJQXxFZR2l7LRp8V')) {
    die('includes not found');
}

class Order
{

    public function OrderDataAll()
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `invoice` ORDER BY `order_id` ASC");
        $DataBase->Execute();


        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }

    public function CancelOrder()
    {
        global $DataBase;

        $DataBase->Query("UPDATE `invoice` SET `invoice_status` = :status WHERE `invoice_status` != :confirmed AND `invoice_status` = :invoice AND `invoice_expires` < :time");
        $DataBase->Bind(':status', 'charge:canceled');
        $DataBase->Bind(':confirmed', 'charge:confirmed');
        $DataBase->Bind(':invoice', 'charge:created');
        $DataBase->Bind(':time', time());

        return $DataBase->Execute();

    }

    public function OrderDataUser($userID, $number)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `invoice` WHERE `userID` = :userID AND  `invoice_status` != :canceled ORDER BY `order_id` DESC");
        $DataBase->Bind(':userID', $userID);
        $DataBase->Bind(':canceled', 'invoice:canceled');
        $DataBase->Execute();

        if ($number == 0) {
            $Return = array(
                'Count' => $DataBase->RowCount(),
                'Response' => $DataBase->ResultSet()
            );
        } else {
            $Return = $DataBase->Single();
        }

        return $Return;
    }

    public function OrderDataID($ID, $userID, $number)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `invoice` WHERE `order_id` = :ID AND `userID` = :userID");
        $DataBase->Bind(':ID', $ID);
        $DataBase->Bind(':userID', $userID);
        $DataBase->Execute();

        if ($number == 0) {
            $Return = array(
                'Count' => $DataBase->RowCount(),
                'Response' => $DataBase->ResultSet()
            );
        } else {
            $Return = $DataBase->Single();
        }

        return $Return;
    }

    public function LastOrderID()
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `invoice` ORDER BY `order_id` DESC LIMIT 1");
        $DataBase->Execute();

        return $DataBase->Single();
    }

    public function LastUserOrder($userID, $number)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `invoice` WHERE `userID` = :userID ORDER BY `order_id` DESC LIMIT 1");
        $DataBase->Bind(':userID', $userID);
        $DataBase->Execute();

        if ($number == 0) {
            $Return = array(
                'Count' => $DataBase->RowCount(),
                'Response' => $DataBase->ResultSet()
            );
        } else {
            $Return = $DataBase->Single();
        }

        return $Return;
    }

    public function MonthEarned()
    {
        global $DataBase;


        $DataBase->Query("SELECT SUM(local_price) AS total_sum FROM invoice WHERE `invoice_status` = 'charge:confirmed' AND  FROM_UNIXTIME(invoice_created) >= DATE_SUB(CURRENT_DATE(), INTERVAL 30 DAY);");
        $DataBase->Execute();

        $total = $DataBase->Single();

        return $total['total_sum'];
    }

    public function TotalEarned()
    {
        global $DataBase;


        $DataBase->Query("SELECT SUM(local_price) AS total_sum FROM invoice WHERE `invoice_status` = 'charge:confirmed' ");
        $DataBase->Execute();

        $total = $DataBase->Single();

        return $total['total_sum'];
    }

    public function ActiveUserOrder($userID, $number)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `invoice` WHERE `userID` = :userID AND `invoice_expires` > :time ORDER BY `order_id` DESC LIMIT 1");
        $DataBase->Bind(':userID', $userID);
        $DataBase->Bind(':time', time());
        $DataBase->Execute();

        if ($number == 0) {
            $Return = array(
                'Count' => $DataBase->RowCount(),
                'Response' => $DataBase->ResultSet()
            );
        } else {
            $Return = $DataBase->Single();
        }

        return $Return;
    }

    public function NewOrder($invoice_id, $localprice, $amount, $currency, $invoice_created, $address)
    {
        global $DataBase;
        global $User;

        $userID = $User->UserData()['id'];

        $DataBase->Query("INSERT INTO `invoice` (`order_id`, `invoice_id`, `userID`, `local_price`, `amount`, `currency`, `invoice_created`, `invoice_expires`, `invoice_status`, `address`) VALUES (NULL, :invoice_id, :userID, :local_price, :amount, :currency, :invoice_created, :invoice_expires, :invoice_status, :address);");

        // Bind the values of the parameters to the named placeholders in the query
        $DataBase->Bind(':invoice_id', $invoice_id);
        $DataBase->Bind(':userID', $userID);
        $DataBase->Bind(':local_price', $localprice);
        $DataBase->Bind(':amount', $amount);
        $DataBase->Bind(':currency', $currency);
        $DataBase->Bind(':invoice_created', $invoice_created);
        $DataBase->Bind(':invoice_expires', time() + 3600);
        $DataBase->Bind(':invoice_status', 'NEW');
        $DataBase->Bind(':address', $address);

        return $DataBase->Execute();
    }

    public function CreateOrder($value, $gateway)
    {
//         global $Coinbasee;
        global $Sellix;
        global $User;
        global $Logs;

        $userID = $User->UserData()['id'];

        // create invoice
        $invoice = $Sellix->createOrder($userID, $value, $gateway);
        return $invoice;
    }
}

?>