<?php


class mydevice {

    private function check_session(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function __construct($pdo)
    {
        $this->conn = $pdo ;
    }


    public function show_device(){ 
        $statement = $this->conn->prepare("SELECT * FROM data INNER JOIN device on device.device_id = data.device_owner WHERE device.user_owner = :user");
        $statement->execute(array(
            ':user' => $this->user_id
        ));
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)){

            if($row["device_status"] == 0) {
                $status = "ปิด" ;
            }else{
                $status = "เปิด" ;
            }

            echo '
            <div class="col-12 col-sm-6 col-md-6 col-xl-3 col-lg-6 mb-5">
                <div class="box-device">
                    
                    <img class="icon-iot" src="./assets/17.png">
                    

                    <div class="box-status">
                        <p class="header-status">ชื่ออุปกรณ์ : <span class="sub-status">'.$row["device_name"].'</span> <button data-device_id="'.$row["device_id"].'" class="btn change-name" data-bs-toggle="modal" data-bs-target="#changename">แก้ไขชื่อ</button></p>
                        <p class="header-status">แบตเตอร์รี่ : <span class="sub-status">'.$row["data_battery"].'</span></p>
                        <p class="header-status">สถานะ : <span class="sub-status" id="'.$row["device_id"].'">'.$status.'</span></p>
                        <p class="header-status">ความชื้นในดิน : <span class="sub-status">'.$row["data_moisture"].' PH</span> <button data-device_id="'.$row["device_id"].'" class="btn change-name chart" data-bs-toggle="modal" data-bs-target="#grap">ข้อมูล</button></p>
                    </div>
                    <div class="row justify-content-center align-content-center">
                        <button class="btn btn-update" data-device_id="'.$row["device_id"].'" data-device_status="1" style=" background-color: #4fdf37;">เปิด</button> <button class="btn btn-update btn-danger" data-device_status="0" data-device_id="'.$row["device_id"].'">ปิด</button>
                    </div>
                </div>
            </div>
            ';
        }
    }


    public function get_user(){

        $this->check_session();
        
        if(isset($_SESSION["user_id"])){
            $this->user_id = $_SESSION["user_id"];
        }else{
            header('Location: login.php');
        }
        
    }
}