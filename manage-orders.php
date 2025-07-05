<?php 
    // session_start();
    include('user/include/connection.php');
    include('user/include/header.php');
    if(isset($_SESSION['player'])){
        $user_id = $_SESSION['player'];
    }else{
        echo'<script>
            window.location.href="login.php"
        </script>';
    }
    $orders = '';              
        // fetch data from tbl
       $fetch  = "SELECT * FROM user_orders where user_id = '".$user_id."'";
        $data   = mysqli_query($conn,$fetch);
        $serial = 0;
        while($row        = mysqli_fetch_array($data)){
            $serial       = $serial + 1;
            $order_id     = $row['order_id'];   
            $item_name    = $row['item_name'];
            $price        = $row['price'];
            $quantity     = $row['quantity'];
            $status       = $row['status'];
            $pd_id        = $row['pd_id'];

            //    fetching buyer name
            $buyer_name  = "SELECT * FROM manage_order where id = '".$order_id."' ";
            $buyer_data   = mysqli_query($conn,$buyer_name);
            $buyer_row    = mysqli_fetch_array($buyer_data);
            $Buyer_Name   = $buyer_row["name"];

            $Fpd_id  = "SELECT * FROM manage_products where id = '".$pd_id."' ";
            $Dpd_id   = mysqli_query($conn,$Fpd_id);
            $rowPd_id    = mysqli_fetch_array($Dpd_id);
            $img ='<img src="admin/assets/upload/'.$rowPd_id['image'].'" width="50px" height="50px">';

            //Change Active Status
            if($status == 'Pending'){
                $status_btn = '<p class="bg-warning px-1 w-50 py-2 mt-1 rounded-pill text-center">Pending</p>';
            }else{
                $status_btn = '<p class="bg-success px-1 w-50 py-2 mt-1 rounded-pill text-center text-light">Completed</p>';
            }
            $orders .='<tr>
                            <td>'.$serial.'     </td>
                            <td>'.$item_name.'   </td>
                            <td>'.$price.'      </td>
                            <td>'.$quantity.'       </td>
                            <td>'.$status_btn.' </td> 
                            <td>'.$img.'        </td> 
                        </tr>';
      }
?>
<!-- ===== MAIN START ===== -->
<div class="container-fluid mb-5">
    <div class="container">
        <h1 class="mt-4 text-center title">My Orders</h1>
        <div class="row">
            <div class="col p-1 pb-0">
                <table cellpadding="0" cellspacing="0" border="0" id="user_table" class="Box_Shadow w-100">
                    <thead class="Box_Shadow">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Status</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content Box_Shadow">
                <table>
                    <tbody>
                        <?php 
                            if($orders == ''){
                                echo '<h1 class="title text-center mt-5">NO Order Found!</h1>';
                            }else{
                                echo $orders;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
$(window)
    .on("load resize ", function() {
        var scrollWidth =
            $(".tbl-content").width() - $(".tbl-content table").width();
        $(".tbl-header").css({
            "padding-right": scrollWidth
        });
    })
    .resize();
</script>
<!-- ===== MAIN END ===== -->
<?php include('user\include\footer.php') ?>