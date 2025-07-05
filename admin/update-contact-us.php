<?php
    include('include/conection.php');
    include('include/header.php');
    include('include/sidebar.php');
    $ab_img = $update_msg = '';
    if(isset($_GET['con_id'])){
        $id = $_GET['con_id'];
 
        // fetch data
        $query   = "SELECT * FROM `manage_contact_us` WHERE id = '$id'";
        $run     = mysqli_query($conn, $query);
        $row     = mysqli_fetch_array($run);
        $heading = $row['heading'];
        $disc    = $row['disc'];
        // update Contact Us
        if(isset($_POST['update'])){
            $heading = mysqli_real_escape_string($conn, $_POST['heading']);
            $disc    = mysqli_real_escape_string($conn, $_POST['disc']);

            $update = "UPDATE `manage_contact_us` SET `heading` = '$heading',
            `disc`    = '$disc'
            WHERE id  = '$id'";
            $qu_run = mysqli_query($conn, $update);

            if($qu_run){
                // echo "Product Updated";
                echo '<script>window.location.href="manage-contact-us.php"</script>';
            } else {
                echo "Product Updating failed";
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
                <li class="breadcrumb-item active">Update Contact Us</li>
            </ol>
            <?php echo $update_msg;?>
            <div class="row">
                <div class="col">
                    <form method="POST" enctype="multipart/form-data" class="form_main">
                        <div class="row p-5">
                            <div class="col-12">
                               
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="about_data" class="form-label">Headingh</label> <br>
                                    <input type="text" name="heading" class="inputField" value="<?php echo $heading; ?>">
                                        
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="about_data" class="form-label">Description</label> <br>
                                    <textarea name="disc" class="inputField" id="about_data">
                                    <?php echo $disc; ?>
                                    </textarea>
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