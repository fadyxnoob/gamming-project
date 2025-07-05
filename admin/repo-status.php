<?php
    include('include/database.php');
    $myObj = new Database();
    if(isset($_GET['repo_id'])){
        $repo_id   = $_GET['repo_id'];
        $status    = $_GET['status'];

        $myObj->update('manage_reports', ['status' => $status], "id = '$repo_id' ");
        $run = $myObj->getResult();
        if($run){
            echo '<script>window.location.href="manage-reports.php"</script>';
        }else{
            echo "Fail";
        }
    }else{
        if(isset($_GET['DR_id'])){
            $DR_id      = $_GET['DR_id'];
            $DR_status          = $_GET['status'];
            $myObj->update('manage_reports', ['status' => $DR_status], "id = '$DR_id' ");
            $run = $myObj->getResult();
            if($run){
                echo '<script>window.location.href="index.php"</script>';
            }else{
                echo "Fail";
            }
        }
    }
?>