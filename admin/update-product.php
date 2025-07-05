<?php
    include('include/header.php');
    include('include/sidebar.php');
    $cat_name =  $data_msg = $sub_id  = $pro_cat = $min_cat =  $Category = '';
    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];

        // fetch data
        $myObj->select('manage_products', '*', "id = '$product_id'");
        $run   = $myObj->getResult();
        if($run > 0){
            foreach($run as $row){
                $img = $row['image'];
                $ab_img ='<img src="assets/upload/'.$img.'" alt="image" width="100px" height="100px">'; 
            }
        }

        
    }

    $myObj->select('manage_categories', '*', "type = 'Product'", null, null);
    $run     = $myObj->getResult();
    if($run){
        foreach($run as $row1){
            $cat_id     = $row1['id'];
            $cat_name   = $row1['cat_name'];
            $Category  .='<option value="'.$cat_id.'">'.$cat_name.'</option>';
        }
    }
    
    // update product
    if(isset($_POST['update'])){
        $name     = $myObj->escapeString($_POST['name']);
        $Category = $myObj->escapeString($_POST['Category']);
        $price    = $myObj->escapeString($_POST['price']);
        $disc     = $myObj->escapeString($_POST['disc']);
        $img_name = $_FILES['img']['name'];
        $img_old  = $_FILES['img']['name'];
        $tmp_name = $_FILES['img']['tmp_name'];
        $path     = "assets/upload/.$img_name";
        
        if($img_old == ''){
            $params = [
                'name'  => $name,
                'cate'  => $Category,
                'price' => $price,
                'disc'  => $disc 
            ];
            $myObj->update('manage_products', $params, "id = '$product_id' ");
            $update_run = $myObj->getResult();
        }else{
            $params = [
                'name'  => $name,
                'cate'  => $Category,
                'price' => $price,
                'disc'  => $disc, 
                'img'   => $img_name
            ];
            $myObj->update('manage_products', $params, "id = '$product_id' ");
            $update_run = $myObj->getResult();
        }   

        if($update_run){
            // echo "Product Updated";
            echo '<script>window.location.href="manage-products.php"</script>';
        } else{
            echo "Product Updaring fail";
        }
    }
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <div class="container">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Update Product</li>
            </ol>
            <div class="row">
                <div class="col">
                <form method="POST" enctype="multipart/form-data" class="form_main">
                        <div class="row">
                            <div class="col-6">
                                <div class="h3"></div>
                            </div>
                            <div class="col-6 mt-3">
                                <?php echo $data_msg;?>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label"> Name</label>
                                    <input type="text" name="name" value="<?php echo $name = $row['name']; ?>" class="form-control inputField" id="title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label"> Category</label>
                                    <select name="Category" id="select_cat" class="inputField">
                                        <?php echo $Category; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Price </label>
                                    <input type="text" name="price" value="<?php echo $price = $row['price']; ?>" class="form-control inputField" id="title">
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row d-flex align-items-center">
                                <div class="col-4">
                                    <label for="title" class="Upload_File text-dark">Update Image </label>
                                    </div>
                                    <div class="col-4 User_Profile">
                                    <span class="fs-5">Main Image</span>
                                    <input type="file" name="img" value="" class="form-control" id="title">
                                    </div>
                                    <div class="col-4 text-end">
                                    <?php echo $ab_img; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Description </label>
                                    <textarea name="disc" class="form-control inputField" id="about_data">
                                    <?php echo $disc = $row['disc']; ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" name="update" class="SignUp-Btn ">Update Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include/footer.php');?>