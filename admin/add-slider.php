<?php
include('include/conection.php');
include('include/header.php');
include('include/sidebar.php');
$data_msg = $img_name = '';

if (isset($_POST['add'])) {
    $title    = $_POST['title'];
    $img_name = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];
    $path     = "assets/upload/$img_name";
    move_uploaded_file($tmp_name, $path);
    $slider_status  = "De-Active";

    if (!$img_name == "") {
        $insert_data = "INSERT INTO manage_slider ( `title`, `img`,`slider_status`) 
        VALUES ('$title','$img_name','$slider_status')";
        $run = mysqli_query($conn, $insert_data);

        if ($run) {
            echo '<script>window.location.href="manage_slider.php"</script>';
        } else {
            $data_msg = "Data not Inaserted";
        }
    } else {
        $data_msg = "slider Image Should not be Empty.";
    }
}
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <div class="container">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Slider</li>
            </ol>
            <div class="row">
                <div class="col-12">
                    <?php echo $data_msg; ?>
                </div>
                <div class="col">
                    <form action="" method="POST" enctype="multipart/form-data" class="form_main">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" value="" class="inputField" id="title">
                                </div>
                            </div>
                            <div class="col-md-6 mt-5">
                                <div class="mb-3 User_Profile">
                                    <input type="file" name="img" value="" class="form-control" id="S_IMAGE">
                                    <span class="fs-5">Slider Image</span>
                                    <label for="S_IMAGE" class="Upload_File text-dark">Upload Image </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <button type="submit" name="add" class="SignUp-Btn ">Add SLIDER</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include/footer.php'); ?>