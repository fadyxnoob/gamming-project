<?php
    include('include/header.php');
    include('include/sidebar.php');

    $ab_img = $update_msg = '';

    if(isset($_GET['about_id'])){
        $about_id = $_GET['about_id'];

        // fetch data
        $myObj->select('manage_about', '*', 'id=$about')
        $query  = "SELECT * FROM `manage_about` WHERE id ='".$about_id."'";
        $run    = mysqli_query($conn,$query);
        $row    = mysqli_fetch_array($run);
        $title   = $row['title'];
        $title2   = $row['title2'];
        $disc   = $row['data'];
        $img    = $row['img'];
        $ab_img ='<img src="assets/upload/'.$img.'" alt="profile" width="100px" height="100px">';                 
    }

        // update product
        if(isset($_POST['update'])){
            $disc = mysqli_real_escape_string($conn, $_POST['disc']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $title2 = mysqli_real_escape_string($conn, $_POST['title2']);
            $profile      = $_FILES['img']['name'];
            $profile_old  = $_FILES['img']['name'];
            $tmp_name     = $_FILES['img']['tmp_name'];
            $path         = "assets/upload/.$profile";

            

            if($profile_old == ''){
                $update_query = "UPDATE `manage_about` SET   `title`       = '".$title."',
                                                              `title2`       = '".$title2."',
                                                              `data`       = '".$disc."'
                                                              WHERE id    = '".$about_id."'";
                $update_run = mysqli_query($conn,$update_query);

            }else{
                $update_query ="UPDATE `manage_about` SET      `title`       = '".$title."',
                                                                `title2`       = '".$title2."',
                                                                `data`       = '".$disc."',
                                                              `img`        = '".$profile."'
                                                               WHERE id    = '".$about_id."'";
                $update_run = mysqli_query($conn,$update_query);
                }   
            if($update_run){
                // echo "Product Updated";
                echo '<script>window.location.href="manage-about.php"</script>';
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
                <li class="breadcrumb-item active">Update About</li>
            </ol>
            <?php echo $update_msg;?>
            <div class="row">
                <div class="col">
                    <form method="POST" enctype="multipart/form-data" class="form_main">
                        <div class="row p-5">
                            <div class="col-12">
                               
                            </div>
                            <div class="col">
                                <label for="">Page Title</label> <br>
                                <input type="text" name="title" class="inputField"  value="<?php echo $title; ?>">
                            </div>
                            <div class="col">
                                <label for="">Team Title</label> <br>
                                <input type="text" name="title2" class="inputField"  value="<?php echo $title2; ?>">
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="about_data" class="form-label">About Description</label> <br>
                                    <textarea name="disc" class="inputField" id="about_data">
                                    <?php echo $disc; ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row d-flex align-items-center">
                                    <div class="col-4">
                                        <label for="Ab_Image" class="Upload_File text-dark">Update Image </label>
                                    </div>
                                    <div class="col-4 User_Profile">
                                        <span class="fs-5">Image</span>
                                        <input type="file" name="img" value="" class="form-control" id="Ab_Image">
                                    </div>
                                    <div class="col-4 text-end">
                                        <?php echo $ab_img; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-start">
                                <div class="mt-3">
                                    <button type="submit" name="update" class="SignUp-Btn">Update
                                        About</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>