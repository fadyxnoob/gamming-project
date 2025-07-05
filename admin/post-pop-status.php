<?php
include('include/conection.php');
if(isset($_GET['popstatus_id'])){
     $popstatus_id      = $_GET['popstatus_id'];
     $popstatus          = $_GET['pop_status'];
}
        $status_update = "UPDATE manage_posts SET 
        popular = '".$popstatus."' WHERE id = '".$popstatus_id."' ";
        if(mysqli_query($conn,$status_update)){
            // echo "status Changed Success";
            echo '<script>window.location.href="manage-posts.php"</script>';
        }else{
            echo "Fail";
        }
?>