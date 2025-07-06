<?php
include('include/header.php');
include('include/sidebar.php');

$update = '';
$dealid = '';

// Get event ID from URL
if (isset($_GET['eventid'])) {
    $dealid = $_GET['eventid'];
}

// Handle form submission
if (isset($_POST['update'])) {
    $heading = $_POST['heading'];
    $date    = $_POST['date'];
    $h       = $_POST['h'];
    $m       = $_POST['m'];
    $s       = $_POST['s'];
    $ampm   = $_POST['apmp'] ;

    // Update database
    $eventParams = [
        'heading'    => $heading,
        'event_date' => $date,
        'event_h'    => $h,
        'event_m'    => $m,
        'event_s'    => $s,
        'ampm'       => $ampm,
    ];

    $myObj->update("manage_counter", $eventParams, "event_id = '$dealid'");
    $result = $myObj->getResult();

    // Set session alert and redirect
    $_SESSION['counter_msg'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Timer updated successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    echo '<script>window.location.href="manage-counter.php";</script>';
    exit;
}

// Fetch current counter data
$myObj->sql("SELECT * FROM manage_counter");
$data = $myObj->getResult();

if (!empty($data)) {
    // We assume only one record exists
    $deal_id = $data[0]['event_id'];
    $heading = $data[0]['heading'];
    $date    = $data[0]['event_date'];
    $h       = $data[0]['event_h'];
    $m       = $data[0]['event_m'];
    $s       = $data[0]['event_s'];
    $apmp    = $data[0]['ampm'];
}

?>



<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <div class="container">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Set Timer</li>
            </ol>
            <div class="row">
                <div class="col-12 text-center">
                    <?php echo $update; ?>
                </div>
                <div class="col">
                    <form method="POST" action="#" enctype="multipart/form-data">
                        <label for="heaing">Heading</label>
                        <input type="text" name="heading" class="form-control inputField" value="<?php echo $heading; ?>">
                        Date
                        <input class="form-control inputField" type="date" name="date" value="<?php echo $date; ?>">
                        Hours
                        <input class="form-control inputField" type="number" name="h" value="<?php echo $h; ?>">
                        Minutes
                        <input class="form-control inputField" type="number" name="m" value="<?php echo $m; ?>">
                        Seconds
                        <input class="form-control inputField" type="number" name="s" value="<?php echo $s; ?>">
                        AM/PM
                        <select class="form-select inputField" name="apmp" id="apmp">
                            <?php 
                                if($apmp == 'AM') {
                                    echo '<option value="AM" selected>AM</option>';
                                    echo '<option value="PM">PM</option>';
                                } else {
                                    echo '<option value="AM">AM</option>';
                                    echo '<option value="PM" selected>PM</option>';
                                }
                            ?>
                            <!-- <option value="AM">AM</option>
                            <option value="PM">PM</option> -->
                        </select>
                        <button class="SignUp-Btn" type="submit" name="update">Set</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>