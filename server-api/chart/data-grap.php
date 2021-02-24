<?php

    include '../../components/config/condb.php';
    header('Content-Type: application/json');
    session_start();

    if(isset($_SESSION["user_id"])){

        $statement = $conn->prepare("SELECT * FROM chart WHERE device_id = :device_id ORDER BY chart_date DESC LIMIT 30 ");
        $statement->execute(array(
            ':device_id'    => $_POST["device_id"]
        ));

        $data = array();

        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $data[] = $row ;
        }

        $conn =null ;
        echo json_encode($data);
    }