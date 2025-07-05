<?php
  include('include/database.php');
  $myObj = new Database();

  if(isset($_GET['catid'])){
    $cat_id = $_GET ['catid'];

    $myObj->delete('manage_categories', "id = '$cat_id'");
    $run = $myObj->getResult();
    if($run){
      echo '<script>window.location.href="manage-categories.php"</script>';
    }else{
        echo "Deletion Fail";
    }
  }
  

?>