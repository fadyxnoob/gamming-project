<?php
    include('user/include/header.php');
    if(isset($_GET['update_user'])){
        $user_id = $_GET['update_user'];

        // fetch data
        $myObj->select('manage_players', '*', "id ='$user_id'", null, null);
        $run       = $myObj->getResult();
        if($run > 0){
            foreach($run as $row){
                $user_name = $row['name'];
                $user_mail = $row['mail'];
                $img       = $row['profile'];
                $ab_img    ='<img src="admin/assets/upload/'.$img.'" alt="profile" width="100px" height="100px">';
            }
        }
        
    }  

    // update member
    if(isset($_POST['updateUser'])){
        $name         = $myObj->escapeString($_POST['name']);
        $email        = $myObj->escapeString($_POST['email']);
        $profile_name = $_FILES['img']['name'];
        $profile_old  = $_FILES['img']['name'];
        $tmp_name     = $_FILES['img']['tmp_name'];
       
    
        if($profile_old == ''){
            $params = [
                'name' => $name,
                'mail' => $email
            ];

            $myObj->update('manage_players', $params, "id = $user_id ");
            $update_run   = $myObj->getResult();
        }else{
            $path         = "admin/assets/upload/$profile_name";
            move_uploaded_file($tmp_name,$path);
            $params = [
                'name'    => $name,
                'mail'    => $email,
                'profile' => $profile_name
            ];

            $myObj->update('manage_players', $params, "id = $user_id ");
            $update_run   = $myObj->getResult();
        }   

        if($update_run){
            $_SESSION['user_update'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Okey!</strong>Your Profile has been Updated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            echo '<script>window.location.href="user-profile.php"</script>';
        } else{
            echo "Updating fail";
        }
    }
?>

<!-- Banner Sart -->
<div class="container-fluid contact-banner">
    <div class="row">
        <div class="col text-dark text-center py-5">
            <h1>Update Profile</h1>
        </div>
    </div>
</div>
<!-- Banner End -->
<!-- Content Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data" class="SignUp_Form">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="exampleInputEmail1" class="form-label text-light">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="<?php echo  $user_name;?>">
                    </div>
                   
                    <div class="col-md-6 mb-2">
                        <label for="exampleInputEmail1" class="form-label text-light">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="<?php echo  $user_mail;?>">
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
                    <div class="col">
                        <button type="submit" name="updateUser" class="SignUp-Btn">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Content End -->
<?php include('user\include\footer.php'); ?>