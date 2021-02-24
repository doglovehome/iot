<?php

session_start();

include '../components/config/condb.php';
include '../class/token.php';

if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {

    if(isset($_SESSION["user_id"])){

        if(isset($_POST["device_code"])){

            $token = new token_device($conn);

            if($token->get()){

                $statement = $conn->prepare("UPDATE device SET user_owner = :user_id , device_name = :device_name WHERE device_serial = :device_serial");
                $statement->execute(array(
                    ':user_id'   => $_SESSION["user_id"],
                    ':device_serial'    => $_POST["device_code"],
                    ':device_name'  => $_POST["device_name"]
                ));

                $statement = $conn->prepare("SELECT * FROM device WHERE device_serial = :device_serial LIMIT 1");
                $statement->execute(array(
                    ':device_serial'   => $_POST["device_code"]
                ));

                $row = $statement->fetch(PDO::FETCH_ASSOC);

                $statement = $conn->prepare("INSERT INTO data (device_owner) VALUES (:device_id)");
                $statement->execute(array(
                    ':device_id'    => $row["device_id"]
                ));
                echo 200 ;
            }
        }


    }else{
        echo 403 ;
    }
}



$conn = null ;
exit;
