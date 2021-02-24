<?php 


    include '../../components/config/condb.php' ;
    include './function.php' ; 

    if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {


            $query = '' ;
            $output = array() ; 
            $query .= "SELECT * FROM user WHERE user_allow = 0 " ;

            if(isset($_POST["search"]["value"])){
                $query .= 'and username LIKE "%'.$_POST["search"]["value"].'%" ' ; 
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
                $query .= 'ORDER BY date ASC ';
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
                
                $sub_array[] = $row["user_id"] ;
                $sub_array[] = $row["username"] ;
                $sub_array[] = $row["date"] ;
                $sub_array[] = '<button class="btn btn-success accept" data-id="'.$row["user_id"].'" data-status="allow">อนุญาติ</button>' ;
                $sub_array[] = '<button class="btn btn-danger del" data-id="'.$row["user_id"].'" data-status="notallow">ไม่อนุญาติ</button>' ;
                        
                $data[] = $sub_array;
            }

            $output = array(
                "draw"              =>  intval($_POST["draw"]),
                "recordsTotal"      =>  $filtered_rows,
                "recordsFiltered"   =>  get_total_all_records_user(),
                "data"              =>  $data
            );

            echo json_encode($output);
            
        }
        $conn=null ;
    
?>