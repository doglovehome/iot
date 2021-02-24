<?php 

class token_device {

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    public function create_serial(){
        $statement = $this->conn->prepare("SELECT * FROM device ORDER BY device_serial DESC LIMIT 1");
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        $number = substr($row["device_serial"], 2);
        $number = $number+1 ;
        $number = str_pad(($number), 3, '0', STR_PAD_LEFT);
        return "ET".$number ;
    }

    private function check_serial(){

        $statement = $this->conn->prepare("SELECT * FROM device WHERE device_serial = :device_serial LIMIT 1");
        $statement->execute(array(
            ':device_serial'    => $this->device_serial
        ));

        $row = $statement->rowCount();

        if($row == 1){
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            if($row["serial_status"] == 1){
                return true ;
            }

            return false ;
        }
        return false;
    }

    public function get(){
        
        $this->device_serial = $_POST["device_code"];
        if($this->check_serial()){
            return true ;
        }else{
            return false ;
        }

    }

    

}