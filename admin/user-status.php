<?php
     include('include/database.php');
     $myObj = new Database();
     if(isset($_GET['user_id'])){
          $user_id     = $_GET['user_id'];
          $status      = $_GET['status'];
          $myObj->update('manage_players', ['status' => $status], "id = '$user_id'");
          $run = $myObj->getResult();
          if($run){
               // echo "status Changed Success";
               echo '<script>window.location.href="manage_users.php"</script>';
          }else{
               echo "Fail";
          }
     }else{
          if(isset($_GET['ud_id'])){
               $ud_id             = $_GET['ud_id'];
               $ud_status          = $_GET['status'];
               $myObj->update('manage_players', ['status' => $ud_status], "id = '$ud_id'");
               $run = $myObj->getResult();
               if($run){
                    // echo "status Changed Success";
                    echo '<script>window.location.href="index.php"</script>';
               }else{
                    echo "Fail";
               }
          }
}
?>