<?php
    include('include/database.php');
    $myObj = new Database();
    if(isset($_GET['popstatus_id'])){
        $popstatus_id      = $_GET['popstatus_id'];
        $pop_status          = $_GET['pop_status'];

        $myObj->update('manage_products', ['pop_status' => $pop_status], "id = '$popstatus_id'");
        $run = $myObj->getResult();
        if($run){
            echo '<script>window.location.href="manage-products.php"</script>';
        }else{
            echo "Fail";
        }
    }

?>