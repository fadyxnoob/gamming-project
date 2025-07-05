<?php
session_start();
include('user/include/connection.php');
// session_destroy();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['order'])){
        $O_name    = mysqli_real_escape_string($conn, $_POST['name']);
        $O_mail    = mysqli_real_escape_string($conn, $_POST['email']);
        $O_phone   = mysqli_real_escape_string($conn, $_POST['phone']);
        $O_postal  = mysqli_real_escape_string($conn, $_POST['postal']);
        $O_address = mysqli_real_escape_string($conn, $_POST['address']);

        if($_POST['name'] == '' && $_POST['email'] == '' && $_POST['phone'] == '' && $_POST['postal'] == '' && $_POST['address'] == ''){
            echo "<script>
                 alert('Fill the form');
                window.location.href='my-cart.php';
            </script>";
        }else{
            if(isset($_SESSION['cart'])){
            $query = "INSERT INTO manage_order (`name`, `email`, `phone`, `postal`, `address`)
                VALUES ('".$O_name."','".$O_mail."','".$O_phone."','".$O_postal."','".$O_address."')";
            if(mysqli_query($conn,$query)){
                $status = "Pending";
                $orderid    = mysqli_insert_id($conn);

                $query1     = "INSERT INTO `user_orders`(`order_id`, `item_name`, `price`, `quantity`,`status`,`pd_id`,`user_id`) VALUES (?,?,?,?,?,?,?)";
                $stmt  = mysqli_prepare($conn,$query1);

                if($stmt){
                    mysqli_stmt_bind_param($stmt,"isiisii",$orderid,$item_name,$price,$quantity,$status,$pd_id,$user_id);
                    foreach($_SESSION['cart'] as $key => $values)
                    {
                        $item_name = $values['item_name'];
                        $price     = $values['price'];
                        $quantity  = $values['quantity'];
                        $pd_id     = $values['pd_id'];
                        $user_id     = $values['user_id'];
                        $chk =  mysqli_stmt_execute($stmt);
                    }
                    unset($_SESSION['cart']);
                    echo "<script>
                                alert('Order Placed');
                                window.location.href='manage-orders.php';
                            </script>";
                }else{
                    echo "<script>
                                alert('SQL Query Prepare error');
                                window.location.href='my-cart.php';
                            </script>";
                }
            }else{
                echo "<script>
                                alert('SQL Query error');
                                window.location.href='my-cart.php';
                            </script>";
            }
        }
        }
    }
}
?>