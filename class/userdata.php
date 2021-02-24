<?php

class userdata {

    public function __construct($pdo)
    {
        $this->conn = $pdo ;
    }

    private function check_session(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    private function getdata_user(){
        $statement = $this->$conn->prepare("SELECT * FROM user WHERE user_id = :user");
        $statement->execute(array(
            ':user' => $_SESSION["user_id"]
        ));

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function check_Auth(){
        
        $this->check_session();
        if(isset($_SESSION["user_id"])){
            $this->user_id = $_SESSION["user_id"];

            return $this->getdata_user();

        }else{
            header('Location: login.php');
        }
    }

    

}