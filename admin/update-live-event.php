<?php
include('include/header.php');
include('include/sidebar.php');

$link = $thumb = $thumbnail = $eventid = '';
$data_msg = '';

if (isset($_GET['eventid'])) {
    $eventid = $_GET['eventid'];

    // Fetch data
    $myObj->select('manage_live_stream', '*', "id = '$eventid'", null, null);
    $run = $myObj->getResult();

    if (!empty($run)) {
        $row = $run[0];
        $link = $row['link'];
        $thumb = $row['thumb'];
        $thumbnail = '<img src="assets/upload/' . $thumb . '" alt="thumbnail" width="100%" height="100%">';
    }
}

if (isset($_POST['update'])) {
    $link = trim($_POST['link']);
    $img_name = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];

    // Set upload path
    $path = "assets/upload/" . $img_name;

    // Build update data array
    $updateData = ['link' => $link];

    // If new image is uploaded
    if (!empty($img_name)) {
        $updateData['thumb'] = $img_name;
        move_uploaded_file($tmp_name, $path);
    }

    // Update query
    $myObj->update('manage_live_stream', $updateData, "id = '$eventid'");
    $update_run = $myObj->getResult();

    if ($update_run) {
        echo '<script>window.location.href="manage-live-stream.php"</script>';
        exit;
    } else {
        $data_msg = '<div class="alert alert-danger">Update failed. Please try again.</div>';
    }
}
?>


<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <div class="container">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Update Live Stream</li>
            </ol>
            <div class="row">
                <div class="col">
                    <form method="POST" enctype="multipart/form-data" class="form_main">
                        <div class="row p-5">
                            <div class="col-12">
                                <?php echo $data_msg; ?>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="title" class="form-label"> Link</label>
                                    <input type="text" name="link" value="<?php echo $link; ?>"
                                        class="inputField" id="title">
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="row d-flex align-items-center">
                                    <div class="col-4">
                                        <label for="up_image" class="Upload_File text-dark">Update Thumbnail </label>
                                    </div>
                                    <div class="col-4 User_Profile">
                                        <input type="file" name="img" value="" class="form-control" id="up_image">
                                    </div>
                                    <div class="col-4 text-end">
                                        <?php echo $thumbnail; ?>
                                    </div>
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
<?php include('include/footer.php'); ?>