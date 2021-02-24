$(document).ready(function() {
    
    let status = null ;

    $(".btn-update ").on('click' , function() {
        let device_id = $(this).data("device_id")
        let device_status = $(this).data("device_status")

        $.ajax({
            url : '/iot/server-api/update.php' ,
            type : 'POST' ,
            data : {device_id : device_id , device_status : device_status} ,
            datatype : 'json' ,
            beforeSend: function() {
                swal.fire({
                    title: 'Please Wait !',
                    html: '<h5>กำลังจัดการ</h5>',
                    showConfirmButton: false,
                    timer: 900 ,
                    allowOutsideClick: false,
                    onRender: function() {
                        Swal.showLoading()
                    }
                });
            },
            success: function (res) {
                if(res == 200){
                    Swal.fire({
                        icon: 'success',
                        timer: 900 ,
                        customClass: 'swal-wide',
                        showConfirmButton: false,
                        title: '<p class=sweet-title>ทำการแก้ไขสถานะเรียบร้อย</p>'
                    })
                    device_status == 1 ? $("#"+device_id).html("เปิด") : $("#"+device_id).html("ปิด")
                }
            },
            error : function () {
                alert("fail")
            }
        })
    })

    $(".change-name").on('click' , function (e) {
        let device_id = $(this).data("device_id")
        $("#device_id").val(device_id)
    })

    $("#submit-edit").on('click' , function (e) {
        if($("#device_name").val() == "") {
            $("#device_name").addClass("is-invalid") 
            return false
        }
        else {
            $("#device_name").removeClass("is-invalid")
            return true
        } 
    })

    $("#form-edit").on('submit' , function (e) {
        e.preventDefault();

        let device_id = $("#device_id").val()
        let device_name = $("#device_name").val()

        $.ajax({
            url : '/iot/server-api/update.php',
            type : 'POST' ,
            data : {device_id : device_id , device_name : device_name} ,
            beforeSend: function() {
                swal.fire({
                    title: 'Please Wait !',
                    html: '<h5>กำลังจัดการ</h5>',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    onRender: function() {
                        Swal.showLoading()
                    }
                });
            },
            success : function (res) {
                if(res == 200){
                    Swal.fire({
                        icon: 'success',
                        timer: 900 ,
                        customClass: 'swal-wide',
                        showConfirmButton: false,
                        title: '<p class=sweet-title>ทำการแก้ไขเรียบร้อย</p>'
                    })
                    $("#changename").modal('hide')
                    window.location.href =  './index.php';
                }
            }
            
        })
    })


    $("#submit-add").on('click' , function (e) {
        if($("#device_nameadd").val() == "" || $("#device_nameadd").val() == "") {
            $("#device_nameadd").val() == "" ? $("#device_nameadd").addClass("is-invalid") : $("#device_nameadd").removeClass("is-invalid")
            $("#device_code").val() == "" ? $("#device_code").addClass("is-invalid") : $("#device_code").removeClass("is-invalid")
            return false
        }
        else {
            $("#device_nameadd").removeClass("is-invalid")
            $("#device_code").removeClass("is-invalid")
            return true
        } 
    })

    $("#form-add").on('submit' , function (e) {
        e.preventDefault()

        let device_name = $("#device_nameadd").val()
        let device_code = $("#device_code").val()
        $.ajax({
            url : '/iot/server-api/add.php' ,
            type : 'POST' , 
            data : { device_name : device_name , device_code : device_code} ,
            success : function (res) {
                if(res == 200){
                    Swal.fire({
                        icon: 'success',
                        customClass: 'swal-wide',
                        showConfirmButton: false,
                        title: '<p class=sweet-title>ทำการแก้ไขเรียบร้อย</p>'
                    })
                    window.location.href =  './index.php';
                }else{
                    Swal.fire({
                        icon: 'error',
                        timer: 900 ,
                        customClass: 'swal-wide',
                        showConfirmButton: false,
                        title: '<p class=sweet-title>ไม่อนุญาติให้เพิ่มอุปกรณ์</p>'
                    })
                }
            },
            error : function () {
                alert("fail")
            }
        })
    })

})