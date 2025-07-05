<?php 
    include('include\header.php');
    include('include\sidebar.php');

    $product_id = $mcat_name = $popstatus_btn = $mcat_id = $category =  $product =  $cat_name =  $popstatus_id =  $user_id = '';
    if(isset($_SESSION['login'])){
        $user_id = $_SESSION['login'];   

        //    fetch data from tbl
        $myObj->select('manage_products', '*', "author = '$user_id' ", 'id DESC', null);
        $data   = $myObj->getResult();
        if (!$data) {
            die("Query failed: " . mysqli_error($conn));
        }
        $serial = 0;
        foreach($data as $row){
            $serial       = $serial + 1;
            $product_id   = $row['id'];   
            $name         = $row['name'];
            $cate_id      = $row['cate'];
            $price        = $row['price'];
            $disc         = $row['disc'];
            $status       = $row['status'];
            $pop_status   = $row['pop_status'];
            $img ='<img src="assets/upload/'.$row['image'].'" width="50px" height="50px">';
       
            //Change popylar Status
            if($pop_status == 'Popular'){
                $popstatus_btn = '<a href="pop_product.php?popstatus_id='.$product_id.'&pop_status=Un-Popular" class="btn btn-success">
                <i class="fa-solid fa-wifi bg-success"></i></a>';
            }else{
                $popstatus_btn ='<a href="pop_product.php?popstatus_id='.$product_id.'&pop_status=Popular" class="btn btn-danger">
                <i class="fa-solid fa-wifi bg-dange "></i></a>';
            }

            //Change Active Status
            if($status == 'Active'){
                $status_btn = '<a href="product-status.php?product_id='.$product_id.'&status=De-Active" class="btn btn-success"><i class="fa-solid fa-wifi"></i></a>';
            }else{
                $status_btn ='<a href="product-status.php?product_id='.$product_id.'&status=Active" class="btn btn-danger"><i class="fa-solid fa-wifi"></i></a>';
            }
            
            // fetch category
            $myObj->select('manage_categories', '*', "id = '$cate_id'", null, null);
            $data2   = $myObj->getResult();
            if($data2 >0 ){
                foreach($data2 as $row2){
                    $mcat_name  = $row2['cat_name'];
                }
            }
   
            $product .='<tr>
                <td>'.$serial.'     </td>
                <td>'.$name.'       </td>
                <td>'.$mcat_name.'   </td>
                <td>'.$price.'      </td>
                <td>'.$disc.'       </td>
                <td>'.$status_btn.' </td> 
                <td>'.$popstatus_btn.' </td> 
                <td>'.$img.'        </td> 
                <td>    
                    <a href="update-product.php?product_id='.$product_id.'" class="btn bg-info">
                    <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
                <td> 
                    <a href="delete-product.php?product_id='.$product_id.'"class="btn bg-warning">
                    <i class="fa-solid fa-trash"></i>
                    </a> 
                </td>
            </tr>';
      }
    }  
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Manage Products</li>
        </ol>
        <div class="row">
            <div class="col text-end mb-3">
                <a href="add-product.php" type="button" class="SignUp-Btn text-decoration-none">
                    <span data-feather="calendar"></span>
                    Add Product
                </a>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Populer</th>
                                <th scope="col">Image</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if($product == ''){
                                    echo'<div class="alert alert-warning d-flex align-items-center justify-content-between p-0 ps-2 fs-5" role="alert">
                                    We did not found your post <a href="add-product.php" class="alert-link SignUp-Btn text-decoration-none">View more </a>
                                </div>';
                                }else{
                                    echo $product;
                                }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>