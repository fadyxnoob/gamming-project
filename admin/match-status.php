<?php
     include('include/database.php');
     $myObj = new Database();
     if(isset($_GET['match_id'])){
          $match_id             = $_GET['match_id'];
          $match_status         = $_GET['status'];

          $myObj->update('manage_match', ['status' => $match_status], "id = '$match_id'");
          $run = $myObj->getResult();
          print_r($run);
          if($run){
               echo "status Changed Success";
               echo '<script>window.location.href="manage-upcomming-match.php"</script>';
          }else{
               echo "Fail";
          }
     }else{
          if(isset($_GET['match_played'])){
               $played_id             = $_GET['match_played'];
               $status                = $_GET['status'];

               $myObj->update('manage_match', ['status' => $status], "id = '$played_id'");
               $run = $myObj->getResult();
               if($run){
                    echo "status Changed Success";
                    echo '<script>window.location.href="manage-current-match.php"</script>';
               }else{
                    echo "Fail";
               }
          }
     }
?>