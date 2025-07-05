<?php
  include('include/database.php');
  $myObj = new Database();

  if(isset($_GET['post_id'])){
    $post_id = $_GET ['post_id'];

    $myObj->delete('manage_posts', "id = '$post_id'");
    $run = $myObj->getResult(); 
    if($run){
      echo '<script>window.location.href="manage-posts.php"</script>';
    }else{
        echo "Deletion Fail";
    }
  }

?>
