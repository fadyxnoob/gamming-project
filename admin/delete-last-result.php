<?php
  include('include/database.php');
  $myObj = new Database();
  if(isset($_GET['match_id'])){
    $match_id = $_GET ['match_id'];

    $myObj->delete('last_result', "id = '$match_id'");
    $run = $myObj->getResult();
    if($run){
      echo '<script>window.location.href="manage-results.php"</script>';
    }else{
        echo "Deletion Fail";
    }
  }

?>