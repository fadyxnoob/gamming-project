<?php
include('include/header.php');
include('include/sidebar.php');

$data_msg = '';

// === Add FAQ Form Submitted ===
if (isset($_POST['addfaQ'])) {
    // Sanitize inputs
    $question = $myObj->escapeString($_POST['question']);
    $answer   = $myObj->escapeString($_POST['answer']);

    if (!empty($question) && !empty($answer)) {
        // Insert using OOP method
        $params = [
            'question' => $question,
            'answer'   => $answer
        ];

        $inserted = $myObj->insert('manage_faqs', $params);
        $result   = $myObj->getResult();

        if ($result) {
            echo '<script>window.location.href="manage-faqs.php"</script>';
            exit;
        } else {
            $data_msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>ERROR::</strong> Faqs not added.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
    } else {
        $data_msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>ERROR::</strong> Please fill all fields.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
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
                <div class="col-12">
                    <?php echo $data_msg; ?>
                </div>
                <div class="col">
                    <form action="" method="POST" enctype="multipart/form-data" class="form_main">
                        <div class="row">

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