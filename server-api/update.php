<?php

session_start();

include '../components/config/condb.php';

if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {

    if(isset($_SESSION["user_id"])){

        if(isset($_POST["device_status"])){

            $statement = $conn->prepare("UPDATE device SET device_status = :status WHERE device_id = :device_id and user_owner = :user_id");
            $statement->execute(array(
                ':status' => $_POST["device_status"],
                ':device_id' => $_POST["device_id"],
                ":user_id"  => $_SESSION["user_id"]
            ));

            echo 200 ;

        }else if(isset($_POST["device_name"])){

            $statement = $conn->prepare("UPDATE device SET device_name = :device_name WHERE device_id = :device_id and user_owner = :user_id");
            $statement->execute(array(
                ':device_name' => $_POST["device_name"],
                ':device_id'    => $_POST["device_id"],
                ':user_id'  => $_SESSION["user_id"]
            ));


            echo 200 ;
        
        }


    }else{
        echo 403 ;
    }
}

$conn = null ;
exit;
