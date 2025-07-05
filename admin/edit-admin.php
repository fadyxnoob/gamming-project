<?php 
    include('include/header.php');
    include('include/sidebar.php');
    $data_msg = '';
    if(isset($_GET['edit_admin'])){
        $edit_admin = $_GET['edit_admin'];
        if($edit_admin == $_SESSION['login']){
            // ===== fetch data
            $myObj->select('register', '*', "id = '$edit_admin'", null, null);
            $run                = $myObj->getResult();
            if($run > 0){
                foreach($run as $row){
                    $update_name     = $row['name'];
                    $update_email    = $row['email'];
                    $img             = $row['profile'];
                    $update_profile  = '<img src="assets/upload/'.$img.'" alt="profile" width="100px" height="100px" class="border-0">';       
                }
            }
     
        }else{
            echo '<script>window.location.href="manage-admin.php"</script>';
        }
        
        // ===== Set Button
        if(isset($_POST['update'])){
            $name         = $_POST['name'];
            $email         = $_POST['email'];
            $img_name     = $_FILES['img']['name'];
            $img_old      = $_FILES['img']['name'];
            $tmp_name     = $_FILES['img']['tmp_name'];
            $path         = "assets/upload/$img_name";
                            move_uploaded_file($tmp_name,$path);
        
            if($img_old == ''){
                $myObj->update('register', ['name' => $name, 'email' => $email], "id = $edit_admin");
                $update_run  = $myObj->getResult();
            }else{
                unlink("assets/upload/$img_name");
                $myObj->update('register', ['name' => $name, 'email' => $email, 'profile' => $img_name], "id = $edit_admin");
                $update_run  = $myObj->getResult();
            }
            if($update_run){
                echo '<script>window.location.href="manage-admin.php"</script>';
            } else{
                $data_msg = "Post Updating fail";
            }
        }
    }
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <div class="container">
            <?php echo $data_msg;?>
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Update Admin</li>
            </ol>
            <div class="row">
                <div class="col">
                    <form method="POST" enctype="multipart/form-data" class="form_main">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Name</label>
                                    <input type="text" name="name" value="<?php echo $update_name; ?>"
                                        class="form-control inputField" id="title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label"> E-Mail</label>
                                    <input type="email" name="email" class="inputField"
                                        value="<?php echo $update_email; ?>">
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="row d-flex align-items-center">
                                    <div class="col-4">
                                        <label for="profile" class="Upload_File text-dark">Update Image </label>
                                    </div>
                                    <div class="col-4 User_Profile">
                                        <span class="fs-5">Profile</span>
                                        <input type="file" name="img"  class="form-control" id="profile">
                                    </div>
                                    <div class="col-4 text-end">
                                        <?php echo $update_profile; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <button type="submit" name="update" class="SignUp-Btn ">Update</button>
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