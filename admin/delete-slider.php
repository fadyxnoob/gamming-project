  <?php
  include('include/conection.php');
  if(isset($_GET['sliderid'])){
    $slider_id = $_GET ['sliderid'];

    $select = "SELECT * FROM manage_slider  WHERE id ='".$slider_id."'";
    $run1   =  mysqli_query($conn,$select);
    while($row = mysqli_fetch_array($run1)){
          $sliderImg = $row['img'];
    }

    $delete ="DELETE FROM `manage_slider` WHERE id ='".$slider_id."'";
    $run =mysqli_query($conn,$delete);
    if($run){
      unlink('assets/upload/'.$sliderImg);
      echo '<script>window.location.href="manage_slider.php"</script>';
    }else{
        echo "Deletion Fail";
    }
  }
?>