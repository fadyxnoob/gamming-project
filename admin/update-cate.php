<?php
    include('include/header.php');
    include('include/sidebar.php');
    $cat_name =  $data_msg = $Type = '';

    if(isset($_GET['catid'])){
        $cat_id = $_GET['catid'];

        // fetch data
        $myObj->select('manage_categories', '*', "id = '$cat_id'", null, null);
        $run   = $myObj->getResult();
        if($run > 0){
            foreach($run as $row){
                $Type = $row['type'];
            }
        }
    }

    if(isset($_POST['update_cat'])){
        $cat_name    = $_POST['cat_name'];
        $myObj->update('manage_categories', ['cat_name' => $cat_name], "id = '$cat_id'");
        $update_run = $myObj->getResult();
        print_r($update_run);
        if($update_run){
            echo '<script>window.location.href="manage-categories.php"</script>'; 
            // echo 'Updated';
        }else{
            echo 'Updation Failed';
        }

    }
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <div class="container">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Update Category</li>
            </ol>
            <div class="row">
                <div class="col">
                    <form action="" method="POST" class="form_main">
                        <div class="row">
                            <div class="col-12">
                                <?php echo $data_msg;?>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Categorey Name</label>
                                    <input type="text" name="cat_name" value="<?php echo $row['cat_name'];?>" class="inputField" id="title">
                                </div>
                            </div>
                            <div class="col-6">
                            <div class="mb-3">
                                    <label for="title" class="form-label">Type</label>
                                    <div class="inputField p-2 text-center"><?php echo $row['type'];?></div>
                                </div>
                            </div>
                            <p>Select Category name according to its type</p>
                            <div class="col-8">
                                <button type="submit" name="update_cat" class="SignUp-Btn">Update</button>
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