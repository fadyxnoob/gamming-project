<?php 
    include('include\header.php');
    include('include\sidebar.php');
    $orders = '';              
    // fetch data from tbl
    $myObj->select('user_orders', '*', "status = 'Completed'", null, null);
    $data   = $myObj->getResult();
    if($data > 0){
        $serial = 0;
        foreach($data as $row){
            $serial++;
            $order_id     = $row['order_id'];   
            $item_name    = $row['item_name'];
            $price        = $row['price'];
            $quantity     = $row['quantity'];
            $status       = $row['status'];
            $pd_id        = $row['pd_id'];
    
            //    fetching buyer name
            $myObj->select('manage_order', '*', "id = '$order_id'", null, null);
            $buyer_data   = $myObj->getResult();
            if($buyer_data > 0){
                foreach($buyer_data as $buyer_row){
                    $Buyer_Name   = $buyer_row["name"];
                }
            }
            
            $myObj->select('manage_products', '*', "id = '$pd_id'", null, null);
            $Dpd_id   = $myObj->getResult();
            if($Dpd_id > 0){
                foreach($Dpd_id as $rowPd_id){
                    $img ='<img src="assets/upload/'.$rowPd_id['image'].'" width="50px" height="50px">';
                }
            }
    
            //Change Active Status
            if($status == 'Pending'){
                $status_btn = '<a href="order-status.php?order_id='.$order_id.'&status=Completed" class="btn btn-warning"><i class="fa-solid fa-wifi"></i></a>';
            }else{
                $status_btn ='<a href="order-status.php?order_id='.$order_id.'&status=Pending" class="btn btn-success"><i class="fa-solid fa-wifi"></i></a>';
            }
            
            $orders .='<tr>
                <td>'.$serial.'      </td>
                <td>'.$Buyer_Name.'  </td>
                <td>'.$item_name.'   </td>
                <td>'.$price.'       </td>
                <td>'.$quantity.'    </td>
                <td>'.$status_btn.'  </td> 
                <td>'.$img.'         </td> 
            </tr>';
        }
    }

?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Completed Orders</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Status</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $orders; ?>
                    </tbody>
                </table>
            </div>
        </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>