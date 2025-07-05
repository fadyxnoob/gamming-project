<?php
    include('include/header.php');
    include('include/sidebar.php');

    $data_msg = '';
    if(isset($_GET['member_id'])){
        $member_id = $_GET['member_id'];
            // fetch data
            $myObj->select('manage_our_team', '*', "id = '$member_id'");
            $run   = $myObj->getResult();
            if($run > 0){
                foreach($run as $row){
                    $m_profle = $row['profile'];
                    $member_profile ='<img src="assets/upload/'.$m_profle.'" alt="profile" width="100px" height="100px">';
                }
            }

    }
            
    // update member
    if(isset($_POST['update'])){
        $name         = $_POST['name'];
        $about        = $_POST['about'];
        $type         = $_POST['type'];
        $profile_name = $_FILES['profile']['name'];
        $profile_old  = $_FILES['profile']['name'];
        $tmp_name     = $_FILES['profile']['tmp_name'];
        $path         = "assets/upload/$profile_name";
         
    
        if($profile_old == ''){
            $myObj->update('manage_our_team', [
                'name'  => $name,
                'about' => $about,
                'type'  => $type 
            ], "id = '$member_id'");
            $update_run = $myObj->getResult();
        }else{
           
            $myObj->update('manage_our_team', [
                'name'    => $name,
                'about'   => $about,
                'type'    => $type,
                'profile' =>  $profile_name
            ], "id = '$member_id'");
            move_uploaded_file($tmp_name,$path);
            $update_run = $myObj->getResult();
        }   

        if($update_run){
            echo '<script>window.location.href="manage-team.php"</script>';
        } else{
            echo "Updating fail";
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
                <li class="breadcrumb-item active">Update Member</li>
            </ol>
            <div class="row">
                <div class="col">
                    <form method="POST" enctype="multipart/form-data" class="form_main">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label"> Name</label>
                                    <input type="text" name="name" value="<?php echo $row['Name']; ?>"
                                        class="form-control inputField" id="title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">About </label>
                                    <input type="text" name="about" value="<?php echo  $row['about']; ?>"
                                        class="form-control inputField" id="title">
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row d-flex align-items-center">
                                    <div class="col-4">
                                        <label for="profile" class="Upload_File text-dark">Update Image </label>
                                    </div>
                                    <div class="col-4 User_Profile">
                                        <span class="fs-5">Main Image</span>
                                        <input type="file" name="profile" value="" class="form-control" id="profile">
                                    </div>
                                    <div class="col-4 text-end">
                                        <?php echo $member_profile; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="desc" class="form-label">Type</label>
                                    <select name="type" id="type" class="inputField">
                                        <option value="Content Creator">Content Creator</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Commentaitor">Commentaitor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex align-items-center justify-content-end">
                                <button type="submit" name="update" class="SignUp-Btn">Update </button>
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