<?php 
    include('include/header.php');
    include('include/sidebar.php');
    $category = $data_msg = '';
    if(isset($_SESSION['login'])){
        $user_id   = $_SESSION['login']; 
        $user_name =$_SESSION['a_name'];
    }

    // fetch category   
    $myObj->sql("SELECT * FROM manage_categories");
    $data3   = $myObj->getResult();
    if($data3 > 0){
        foreach($data3 as $row3){
            $cat_id    = $row3['id'];
            $cat_name  = $row3['cat_name'];
            $category .='<option class="form-select" value='.$cat_id.'>'.$cat_name.'</option>';
        }
    }

    // Set Button
    if(isset($_POST['add'])){
        $name         = mysqli_real_escape_string($conn, $_POST['name']);
        $cate         = mysqli_real_escape_string($conn, $_POST['cate']);
        $price        = mysqli_real_escape_string($conn, $_POST['price']);
        $decs         = mysqli_real_escape_string($conn, $_POST['disc']);
        $status       = "De-Active";
        $pop_status   = 'Un-Popular';
        $img_name     = $_FILES['img']['name'];
        $tmp_name     = $_FILES['img']['tmp_name'];
        $sub_1        = $_FILES['sub_1']['name'];
        $sub_1_tmp    = $_FILES['sub_1']['tmp_name'];
        $sub_2        = $_FILES['sub_2']['name'];
        $sub_2_tmp    = $_FILES['sub_2']['tmp_name'];
        $sub_3        = $_FILES['sub_3']['name'];
        $sub_3_tmp    = $_FILES['sub_3']['tmp_name'];
        $path         = "assets/upload/$img_name";
        $sub_path1    = "assets/upload/$sub_1";
        $sub_path2    = "assets/upload/$sub_2";
        $sub_path3    = "assets/upload/$sub_3";
                        move_uploaded_file($tmp_name,$path); 
                        move_uploaded_file($sub_1_tmp,$sub_path1); 
                        move_uploaded_file($sub_2_tmp,$sub_path2); 
                        move_uploaded_file($sub_3_tmp,$sub_path3); 


        // Insert Data 
        $params = [
            'name'       => $name,
            'cate'       => $cate,
            'price'      => $price,
            'disc'       => $decs,
            'status'     => $status,
            'pop_status' => $pop_status,
            'image'      => $img_name,
            'image2'     => $sub_1,
            'image3'     => $sub_2,
            'image4'     => $sub_3,
            'author'     => $user_id
        ]; 

        $insertData = $myObj->insert('manage_products', $params);
        $updateData = $myObj->update('manage_categories', ['posts' => 'posts' + 1], "id = '$cate'");
        if($insertData && $updateData){
            $run = $myObj->getResult();
            if($run){
                echo '<script>window.location.href="manage-products.php"</script>';
            }else{
                $data_msg ='<p class="bg-danger p-2 text-light">Product Not Added</p>'; 
            } 
        }
    }
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <div class="container">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Product</li>
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
                                    <input type="text" name="name" value="" class="form-control inputField" id="title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label"> Category</label>
                                    <select name="cate" id="select_cat" class="form-control inputField">
                                        <?php echo $category; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Price </label>
                                    <input type="text" name="price" value="" class="form-control inputField" id="title">
                                </div>
                            </div>
                            
                            <div class="col-md-6 mt-5">
                                <div class="mb-3 User_Profile">
                                    <input type="file" name="img" value="" class="form-control" id="main_img">
                                    <span class="fs-5">Main Image</span>
                                    <label for="main_img" class="Upload_File text-dark">Upload Image </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row p-2">
                                    <p class="bg-main text-light p-2">Add 3 Sub Images Related to the Product</p>
                                    <div class="col-md-4 mb-3 User_Profile">
                                    <span class="fs-5">Sub Image 1</span>
                                        <label for="sub1" class="form-label Upload_File text-dark">Upload Image</label>
                                        <input type="file" name="sub_1" value="" class="form-control" id="sub1">
                                    </div>
                                    <div class="col-md-4 mb-3 User_Profile">
                                    <span class="fs-5">Sub Image 2</span>
                                        <label for="sub2" class="form-label Upload_File text-dark">Upload Image</label>
                                        <input type="file" name="sub_2" value="" class="form-control" id="sub2">
                                    </div>
                                    <div class="col-md-4 mb-3 User_Profile">
                                    <span class="fs-5">Sub Image 3</span>
                                        <label for="sub3" class="form-label Upload_File text-dark">Upload Image</label>
                                        <input type="file" name="sub_3" value="" class="form-control" id="sub3">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Description </label>
                                    <textarea name="disc" value="" class="form-control inputField" id="about_data"></textarea>
                                </div>
                            </div>
                            <div class="col-8">
                                <button type="submit" name="add" class="SignUp-Btn ">Add Product</button>
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