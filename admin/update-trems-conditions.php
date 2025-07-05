<?php
    include('include/header.php');
    include('include/sidebar.php');
        $data_msg = '';
        if(isset($_GET['terms_id'])){
            $id = $_GET['terms_id'];
            // fetch data
            $myObj->select('terms_conditions', '*', "id = '$id' ", null, null);
            $run   = $myObj->getResult();
            if($run > 0){
                foreach($run as $row){
                }
            }
        }

        if(isset($_POST['update'])){
            $disc    = $myObj->escapeString($_POST['disc']);
            $myObj->update('terms_conditions', ['dics' => $disc], "id = '$id' ");
            $update_run = $myObj->getResult();
            if($update_run){
                echo '<script>window.location.href="manage-terms-conditions.php"</script>'; 
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
                <li class="breadcrumb-item active">Update Terms and Condition</li>
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