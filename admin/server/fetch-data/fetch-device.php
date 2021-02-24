<?php 


    include '../../components/config/condb.php' ;
    include './function.php' ; 

    if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {


            $query = '' ;
            $output = array() ; 
            $query .= "SELECT * FROM device " ;

            if(isset($_POST["search"]["value"])){
                $query .= 'WHERE device_id LIKE "%'.$_POST["search"]["value"].'%" ' ; 
                $query .= 'OR device_serial LIKE "%'.$_POST["search"]["value"].'%" ' ;
            }

            if(isset($_POST["order"])){
                $order = $_POST['order']['0']['column'] + 1 ;
                if($order == 4){
                    $order = $order + 5;
                }elseif($order == 1){
                    $order = $order + 5;
                }

                $query .= 'ORDER BY '.$order.' '.$_POST['order']['0']['dir'].' ';
            }else{
                $query .= 'ORDER BY device_id ASC ';
            }


            if($_POST["length"] != -1){
                $query .= 'LIMIT ' .$_POST['start']. ', ' .$_POST['length'];
            }

            $statement = $conn->prepare($query) ;
            $statement->execute() ;
            $result = $statement->fetchAll() ;

            $data = array() ;
            $filtered_rows = $statement->rowCount() ;

            foreach( $result as $row ){
                
                $sub_array = array() ;
                
                $sub_array[] = $row["device_id"] ;
                $sub_array[] = $row["device_serial"] ;

                if($row["serial_status"] == 1){
                    $sub_array[] = '<span class="text-success">เปิดใช้งาน</span>' ;
                }else{
                    $sub_array[] = '<span class="text-danger">ปิดใช้งาน</span>' ;
                }

                if($row["user_owner"] != null){
                    $sub_array[] = '<span class="text-success">มีเจ้าของ</span>' ;
                }else{
                    $sub_array[] = '<span class="text-danger">ยังไม่มีเจ้าของ</span>' ;
                }
                
                $sub_array[] = '<button class="btn btn-warning open" data-id="'.$row["device_id"].'">เปิด</button>' ;
                $sub_array[] = '<button class="btn btn-danger off"  data-id="'.$row["device_id"].'">ปิด</button>' ;
                $sub_array[] = '<a href="#"><button class="btn btn-success">Add</button></a>' ;
                        
                $data[] = $sub_array;
            }

            $output = array(
                "draw"              =>  intval($_POST["draw"]),
                "recordsTotal"      =>  $filtered_rows,
                "recordsFiltered"   =>  get_total_all_records_device(),
                "data"              =>  $data
            );

            echo json_encode($output);
            
        }
        $conn=null ;
    
?>