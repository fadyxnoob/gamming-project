<?php 

    include('include/conection.php');
    include('include/header.php');
    include('include/sidebar.php');
    $data_msg = $Category = $subcategory = $post_img  = '';
            if(isset($_GET['post_id'])){
                $post_id = $_GET['post_id'];

                    // ===== fetch data
                        $query              = "SELECT * FROM `manage_posts` WHERE id ='".$post_id."'";
                        $run                = mysqli_query($conn,$query);
                        $row                = mysqli_fetch_array($run);
                        $update_title       = $row['title'];
                        $update_description = $row['description'];
                        $img = $row['image'];
                        $post_img ='<img src="assets/upload/'.$img.'" alt="profile"
                        width="100px" height="100px" class="border-0">';           
                }
            
             // ===== fetch category      
             $query3 = "SELECT * FROM manage_categories where `type` = 'Post' ";
             $data3   =mysqli_query($conn,$query3);
             while($row3 = mysqli_fetch_array($data3)){
                $cat_id        = $row3['id'];
                $cat_name      = $row3['cat_name'];
                $Category .='<option class="form-select" value='.$cat_id.'>'.$cat_name.'</option>';
                            
            }
            
            // ===== Set Button
            if(isset($_POST['update'])){
                $name         = $_POST['name'];
                $decs         = mysqli_real_escape_string($conn, $_POST['disc']);
                $cate         = $_POST['Category'];
                $img_name     = $_FILES['img']['name'];
                $img_old      = $_FILES['img']['name'];
                $tmp_name     = $_FILES['img']['tmp_name'];
                $path         = "assets/upload/$img_name";
                              move_uploaded_file($tmp_name,$path);
            
                if($img_old == ''){
                    $update_query = "UPDATE `manage_posts` SET   `title`        ='".$name."',
                                                                `description`  ='".$decs."',
                                                                `cate`         ='".$cate."'
                                                                WHERE id       = '".$post_id."' ";
                                                                $update_run    = mysqli_query($conn,$update_query);
                }else{
                    $update_query = "UPDATE `manage_posts` SET   `title`        ='".$name."',
                                                                `description`  ='".$decs."',
                                                                `cate`         ='".$cate."',
                                                                `image`        ='".$img_name."'
                                                                WHERE id       = '".$post_id."' ";
                                                                $update_run    = mysqli_query($conn,$update_query);
                }
                        
                    if($update_run){
                    echo '<script>window.location.href="manage-posts.php"</script>';
                    } else{
                        $data_msg = "Post Updating fail";
                    }
            }
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <div class="container">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Update Post</li>
            </ol>
            <div class="row">
           <div class="col-12">
           <?php echo $data_msg;?>
           </div>
                <div class="col">
                <form method="POST" enctype="multipart/form-data" class="form_main">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label"> Name</label>
                                    <input type="text" name="name" value="<?php echo $update_title; ?>" class="form-control inputField" id="title">
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
                           
                            <div class="col-12 mb-3">
                                <div class="row d-flex align-items-center">
                                <div class="col-4">
                                    <label for="main-img" class="Upload_File text-dark">Update Image </label>
                                    </div>
                                    <div class="col-4 User_Profile">
                                    <span class="fs-5">Main Image</span>
                                    <input type="file" name="img" value="" class="form-control" id="main-img">
                                    </div>
                                    <div class="col-4 text-end">
                                    <?php echo $post_img; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Description </label>
                                    <textarea name="disc" class="form-control inputField" id="about_data">
                                    <?php echo $update_description; ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-8">
                                <button type="submit" name="update" class="SignUp-Btn ">Update Post</button>
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