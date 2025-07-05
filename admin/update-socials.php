<?php
    include('include/conection.php');
    include('include/header.php');
    include('include/sidebar.php');
    $title = $disc = $img = $data_msg = $slider_id = '';
            if(isset($_GET['social_id'])){
                $social_id = $_GET['social_id'];
                // fetch data
                $query     = "SELECT * FROM manage_site_socials WHERE id ='".$social_id."'";
                $run       = mysqli_query($conn,$query);
                $row       = mysqli_fetch_array($run);
                $facebook  = $row['facebook'];
                $twitter   = $row['twitter'];
                $linkd     = $row['linkd'];
                $insta     = $row['insta'];
            }
                if(isset($_POST['update'])){
                    $facebook    = $_POST['facebook'];
                    $twitter     = $_POST['twitter'];
                    $linkd     = $_POST['linkd'];
                    $insta     = $_POST['insta'];
                    // Update Data 
                    $update_query = "UPDATE `manage_site_socials` SET
                                                        `facebook`   ='".$facebook."',
                                                        `twitter`    ='".$twitter."',
                                                        `linkd`      ='".$linkd."',
                                                        `insta`      ='".$insta."'
                                                         WHERE id    = '".$social_id."'";       
                    $update_run = mysqli_query($conn,$update_query);
                    if($update_run){
                        echo '<script>window.location.href="manage-social-media.php"</script>';
                                
                    }else{
                        echo "Update fail";
                    }    
                }
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <div class="container">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Update Socials</li>
            </ol>
            <div class="row">
                <div class="col">
                    <form method="POST" enctype="multipart/form-data" class="form_main">
                        <div class="row p-5">
                            <div class="col-12">
                                <?php echo $data_msg;?>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Facebook</label>
                                    <input type="text" name="facebook" value="<?php echo $facebook; ?>"
                                        class="inputField" id="title">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Twitter</label>
                                    <input type="text" name="twitter" value="<?php echo $twitter; ?>"
                                        class="inputField" id="title">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Linked in</label>
                                    <input type="text" name="linkd" value="<?php echo $linkd; ?>"
                                        class="inputField" id="title">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Instagram</label>
                                    <input type="text" name="insta" value="<?php echo $insta; ?>"
                                        class="inputField" id="title">
                                </div>
                            </div>
                           
                            <div class="col-12 text-start">
                                <div class="mt-3">
                                    <button type="submit" name="update" class="SignUp-Btn">Update</button>
                                        
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
<?php include('include/footer.php');?>