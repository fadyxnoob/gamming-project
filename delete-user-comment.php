<?php
include('admin/include/database.php');
$myObj = new Database();
if (isset($_GET['com_id'])) {
    $com_id = $_GET['com_id'];

    $myObj->sql("SELECT * FROM comments");
    $run = $myObj->getResult();
    if ($run > 0) {
        foreach ($run as $result) {
            $id = $result["product_id"];
        }
    }

    if (isset($_SESSION['SP_id'])) {
        $single_Product = $_SESSION['SP_id'];
    }

    $myObj->delete('comments', "id = '$com_id' ");
    $run = $myObj->getResult();
    if ($run) {
        echo '<script>window.location.href="single-product.php?spro_id=' . $id . '"</script>';
    } else {
        echo "Deletion Fail";
    }
} else {
    if (isset($_GET['com_id2'])) {
        $myObj->sql("SELECT * FROM comments");
        $run = $myObj->getResult();
        if ($run > 0) {
            foreach ($run as $result) {
                $p_id = $result["post_id"];
            }
        }

        $com_id2 = $_GET['com_id2'];
        if (isset($_SESSION['SP_id'])) {
            $single_Product = $_SESSION['SP_id'];
        }

        $myObj->delete('comments', "id = '$com_id2' ");
        $run = $myObj->getResult();
        if ($run) {
            echo '<script>window.location.href="single-post.php?post_id=' . $p_id . '"</script>';
        } else {
            echo "Deletion Fail";
        }
    }
}
