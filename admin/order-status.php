<?php
     include('include/database.php');
     $myObj = new Database();
     if(isset($_GET['order_id'])){

          $order_id = $_GET['order_id'];
          $status   = $_GET['status'];

          $myObj->update('user_orders', ['status' => $status], "order_id = '$order_id'");
          $run = $myObj->getResult();
          if($run){
               echo '<script>window.location.href="manage-orders.php"</script>';
          }else{
               echo "Fail";
          }

     }else{

          if(isset($_GET['cpo_stts'])){
               $cpo_sttsid             = $_GET['cpo_stts'];
               $cpo_stts_sttts          = $_GET['status'];
               $myObj->update('user_orders', ['status' => $cpo_stts_sttts], "order_id = '$cpo_sttsid'");
               $run = $myObj->getResult();
               if($run){
                    echo '<script>window.location.href="index.php"</script>';
               }else{
                    echo "Fail";
               }
          }

     }
?>
