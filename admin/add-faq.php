<?php 
    include('include/conection.php');
    include('include/header.php');
    include('include/sidebar.php');
    $data_msg = '';

    if(isset($_POST['addfaQ'])){
        $question     = $_POST['question'];
        $answer       = $_POST['answer'];
        $insert_data ="INSERT INTO `manage_faqs`(`question`, `answer`)
                               VALUES ('".$question."','".$answer."')";   
        $run = mysqli_query($conn,$insert_data);
            if($run){
                echo '<script>window.location.href="manage-faqs.php"</script>';
            }else{
                $data_msg ="FAQs not added"; 
            } 
    }
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <div class="container">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Faqs</li>
            </ol>
            <div class="row">
                <div class="col">
                    <form action="" method="POST" enctype="multipart/form-data" class="form_main">
                        <div class="row">
                            <div class="col-12">
                                <?php echo $data_msg;?>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Question</label>
                                    <input type="text" name="question" value="" class="form-control inputField" id="title">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Answer</label>
                                    <input type="text" name="answer" value="" class="form-control inputField" id="title">
                                </div>
                            </div>
                            <div class="col">
                                <button type="submit" name="addfaQ" class="SignUp-Btn">Add FaQ</button>
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