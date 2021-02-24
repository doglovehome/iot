<?php

    session_start();
    if(isset($_SESSION["user_id"])){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php include './components/link.php' ?>
</head>
<body>
    
    
    <div class="container-fluid">

        <?php include './components/navbar.php' ?>

        <main>
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-6">
                        <div class="card p-3">
                            <div class="card-header text-center">
                                คู่มือการใช้งาน
                            </div>
                            <div class="card-body text-center">
                                <img src="/iot/assets/bg.png" class="image-example">
                                <p>1.กดปุ่ม เพื่อเพิ่มอุปกรณ์</p>
                                <img src="/iot/assets/bg.png" class="image-example">
                                <p>2.นำรหัสโค๊ดและเลขที่ พร้อมชื่อที่ต้องการ หลังอุปกรณ์มากรอกใส่</p>
                                <p>3.กดยืนยัน เป็นอันเรียบร้อย</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>

        <footer>
             
        </footer>

    </div>




</body>
</html>

<?php

    }else{ 
        header('Location: login.php');
    }
?>
