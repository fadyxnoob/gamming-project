<?php
include('include/conection.php');
if(isset($_GET['sliderid'])){
    $slider_id      = $_GET['sliderid'];
    $slider_status  = $_GET['status'];

    $status_update = "UPDATE manage_slider SET slider_status = '".$slider_status."' WHERE id = '".$slider_id."'";
    if(mysqli_query($conn,$status_update)){
        echo '<script>window.location.href="manage_slider.php"</script>';
    }else{
        echo "Status Failed";
    }
}
?>