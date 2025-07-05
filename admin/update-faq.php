<?php
    include('include/conection.php');
    include('include/header.php');
    include('include/sidebar.php');

        $data_msg =  $update_msg  ='';
            if(isset($_GET['faq_id'])){
                $faq_id = $_GET['faq_id'];
                    // fetch data
                        $query = "SELECT * FROM manage_faqs WHERE id ='".$faq_id."'";
                        $run   = mysqli_query($conn,$query);
                        $row   = mysqli_fetch_array($run);
                }
                    if(isset($_POST['update'])){
                        $question    = $_POST['question'];
                        $answer      = $_POST['answer'];
                            $update_query ="UPDATE `manage_faqs` SET
                                                            `question`   ='".$question."',
                                                            `answer`   ='".$answer."'
                                                             WHERE id    = '".$faq_id."' ";
                                    $update_run = mysqli_query($conn,$update_query);
                                    if($update_run){
                                        echo '<script>window.location.href="manage-faqs.php"</script>'; 
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
                <li class="breadcrumb-item active">Update Contact Us</li>
            </ol>
            <?php echo $update_msg;?>
            <div class="row">
                <div class="col">
                    <form method="POST" enctype="multipart/form-data" class="form_main">
                        <div class="row p-5">
                        <div class="col-12 mb-3">
                                <label for="title" class="form-label">Question</label>
                                <input type="text" name="question" value="<?php echo $question = $row['question']; ?>"
                                    class="form-control" id="title">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="title" class="form-label">Answer</label>
                                <input type="text" name="answer" value="<?php echo $answer = $row['answer']; ?>"
                                    class="form-control" id="title">
                            </div>
                            
                            <div class="col-12 text-start">
                                <div class="mt-3">
                                    <button type="submit" name="update" class="SignUp-Btn">Update
                                        Faqs</button>
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