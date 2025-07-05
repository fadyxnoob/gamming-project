<?php
  include('include/database.php');
  $myObj = new Database();
  if(isset($_GET['Final_id'])){
    $Final_id = $_GET ['Final_id'];

    $myObj->delete('final_winners', "id = '$Final_id'");
    $run = $myObj->getResult();
    if($run){
      echo '<script>window.location.href="manage-Fwinners.php"</script>';
    }else{
        echo "Deletion Fail";
    }
  }

?>