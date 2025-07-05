<?php
  include('include/database.php');
  $myObj = new Database();
  if(isset($_GET['cmt_id'])){
    $id = $_GET ['cmt_id'];

    $myObj->delete('comments', "id = '$id'");
    $run = $myObj->getResult();
    if($run){
      echo '<script>window.location.href="manage-comments.php"</script>';
    }else{
      echo "Deletion Fail";
    }
  }

?>