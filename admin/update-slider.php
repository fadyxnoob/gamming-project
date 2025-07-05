<?php

include('include/conection.php');
include('include/header.php');
include('include/sidebar.php');

$title = $disc = $img = $data_msg = $slider_id = '';

if (isset($_GET['sliderid'])) {

    $slider_id = $_GET['sliderid'];

    // fetch data
    $query = "SELECT * FROM manage_slider WHERE id ='" . $slider_id . "'";
    $run   = mysqli_query($conn, $query);
    $row   = mysqli_fetch_array($run);
    $imgOld = $row['img'];
    $slider_img = '<img src="assets/upload/' . $imgOld . '" alt="profile"
                        width="100px" height="100px>';
}

if (isset($_POST['update'])) {
    $title    = $_POST['title'];
    $img_name = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];
    $img_old  = $_POST['imgOld'];
    $slider_id = $_POST['sliderid']; // pass this via hidden field in form
    $path     = "assets/upload/" . $img_name;

    // Check if a new image is uploaded
    if (!empty($img_name)) {
        // Delete old image
        if (file_exists("assets/upload/" . $img_old)) {
            unlink("assets/upload/" . $img_old);
        }

        // Move new image
        move_uploaded_file($tmp_name, $path);

        // Update with new image
        $update_query = "UPDATE `manage_slider` SET
                            `title` = '$title',
                            `img`   = '$img_name'
                         WHERE id = '$slider_id'";
    } else {
        // Update without changing image
        $update_query = "UPDATE `manage_slider` SET
                            `title` = '$title'
                         WHERE id = '$slider_id'";
    }

    $update_run = mysqli_query($conn, $update_query);

    if ($update_run) {
        echo '<script>window.location.href="manage_slider.php"</script>';
    } else {
        echo "Update failed";
    }
}

?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <div class="container">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Update Product</li>
            </ol>
            <div class="row">
                <div class="col">
                    <form method="POST" enctype="multipart/form-data" class="form_main">
                        <div class="row p-5">
                            <div class="col-12">
                                <?php echo $data_msg; ?>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Slider Title</label>
                                    <input type="text" name="title" value="<?php echo $title = $row['title']; ?>"
                                        class="inputField" id="title">
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="row d-flex align-items-center">
                                    <div class="col-4">
                                        <label for="up_image" class="Upload_File text-dark">Update Image </label>
                                    </div>
                                    <div class="col-4 User_Profile">
                                        <span class="fs-5">Slider Image</span>
                                        <input type="file" name="img" value="" class="form-control" id="up_image">
                                        <input type="hidden" name="imgOld" value="<?php echo $imgOld; ?>"
                                            class="form-control" id="up_image">
                                    </div>
                                    <div class="col-4 text-end">
                                        <?php echo $slider_img; ?>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="imgOld" value="<?php echo $imgOld; ?>">
                            <input type="hidden" name="sliderid" value="<?php echo $slider_id; ?>">
                            <div class="col-12 text-start">
                                <div class="mt-3">
                                    <button type="submit" name="update" class="SignUp-Btn">Update
                                        Slider</button>
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
<?php include('include/footer.php'); ?>