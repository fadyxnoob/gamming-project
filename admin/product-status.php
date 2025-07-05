<?php
    include('include/database.php');
    $myObj = new Database();
    if(isset($_GET['product_id'])){

        $product_id      = $_GET['product_id'];
        $status          = $_GET['status'];
        $myObj->update('manage_products', ['status' => $status], "id = '$product_id'");
        $run = $myObj->getResult();
        if($run){
            echo '<script>window.location.href="manage-products.php"</script>';
        }else{
            echo "Fail";
        }
    }
?>