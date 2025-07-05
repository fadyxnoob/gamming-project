<?php
  include('include/database.php');
  $myObj = new Database();
  if(isset($_GET['member_id'])){
    $member_id = $_GET ['member_id'];

    $myObj->delete('manage_our_team', "id = '$member_id'");
    $run = $myObj->getResult();
    if($run){
      echo '<script>window.location.href="manage-team.php"</script>';
    }else{
        echo "Deletion Fail";
    }
  }

?>