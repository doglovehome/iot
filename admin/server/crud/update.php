<?php

session_start();

include '../../components/config/condb.php';

if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {

    if(isset($_SESSION["user_id"])){

        if(isset($_POST["serial_status"])){

            $statement = $conn->prepare("UPDATE device SET serial_status = :status WHERE device_id = :device_id");
            $statement->execute(array(
                ':status' => $_POST["serial_status"],
                ':device_id' => $_POST["device_id"],
            ));

            echo 200 ;

        }

        if(isset($_POST["user_id"])){

            if($_POST["status"] == "allow"){
                $statement = $conn->prepare("UPDATE user SET user_allow = 1 WHERE user_id = :user_id");
                $statement->execute(array(
                    ':user_id'  => $_POST["user_id"]
                ));
            }else{
                $statement = $conn->prepare("DELETE FROM user WHERE user_id = :user_id");
                $statement->execute(array(
                    ':user_id'  => $_POST["user_id"]
                ));
            }
            echo 200 ;
        }


    }else{
        echo 403 ;
    }
}

$conn = null ;
exit;
