<?php 

    include('include/conection.php');
    include('include/header.php');
    include('include/sidebar.php');
    $data_msg = $category = $subcategory = '';
    if(isset($_SESSION['u_id'])){
         $user_id   = $_SESSION['u_id']; 
         $user_name =$_SESSION['a_name'];
    }  
        // fetch category   
        $query3 = "SELECT * FROM manage_categories where type = 'Post'";
        $data3   =mysqli_query($conn,$query3);
        while($row3 = mysqli_fetch_array($data3)){
        $cat_id        = $row3['id'];
        $cat_name      = $row3['cat_name'];
        $category .='<option class="form-select" value='.$cat_id.'>'.$cat_name.'</option>';
        }
        //Fetching Admin Id
        $fetch_aid = "SELECT * FROM register";
        $data2   = mysqli_query($conn,$fetch_aid);
        $admin_data = mysqli_fetch_array($data2);
        $ad_id = $admin_data['id'];
        // Set Button
        if(isset($_POST['add'])){
            $name       = $_POST['name'];
            $decs       = mysqli_real_escape_string($conn, $_POST['disc']);
            $cate       = $_POST['cate'];
            $status     = "Draft";
            $pop_status = 'unpopular';
            $img_name   = $_FILES['img']['name'];
            $tmp_name   = $_FILES['img']['tmp_name'];
            $sub_1      = $_FILES['sub_1']['name'];
            $sub_1_tmp  = $_FILES['sub_1']['tmp_name'];
            $sub_2      = $_FILES['sub_2']['name'];
            $sub_2_tmp  = $_FILES['sub_2']['tmp_name'];
            $sub_3      = $_FILES['sub_3']['name'];
            $sub_3_tmp  = $_FILES['sub_3']['tmp_name'];
            $path       = "assets/upload/$img_name";
            $sub_path1  = "assets/upload/$sub_1";
            $sub_path2  = "assets/upload/$sub_2";
            $sub_path3  = "assets/upload/$sub_3";
                          move_uploaded_file($tmp_name,$path); 
                          move_uploaded_file($sub_1_tmp,$sub_path1); 
                          move_uploaded_file($sub_2_tmp,$sub_path2); 
                          move_uploaded_file($sub_3_tmp,$sub_path3); 

        // Insert Data 
        $insert_data =  "INSERT INTO `manage_posts`(`title`, `description`, `cate`, `status`, `popular`, `image`, `image2`, `image3`, `image4`,`posted_by`)
         VALUES ('$name','$decs','$cate','$status','$pop_status','$img_name','$sub_1','$sub_2','$sub_3','$user_id');"; 

        // Update the post count for the category
        $insert_data .= "UPDATE manage_categories SET posts = posts + 1 WHERE id = '$cate';";
        // Update the post num for the Admin
        $insert_data .= "UPDATE register SET posts = posts + 1 WHERE id = '$user_id'";
        $mysqli =mysqli_multi_query($conn,$insert_data);
    
            if($mysqli){
                // $data_msg ='<p class="bg-info p-2 text-light">Post Added</p>'; 
                echo '<script>window.location.href="manage-posts.php"</script>';
            }else{
                $data_msg ='<p class="bg-danger p-2 text-light">Post Not Added</p>'; 
            } 
}
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <div class="container">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Post</li>
            </ol>
            <div class="row">
                <div class="col">
                    <form action="add-post.php" method="POST" enctype="multipart/form-data" class="form_main">
                        <div class="row">
                            <div class="col-12">
                                <?php echo $data_msg;?>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label"> Name</label>
                                    <input type="text" name="name" value="" class="inputField" id="title">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Category</label>
                                    <select name="cate" id="select_cat" class="inputField">
                                        <?php echo $category; ?>
                                    </select>
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
                                        <label for="sub-1" class="form-label Upload_File text-dark">Upload Image</label>
                                        <input type="file" name="sub_1" value="" class="form-control" id="sub-1">
                                    </div>
                                    <div class="col-md-4 mb-3 User_Profile">
                                        <span class="fs-5">Sub Image 2</span>
                                        <label for="sub-2" class="form-label Upload_File text-dark">Upload Image</label>
                                        <input type="file" name="sub_2" value="" class="form-control" id="sub-2">
                                    </div>
                                    <div class="col-md-4 mb-3 User_Profile">
                                        <span class="fs-5">Sub Image 3</span>
                                        <label for="sub-3" class="form-label Upload_File text-dark">Upload Image</label>
                                        <input type="file" name="sub_3" value="" class="form-control" id="sub-3">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Description </label>
                                    <textarea name="disc" value="" class="form-control inputField"
                                        id="about_data"></textarea>
                                </div>
                            </div>
                            <div class="col-8">
                                <button type="submit" name="add" class="SignUp-Btn ">Add Post</button>
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