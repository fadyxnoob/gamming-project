<?php
    include('include/database.php');
    $myObj = new Database();
    if(isset($_GET['c_id'])){
        $c_id             = $_GET['c_id'];
        $status          = $_GET['status'];
        $myObj->update('manage_candidate', ['status' => $status], "id = '$c_id'");
        
        if($myObj->getResult()){
            // echo "status Changed Success";
            echo '<script>window.location.href="manage-candidate.php"</script>';
        }else{
            echo "Fail";
        }

    }else{

        if(isset($_GET['DC_id'])){
            $DC_id             = $_GET['DC_id'];
            $DC_id_status          = $_GET['status'];

            $myObj->update('manage_candidate', ['status' => $DC_id_status], "id = '$DC_id'");
            if($myObj->getResult()){
                // echo "status Changed Success";
                echo '<script>window.location.href="index.php"</script>';
            }else{
                echo "Fail";
            }
        }

    }
?>