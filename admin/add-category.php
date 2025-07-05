<?php 
    include('include/header.php');
    include('include/sidebar.php');
    $data_msg = $img_name = '';

    if(isset($_POST['add_cat'])){
        $cat_name  = $_POST['cat_name'];
        $type      = $_POST['type'];

        $myObj->insert('manage_categories', ['cat_name' => $cat_name, 'type' => $type]);
        $run = $myObj->getResult();
        if($run){
            echo '<script>window.location.href="manage-categories.php"</script>';
        }else{
            $data_msg ="Categorey not added"; 
        } 
    }
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <div class="container">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Category</li>
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
                                    <input type="text" name="cat_name" value="" class="inputField" id="title">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Type</label>
                                    <select name="type" id="type" class="inputField">
                                        <option value="Post">Post</option>
                                        <option value="Product">Product</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-8">
                                <button type="submit" name="add_cat" class="SignUp-Btn">Add Categorey</button>
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