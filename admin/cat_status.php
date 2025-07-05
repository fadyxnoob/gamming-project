<?php
include('include/conection.php');
if(isset($_GET['caid'])){
     $cat_id      = $_GET['caid'];
    $cat_status  = $_GET['status'];
}
$status_update = "UPDATE manage_categories SET cat_status = '".$cat_status."' WHERE id = '".$cat_id."' ";
if(mysqli_query($conn,$status_update)){
    echo '<script>window.location.href="manage-categories.php"</script>';
}else{
    echo "Fail";
}
?>