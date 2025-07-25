<?php
include('include/header.php');
include('include/sidebar.php');

$data_msg = '';
$row = [];

// === Fetch policy data ===
if (isset($_GET['policy_id'])) {
    $policy_id = $myObj->escapeString($_GET['policy_id']);

    $myObj->select('privacy_policy', '*', "id = '$policy_id'");
    $result = $myObj->getResult();

    if (!empty($result)) {
        $row = $result[0];
    } else {
        $data_msg = '<p class="bg-danger p-2 text-white">Policy not found.</p>';
    }
}

// === Update policy ===
if (isset($_POST['update'])) {
    $disc = $myObj->escapeString($_POST['disc']);

    $updateData = [
        'disc' => $disc
    ];

    $updated = $myObj->update('privacy_policy', $updateData, "id = '$policy_id'");

    if ($updated) {
        echo '<script>window.location.href="manage-privacy-policy.php"</script>';
        exit;
    } else {
        $data_msg = '<p class="bg-danger p-2 text-white">Updating Failed.</p>';
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