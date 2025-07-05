<?php
include('include/conection.php');
if(isset($_GET['status_id'])){
     $status_id      = $_GET['status_id'];
     $status          = $_GET['status'];
}
        $status_update = "UPDATE manage_posts SET 
                                                status = '".$status."'
                                                 WHERE id = '".$status_id."'";
        if(mysqli_query($conn,$status_update)){
            // echo "status Changed Success";
            echo '<script>window.location.href="manage-posts.php"</script>';
        }else{
            echo "Fail";
        }
?>
