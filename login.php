<?php
    session_start();
    unset($_SESSION['user_id']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- cdn bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.min.js" integrity="sha512-ZvbjbJnytX9Sa03/AcbP/nh9K95tar4R0IAxTS2gh2ChiInefr1r7EpnVClpTWUEN7VarvEsH3quvkY1h0dAFg==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css" integrity="sha512-thoh2veB35ojlAhyYZC0eaztTAUhxLvSZlWrNtlV01njqs/UdY3421Jg7lX0Gq9SRdGVQeL8xeBp9x1IPyL1wQ==" crossorigin="anonymous" />
    <!-- cdn fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

    
    <link rel="stylesheet" href="./assets/css/login.css">

    <title>LOGIN</title>
</head>
<body>
    
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="wrapper">
            <div class="row m-0 p-0">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex align-items-center justify-content-center">
                    <a href="./Register.php" class="register">Register</a>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6  col-12 d-flex justify-content-center align-items-center p-0" style="background-color: #FFF;">
                    <div class="form-login">
                        <h1>login</h1>
                        <p class="sub-head">Sing in your account!</p>
                        <form action="#" method="POST">
                            
                            <input type="text" name="username" class="btn-form" placeholder="Enter username" autocomplete="off"><br>
                            <input type="password" name="password" class="btn-form" placeholder="Enter password" autocomplete="on">
                            <br>
                            <span id="message-err" style="font-size: 11px"></span><br>
                            <a href="forgot.php" class="sub-forget">For got Password?</a>
                            <button type="submit" class="btn-login">Sing In</button><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>

<?php 

     if(isset($_POST['username'])){
        
        include_once "./components/config/condb.php";

        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $statement = $conn->prepare("SELECT * FROM user WHERE username = :user ");
        $statement->execute(
            array(
                ':user' => $username
            )
        );

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if($statement->rowCount() > 0){
            if($row["user_allow"] == 1){
                if($row["username"] == $username){
                    if(password_verify($password , $row["password"])){

                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['user_status'] = $row['user_status'];
                        $_SESSION['username'] = $row['username'];
                        if($row['user_status'] == "admin"){
                            echo "<script> window.location.href =  './admin/dashboard.php';  </script>";
                        }else{
                            echo "<script> window.location.href =  './index.php';  </script>";
                        }
                    }else{
                        
                    }
                }
            }
        }
        
    }

?>

</html>