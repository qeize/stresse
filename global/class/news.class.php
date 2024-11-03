<?php

if (!defined('allow')) {
    header("HTTP/1.0 404 Not Found");
}

if (!defined('k90plearptJQXxFZR2l7LRp8V')) {
    die('includes not found');
}

class News
{

    public function NewsDataAll()
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `news` ORDER BY `ID` DESC");
        $DataBase->Execute();

        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }

    public function NewsData()
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `news`  ORDER BY `ID` DESC LIMIT 3");
        $DataBase->Execute();

        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }


    public function NewsDataID($id, $num)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `news` WHERE `ID` = :ID");
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

    public function AddNews($Title, $Message)
    {
        global $DataBase;

        $DataBase->Query("INSERT INTO `news` (`ID`, `title`, `message`, `date`) VALUES (NULL, :Title, :Message, :Date);");
        $DataBase->Bind(':Title', $Title);
        $DataBase->Bind(':Message', $Message);
        $DataBase->Bind(':Date', time());

        return $DataBase->Execute();
    }

    public function ChangeNews($title, $message, $ID)
    {
        global $DataBase;

        $DataBase->Query("UPDATE `news` SET `title`=:title, `message`=:message WHERE `ID`=:uID");
        $DataBase->Bind(':title', $title);
        $DataBase->Bind(':message', $message);
        $DataBase->Bind(':uID', $ID);

        return $DataBase->Execute();
    }

    public function DeleteNews($id)
    {
        global $DataBase;

        $DataBase->Query("DELETE FROM `news` WHERE `id`=:uID");
        $DataBase->Bind(':uID', $id);

        return $DataBase->Execute();
    }

}

?>
