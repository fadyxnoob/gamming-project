<?php 
    include('include/header.php');
    include('include/sidebar.php');

    $data_msg = $img_name = '';

    if(isset($_POST['add'])){
        $name          = $_POST['name'];
        $about         = $_POST['about'];
        $type          = $_POST['type'];
        $profile_name  = $_FILES['profile']['name'];
        $tmp_name      = $_FILES['profile']['tmp_name'];
       
                         
        $myObj->insert('manage_our_team', ['name' => $name, 'about' => $about, 'type' => $type, 'profile' => $profile_name]);
        $run = $myObj->getResult();
        if($run){
            $path = "assets/upload/$profile_name";
            move_uploaded_file($tmp_name,$path); 
            echo '<script>window.location.href="manage-team.php"</script>';
            // echo 'member added';
        }else{
            $data_msg ="Member not added"; 
        } 
    }
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <div class="container">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Member</li>
            </ol>
            <div class="row">
                <div class="col">
                    <form action="" method="POST" class="form_main" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <?php echo $data_msg;?>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Name</label>
                                    <input type="text" name="name" value="" placeholder="Member Name" class="inputField"
                                        id="title">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">About</label>
                                    <input type="text" name="about" value="" placeholder="Id Level & Acheivement"
                                        class="inputField" id="title">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Type</label>
                                    <select name="type" id="type" class="inputField">
                                        <option value="Content Creator">Content Creator</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Commentaitor">Commentaitor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mt-5">
                                <div class="mb-3 User_Profile">
                                    <input type="file" name="profile" value="" class="form-control" id="main_img">
                                    <span class="fs-5">Profile</span>
                                    <label for="main_img" class="Upload_File text-dark">Upload Image </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <button type="submit" name="add" class="SignUp-Btn">Add Member</button>
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