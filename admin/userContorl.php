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
                    <h2 style="font-size:15px">จัดการผู้ใช้</h2>
                    <div class="col-xl-12 col-12">
                        <div class="box-graph">
                            <table id="data_table" class="table table-bordered table-striped text-center">
                                <thead>
                                  <tr>
                                    <th width="10%">รหัสผู้ใช้</th>
                                    <th width="10%">Username</th>
                                    <th width="8%">วันที่</th>
                                    <th width="8%">เพิ่ม</th>
                                    <th width="8%">ลบ</th>
                                  </tr>
                                </thead>
                              </table>
                            
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
                    url:"./server/fetch-data/fetch-user.php",
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

        $(document).on('click' , '.accept' , function(){
            
            let user_id = $(this).data("id")
            let status = $(this).data("status")

            $.ajax({
                url : './server/crud/update.php' ,
                type : 'POST' ,
                data : {user_id : user_id , status : status},
                success : function(res){
                    if(res == 200){
                        dataTable.ajax.reload()
                    }
                },
                error : function(){
                    Swal.fire({
                        icon: 'error',
                        timer: 900 ,
                        customClass: 'swal-wide',
                        showConfirmButton: false,
                        title: '<p class=sweet-title>ไม่สามารถเปลี่ยนสถานะได้</p>'
                    })
                }
            })
        })

        $(document).on('click' , '.del' , function(){
            
            let user_id = $(this).data("id")
            let status = $(this).data("status")

            $.ajax({
                url : './server/crud/update.php' ,
                type : 'POST' ,
                data : {user_id : user_id , status : status},
                success : function(res){
                    if(res == 200){
                        dataTable.ajax.reload()
                    }
                },
                error : function(){
                    Swal.fire({
                        icon: 'error',
                        timer: 900 ,
                        customClass: 'swal-wide',
                        showConfirmButton: false,
                        title: '<p class=sweet-title>ไม่ลบผู้ใช้ได้</p>'
                    })
                }
            })
        })
            
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