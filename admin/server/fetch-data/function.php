<?php

    function get_total_all_records_device()
    {
        
        include('../../components/config/condb.php');

        $statement = $conn->prepare("SELECT * FROM device");
        $statement->execute();

        $conn=null;

        return $statement->rowCount();

    }

    function get_total_all_records_user()
    {
        
        include('../../components/config/condb.php');

        $statement = $conn->prepare("SELECT * FROM user WHERE user_allow = 0");
        $statement->execute();

        $conn=null;

        return $statement->rowCount();

    }


   
?>