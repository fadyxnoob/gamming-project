<?php
    include('include/database.php');
    $myObj = new Database();
    if(isset($_GET['eventid'])){
        $id      = $_GET['eventid'];
        $thumb_status  = $_GET['status'];
        $myObj->update('manage_live_stream', ['status' => $thumb_status], "id = '$id'");
        $run = $myObj->getResult();
        if($run){
            echo '<script>window.location.href="manage-live-stream.php"</script>';
        }else{
            echo "Fail";
        }
    }
?>