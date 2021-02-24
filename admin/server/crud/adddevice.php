<?php

session_start();

include '../../components/config/condb.php';

if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {

    if(isset($_SESSION["user_id"])){

        include '../../../class/token.php' ;
        
        $serial = new token_device($conn);

        $statement = $conn->prepare("INSERT INTO device (device_serial) VALUES (:device_serial)");
        $statement->execute(array(
            ':device_serial' => $serial->create_serial() 
        ));

        echo 200 ;

    }else{
        echo 403 ;
    }
}

$conn = null ;
exit;
