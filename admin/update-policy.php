<?php
    include('include/conection.php');
    include('include/header.php');
    include('include/sidebar.php');
        $data_msg = '';
        if(isset($_GET['policy_id'])){
            $policy_id = $_GET['policy_id'];
            // fetch data
            $query = "SELECT * FROM privacy_policy WHERE id ='".$policy_id."'";
            $run   = mysqli_query($conn,$query);
            $row   = mysqli_fetch_array($run);
        }
        if(isset($_POST['update'])){
            $disc    = $_POST['disc'];
            $update_query ="UPDATE `privacy_policy` SET
                                                `disc`   ='".$disc."'
                                                WHERE id    = '".$policy_id."' ";
            $update_run = mysqli_query($conn,$update_query);
            if($update_run){
                echo '<script>window.location.href="manage-privacy-policy.php"</script>'; 
            }else{
                $data_msg ='<p class="bg-danger">Updating Failed.</p>';
            }
        }
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <div class="container">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Update Privacy Policy</li>
            </ol>
            <div class="row">
                <div class="col-12">
                    <?php echo $data_msg;?>
                </div>
                <div class="col">
                    <form method="POST" enctype="multipart/form-data" class="form_main">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Description</label>
                                    <textarea name="disc" class="form-control inputField" id="about_data">
                                    <?php echo $row['disc']; ?>
                                    </textarea>
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
<?php include('include\footer.php'); ?>