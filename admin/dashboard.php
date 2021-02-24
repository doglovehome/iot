<?php
    session_start();

    if(isset($_SESSION["user_status"])){

        if($_SESSION["user_status"] == "admin"){


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
    <div class="wrapper">

        <?php include './components/sidebar.php' ?>

        <div id="content" class="w-100">

            <?php include './components/navbar.php' ?>

            <main class="container py-3">
                <div class="row">
                    <h2 style="font-size:15px">รายการอุปกรณ์</h2>
                    <div class="col-xl-12 col-12">
                        <div class="box-graph">
                            <table id="data_table" class="table table-bordered table-striped text-center">
                                <thead>
                                  <tr>
                                    <th width="10%">รหัสอุปกรณ์</th>
                                    <th width="40%">Serial Number</th>
                                    <th width="10%">สถานะ</th>
                                    <th width="10%">เจ้าของ</th>
                                    <th width="8%">เปิดการเพิ่ม</th>
                                    <th width="8%">ปิดการเพิ่ม</th>
                                  </tr>
                                </thead>
                              </table>
                              <button class="btn btn-success m-2" id="addnewdevice">เพิ่มอุปกรณ์ใหม่</button>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
        
    


</body>

    <script src="./assets/js/scripts.js"></script>
    
    <script>
        $(document).ready(function(){

            var dataTable = $('#data_table').DataTable({
                "processing":true,
                "serverSide":true,
                "order": [],
                "info":true,   
                "ajax":{
                    url:"./server/fetch-data/fetch-device.php",
                    type:"POST" ,
                },
                "columnDefs": [
                    {             
                        "orderable":false,
                        // targets : [ 8 , 7 , 6 ]
                    }
                ],
                // scrollY:"500px",
                "lengthMenu": [ [10, 25, 50, -1] , [10, 25, 50, "All"] ],
            })//end data table

            $(document).on('click' , '.open' , function(){

                let device_id = $(this).data("id")

                $.ajax({
                    url : '/iot/admin/server/crud/update.php',
                    type : 'POST' ,
                    data : {device_id : device_id , serial_status : 1},
                    success : function(res){
                        if(res == 200){
                            Swal.fire({
                                icon: 'success',
                                timer: 900 ,
                                customClass: 'swal-wide',
                                showConfirmButton: false,
                                title: '<p class=sweet-title>เปิดการใช้งานเรียบร้อย</p>'
                            })
                            dataTable.ajax.reload()
                        }else{
                            alert("fail")
                        }
                    },
                    error : function(){
                        Swal.fire({
                            icon: 'error',
                            timer: 900 ,
                            customClass: 'swal-wide',
                            showConfirmButton: false,
                            title: '<p class=sweet-title>เปิดการใช้งานไม่สำเร็จ</p>'
                        })
                    }
                })
            })

            $(document).on('click' , '.off' , function(){

                let device_id = $(this).data("id")

                $.ajax({
                    url : '/iot/admin/server/crud/update.php',
                    type : 'POST' ,
                    data : {device_id : device_id , serial_status : 0},
                    success : function(res){
                        if(res == 200){
                            Swal.fire({
                                icon: 'success',
                                timer: 900 ,
                                customClass: 'swal-wide',
                                showConfirmButton: false,
                                title: '<p class=sweet-title>ปิดการใช้งานเรียบร้อย</p>'
                            })
                            dataTable.ajax.reload()
                        }else{
                            alert("fail")
                        }
                    },
                    error : function(){
                        Swal.fire({
                            icon: 'error',
                            timer: 900 ,
                            customClass: 'swal-wide',
                            showConfirmButton: false,
                            title: '<p class=sweet-title>ปิดการใช้งานไม่สำเร็จ</p>'
                        })
                    }
                })
            })

            $(document).on('click' , '#addnewdevice' , function(){
                $.ajax({
                    url : '/iot/admin/server/crud/adddevice.php' ,
                    success : function(res){
                        // alert(res)
                        dataTable.ajax.reload()
                    },
                    error : function(){
                        alert("fail")
                    }
                })
            } )

        })
    </script>


</html>


<?php 

}else{
    header('Location: ../login.php');
}
}else{
    header('Location: ../login.php');
}

?>