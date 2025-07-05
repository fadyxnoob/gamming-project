<?php
    include('include/database.php');
    $myObj = new Database();
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        // Delete the product
        $myObj->delete('manage_products', "d = '$product_id'");
        $run = $myObj->getResult();
        if($run){
            echo '<script>window.location.href="manage-products.php"</script>';
        }else{
            echo "Fail";
        }
    }
?>
