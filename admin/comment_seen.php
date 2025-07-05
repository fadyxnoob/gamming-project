<?php
include('include/conection.php');

if (isset($_POST['data'])) {
    // Check for unseen comments and return the count
    $query = "SELECT * FROM `comments` WHERE `status` = 'unseen'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        echo $count;
    } else {
        echo '0';
    }
} else{
    if (isset($_POST['update'])){
        $query = "UPDATE `comments` SET `status` = 'seen' WHERE `status` = 'unseen' ";
        $result = mysqli_query($conn, $query);
    
        if ($result) {
            echo 'Status updated to "seen"';

        } else {
            echo 'Error updating status: ' . mysqli_error($conn);
        }
    }
}
?>