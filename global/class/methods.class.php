<?php

if (!defined('allow')) {
    header("HTTP/1.0 404 Not Found");
}

if (!defined('k90plearptJQXxFZR2l7LRp8V')) {
    die('includes not found');
}

class Methods
{

    public function MethodsDataAll()
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `methods` ORDER BY `name` ASC");
        $DataBase->Execute();

        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }

    public function MethodsData($pID)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `methods` WHERE `id` = :pID");
        $DataBase->Bind(':pID', $pID);
        $DataBase->Execute();

        $Return = array(
            'Count' => $DataBase->RowCount(),
            'Response' => $DataBase->ResultSet()
        );

        return $Return;
    }

    public function MethodsDataNameAPI($pID)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `methods` WHERE `apiname` = :pID");
        $DataBase->Bind(':pID', $pID);
        $DataBase->Execute();

        return $DataBase->Single();
    }

    public function MethodsDataID($pID)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `methods` WHERE `id` = :pID");
        $DataBase->Bind(':pID', $pID);
        $DataBase->Execute();

        return $DataBase->Single();
    }

    public function MethodsDataName($pID)
    {
        global $DataBase;

        $DataBase->Query("SELECT * FROM `methods` WHERE `name` = :pID");
        $DataBase->Bind(':pID', $pID);
        $DataBase->Execute();

        return $DataBase->Single();
    }

    public function AddMethod($Name, $Hubname, $Apiname, $Layer, $Type, $Class, $Api, $Description)
    {
        global $DataBase;

        // Insert in Base
        $DataBase->Query("INSERT INTO `methods` (`id`, `name`, `hubname`, `apiname`, `layer`, `class`, `description`, `type`, `api`) VALUES (NULL, :Name, :Hubname, :Apiname, :Layer, :Class, :Description, :Type, :Api);");
        $DataBase->Bind(':Name', $Name);
        $DataBase->Bind(':Hubname', $Hubname);
        $DataBase->Bind(':Apiname', $Apiname);
        $DataBase->Bind(':Type', $Type);
        $DataBase->Bind(':Class', $Class);
        $DataBase->Bind(':Description', $Description);
        $DataBase->Bind(':Layer', $Layer);
        $DataBase->Bind(':Api', $Api);

        return $DataBase->Execute();
    }

    public function ChangeMethod($Name, $Hubname, $Apiname, $Layer, $Type, $Class, $Api, $Description, $id)
    {
        global $DataBase;

        $DataBase->Query("UPDATE `methods` SET `name`=:Name, `hubname`=:Hubname, `apiname`=:Apiname, `layer`=:Layer, `type`=:Type, `class`=:Class, `api`=:Api, `description`=:Description WHERE `id`=:uID");
        $DataBase->Bind(':Name', $Name);
        $DataBase->Bind(':Hubname', $Hubname);
        $DataBase->Bind(':Apiname', $Apiname);
        $DataBase->Bind(':Layer', $Layer);
        $DataBase->Bind(':Type', $Type);
        $DataBase->Bind(':Class', $Class);
        $DataBase->Bind(':Api', $Api);
        $DataBase->Bind(':Description', $Description);
        $DataBase->Bind(':uID', $id);

        return $DataBase->Execute();
    }

    public function DeleteMethod($id)
    {
        global $DataBase;

        $DataBase->Query("DELETE FROM `methods` WHERE `id`=:uID");
        $DataBase->Bind(':uID', $id);

        return $DataBase->Execute();
    }

}

?>
