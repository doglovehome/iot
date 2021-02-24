<?php

    include '../../components/config/condb.php' ;
    
    if(isset($_GET["device_id"])){

        if(isset($_GET["moisture"])){
            $statement = $conn->prepare("UPDATE data SET data_moisture = :moisture , data_battery = :battery WHERE device_owner = :device_id");
            $statement->execute(array(
                ':moisture' => $_GET["moisture"],
                ':device_id' => $_GET["device_id"],
                ':battery'  => $_GET["battery"]
            ));
    
            $statement = $conn->prepare("INSERT INTO chart (device_id , chart_moisture) VALUES (:device_id , :moisture)");
            $statement->execute(array(
                ':moisture' => $_GET["moisture"],
                ':device_id' => $_GET["device_id"]
            ));
        }else{
            $statement = $conn->prepare("SELECT * FROM device WHERE device_id = :device_id LIMIT 1");
            $statement->execute(array(
                ':device_id' => $_GET["device_id"],
            ));
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            echo json_encode($row["device_status"]);
        }
        
    }

    $conn = null ;