<?php

    include './components/config/condb.php';
    include './class/Listdevice.php';

    $mydevice = new mydevice($conn);

    $mydevice->get_user()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- การลิ้ง sweetalert2 เเบบ cdn  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>   
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


    <?php include './components/link.php' ?>
</head>
<body>
    
    
    <div class="container-fluid">

        <?php include './components/navbar.php' ?>

        <main>
            <div class="container-fluid">
                <div class="row py-5">

                    <?php $mydevice->show_device() ?>
                    
                </div>
            </div>
            

        </main>

        <footer>
            <button class="box-adddevice" data-bs-toggle="modal" data-bs-target="#adddevice">
                <i class="fas fa-plus-circle"></i>
            </button>     
        </footer>

    </div>




    <div class="modal fade" id="changename" tabindex="-1">
        <div class="modal-dialog">
            <form id="form-edit">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">แก้ไขชื่ออุปกรณ์</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <label class="input-modal">ชื่ออุปกรณ์</label>
                    <input class="form-control form-control-sm" type="text" placeholder="ชื่ออุปกรณ์ที่ต้องการตั่ง" id="device_name">

                </div>
                <div class="modal-footer">
                    <input type="hidden" id="device_id" value="">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" id="submit-edit" class="btn btn-primary">ยืนยัน</button>
                </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="adddevice" tabindex="-1">
        <div class="modal-dialog">
            <form id="form-add">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">เพิ่มอุปกรณ์</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <label class="input-modal">รหัสอุปกรณ์</label>
                    <input class="form-control form-control-sm" type="text" placeholder="รหัสข้างอุปกรณ์" id="device_code">
                    <label class="input-modal">ชื่ออุปกรณ์</label>
                    <input class="form-control form-control-sm" type="text" placeholder="ชื่ออุปกรณ์ที่ต้องการตั่ง" id="device_nameadd">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" id="submit-add" class="btn btn-primary">ยืนยัน</button>
                </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="grap" tabindex="-1">
        <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">กราฟแสดงค่า</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <div id="chart-container">
                        <canvas id="graphCanvas"></canvas>
                    </div>
                </div>
            
        </div>
    </div>


</body>
</html>


<script>
    $(document).ready(function(){
        $(".chart").on('click' , function(){
            let device_id = $(this).data("device_id")
            
            let date = [];
            let moisture = [];

            $.ajax({
                url : '/iot/server-api/chart/data-grap.php' ,
                type : 'POST' ,
                data : {device_id : device_id},
                success : function(res){
                    for(let i in res){
                        date.push(res[i].chart_date)
                        moisture.push(res[i].chart_moisture)
                    }

                    let chartdata = {
                        labels: date,
                        datasets: [{
                                label: 'Moisture',
                                backgroundColor: 'transparent',
                                borderColor: '#46d5f1',
                                // hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: moisture
                        }]
                    };
                    let graphTarget = $('#graphCanvas');
                    let barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata,
                        options: {
                            scales: {
                                yAxes: [{
                                    stacked: true
                                }]
                            }
                        }
                    })
                }
            })
        })
    })
</script>

<script src="./assets/js/scripts.js"></script>