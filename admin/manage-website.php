<?php 
    include("include/header.php");  
    include("include/sidebar.php");  
    
    $data_fetch= $row ='';
    if(isset($_POST['update_data'])){
        $site_title     = $_POST['site_title'];
        $site_name      = $_POST['site_name'];
        $site_email     = $_POST['site_email'];
        $site_address   = $_POST['site_address'];
        $site_desc      = $_POST['site_desc'];
        $site_phone     = $_POST['site_phone'];
        $site_currency  = $_POST['site_currency'];
        $logo_name      = $_FILES['logo']['name'];
        $logo_tmp       = $_FILES['logo']['tmp_name'];
        $logo_old       = $_POST['logoOld'];
    
        
        if($logo_old == ''){
            $params = [
                'site_title' => $site_title,
                'site_name' => $site_name,
                'site_email' => $site_email,
                'site_address' => $site_address,
                'site_desc' => $site_desc,
                'site_phone' => $site_phone,
                'site_currency' => $site_currency,
            ];
            $myObj->update('manage_website', $params, null);
            $run_query = $myObj->getResult();          
        }else{
            unlink("assets/upload/".$logo_old);
            $params = [
                'site_title' => $site_title,
                'site_name' => $site_name,
                'site_email' => $site_email,
                'site_address' => $site_address,
                'site_desc' => $site_desc,
                'site_phone' => $site_phone,
                'site_currency' => $site_currency,
                'site_logo'  => $logo_name,
            ];
            $path              = "assets/upload/".$logo_old;
            move_uploaded_file($logo_tmp,$path);

            $myObj->update('manage_website', $params, null);
            $run_query = $myObj->getResult();   
        }           
    }
    $myObj->sql("SELECT * FROM manage_website");
    $run         = $myObj->getResult();
    if($run > 0){
        foreach($run as $row){
        }
    }
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Manage Website</li>
        </ol>
        <div class="row">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" class="form_main">
                        <div class="row">
                            <div class="col-12">
                                <?php echo $data_fetch;?>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="site_title" class="form-label">Site Title</label>
                                    <input type="text" name="site_title"
                                     value="<?php echo $row['site_title'];?>" 
                                     class="form-control inputField " id="site_title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="site_name" class="form-label">Site Name</label>
                                    <input type="text" name="site_name" value="<?php echo $row['site_name']; ?>"
                                        class="form-control inputField" id="site_name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="site_email" class="form-label">Site Email</label>
                                    <input type="email" name="site_email" value="<?php echo $row['site_email']; ?>"
                                        class="form-control inputField" id="site_email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="site_address" class="form-label">Site Address</label>
                                    <input type="text" name="site_address" value="<?php echo $row['site_address']; ?>"
                                        class="form-control inputField" id="site_address">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="site_phone" class="form-label">Site Phone</label>
                                    <input type="tel" name="site_phone" value="<?php echo $row['site_phone']; ?>"
                                        class="form-control inputField" id="site_phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="site_currency" class="form-label">Site Currency</label>
                                    <input type="text" name="site_currency" value="<?php echo $row['site_currency']; ?>"
                                        class="form-control inputField" id="site_currency">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="site_desc" class="form-label">Site Description</label> <br>
                                    <input type="text" name="site_desc" id="site_desc"
                                        value="   <?php echo $row['site_desc']; ?>"
                                        class="form-control inputField">
                                </div>
                            </div>
                            <div class="col-md-6 User_Profile">
                                <div class="mb-3">
                                    <label for="Upload_File" class="Upload_File text-dark">Site Logo</label>
                                    <input type="file" name="logo" id="Upload_File">
                                    <input type="hidden" name="logoOld" id="Upload_File" value="<?php echo $row['site_logo']; ?>">
                                    <img src="assets/upload/<?php echo $row['site_logo'];?>" alt="site_logo" width="100px" height="70px" class="mx-auto ms-5">
                                </div>
                            </div>
                            <div class="col-md-6 text-end">
                                <button type="submit" name="update_data" class="btn SignUp-Btn p-2">Update Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>