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
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 py-sm-5 d-flex align-items-center justify-content-center">
                    <a href="./login.php" class="register">Login</a>
                    
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6  col-12 d-flex justify-content-center align-items-center p-0" style="background-color: #FFF;">
                    <div class="form-login">
                        <h1>register</h1>
                        <p class="sub-head">Sing up your account!</p>
                        <form id="form-regis" method="POST">
                            
                            <input type="text" name="username" class="btn-form" placeholder="Username" autocomplete="off" required><br>
                            <input type="text" name="email" class="btn-form" placeholder="Email" autocomplete="off" required><br>
                            <input type="password" name="password" class="btn-form" placeholder="Password" id="password" autocomplete="on" required><br>
                            <input type="password" class="btn-form" name="conpassword" placeholder="Confirm Password" id="conpassword" autocomplete="on" required>
                            <br>
                            <span id="message-err" style="font-size: 11px"></span><br>
                            
                            <button type="submit" id="submit" class="btn-login">Sing In</button><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>

<script>

    $(document).ready(function(){
        $("#submit").on('click' , function(e){
            if($("#password").val() == $("#conpassword").val()){
                return true
            }else{
                $("#message-err").html('Please Check Your password Confirm').css('color', 'red');
                $("#password").val("")
                $("#conpassword").val("")
                return false 
            }
        })
    })
</script>

<?php

    include './components/config/condb.php' ;

    if(isset($_POST["username"])){
        
        $statement = $conn->prepare("INSERT INTO user (username , password , email) VALUES (:user , :pass , :email)");
        $statement->execute(array(
            ':user' => $_POST["username"],
            ':pass' => password_hash($_POST["password"], PASSWORD_DEFAULT),
            ':email' => $_POST["email"]
        ));
        header('Location: login.php');
    }   

?>