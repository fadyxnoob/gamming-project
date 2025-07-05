<?php 
session_start(); 

if($_SERVER["REQUEST_METHOD"] == "POST"){ 
    if(isset($_POST['add_to_cart'])){
      if(!isset($_SESSION['player'])){
        $_SESSION['not_login'] ='<div class="alert alert-warning alert-dismissible fade show"   role="alert">
          <strong>Login first!</strong> If you want to buy something.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        echo '<script>window.location.href="login.php"</script>';
      }
        if(isset($_SESSION['cart'])){
           $myitem = array_column($_SESSION['cart'],'item_name');
           if(in_array($_POST['item_name'],$myitem)){
            // if item already added in cart
            echo '<script>
                    alert("Item Already Added");
                </script>';
            echo '<script>window.location.href="shop.php"</script>';
        
           }else{
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count] = array('item_name'=>$_POST['item_name'],'price'=>$_POST['price'],'pd_id'=>$_POST['pd_id'],'user_id'=>$_POST['user_id'],'quantity'=>1);
              ($_SESSION['cart'][$count]);
            // Item first time added msg
            echo '<script>
                  alert("Item Added");
                  window.location.href="my-cart.php";
                  </script>';
           }        
        }else{
          $_SESSION['cart'][0] = array('item_name'=>$_POST['item_name'],'price'=>$_POST['price'],'pd_id'=>$_POST['pd_id'],'user_id'=>$_POST['user_id'],'quantity'=>1);
          // print_r($_SESSION['cart'][0]);
          // item Quantatt increase
          echo '<script>window.location.href="my-cart.php"</script>';
        }
    }
     //update items
     if(isset($_POST['update_quantity'])){
      foreach($_SESSION['cart'] as $key => $value ){
        if($value['item_name'] == $_POST['item_name']){
          $_SESSION['cart'][$key]['quantity']=$_POST['update_quantity'];
           // item Quantatt decrease
          echo '<script>window.location.href="my-cart.php"</script>';
        }
      }
    }
    //script for remove items
    if(isset($_POST['remove_item'])){
      foreach($_SESSION['cart'] as $key => $value ){
        if($value['item_name'] == $_POST['item_name']){
          unset($_SESSION['cart'][$key]);
          $_SESSION['cart'] = array_values($_SESSION['cart']);
          echo '<script>
                  alert("Item Removed");
              </script>';
          echo '<script>window.location.href="shop.php"</script>';
        }
      }
    }
}
?>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>