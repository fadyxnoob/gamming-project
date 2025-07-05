<?php
include('user/include/header.php');
$profile = $user_update = $user_name = $user_uname = $user_email  = $Candi_Status  = $status_msg = $UStatus_msg = $Repo_Status_msg = $Repo_Status = $login = $repo_msg = $chang_pass = $U_Candi = $Candi_msg = $facebook = $instagram = $twitter = $youtube = '';

if (isset($_SESSION['player'])) {
    $player = $_SESSION['player'];
    if (isset($_SESSION['login_msg'])) {
        $login = $_SESSION['login_msg'];
        unset($_SESSION['login_msg']);
    }
    // fetch data from tbl
    $myObj->select('manage_players', '*', "id = '$player'", null, null);
    $run             = $myObj->getResult();
    if ($run > 0) {
        foreach ($run as $user_data) {
            $user_name     = $user_data['name'];
            $user_uname    = $user_data['uname'];
            $user_email    = $user_data['mail'];
            $user_status   = $user_data['status'];

            if ($user_status == 'block') {
                $UStatus_msg = '<p class="text-danger">Your account is in Review</p>';
            } else {
                $UStatus_msg = '<p class="text-success">Your account is Okey!</p>';
            }

            $profile       = $user_data['profile'];

            if (isset($_SESSION['Candi_msg'])) {
                $Candi_msg       =  $_SESSION['Candi_msg'];
            }

            $myObj->sql("SELECT status FROM manage_candidate WHERE p_id = '" . $player . "' ");
            $run_status        = $myObj->getResult();
            if ($run_status > 0) {
                foreach ($run_status as $user_result) {
                    $Candi_Status    = $user_result['status'];
                }
            }

            if ($Candi_Status == 'Pending') {
                $status_msg = '<p class="text-danger">Please Wait! Your Request is in Review</p>';
            } else {
                if ($Candi_Status == 'Qualified') {
                    $status_msg = '<p class="text-success">You are Qualified for the Tournament</p>';
                } else {
                    if ($Candi_Status == 'Out') {
                        $status_msg = '<p class="">
                            You are out o the Tournament, Better Luck Next Time
                            </p>';
                    } else {
                        if ($Candi_Status == 'Winner') {
                            $status_msg = '<p class="">
                                    Congratulations You move to the next Level.
                                </p>';
                        } else {
                            if ($Candi_msg == 'Match') {
                                $status_msg = '<p class="text-success">
                                        Congratulation:You Match has arranged
                                        <a href="shedule.php"> See Your Match</a>
                                    </p>';
                            } else {
                            }
                        }
                    }
                }
            }
        }
    }


    if (isset($_SESSION['report_msg'])) {
        $repo_msg = $_SESSION['report_msg'];
        $myObj->select('manage_reports', 'status', "user_id = '$player'", null, null);
        $repo_run = $myObj->getResult();
        if ($repo_run > 0) {
            foreach ($repo_run as $repo_result) {
                $Repo_Status = $repo_result['status'];
                if ($Repo_Status == 'Pending') {
                    $Repo_Status_msg = '<p class="text-danger">We Will Soon Check Your Report</p>';
                } else {
                    $Repo_Status_msg = '<p class="text-success">We Reviewed Your Report: <br>
                                        Contact us at Whatsapp +92516159</p>';
                }
            }
        }
    }

    // FETCHING USER TOTAL ORDERS
    $count_orders = $myObj->getRows('user_orders', "user_id = '$player'");

    // FETCHING USER Pending ORDERS
    $count_Pen = $myObj->getRows('user_orders', "status = 'Pending' && user_id = '$player' ");

    // FETCHING USER Completed ORDERS
    $count_Com = $myObj->getRows('user_orders', "status = 'Completed' && user_id = '$player' ");
} else {
    echo '<script>window.location.href="login.php"</script>';
}

if (isset($_SESSION['user_update'])) {
    $user_update =  $_SESSION['user_update'];
}

$myObj->sql("SELECT * FROM manage_players");
$run_US   = $myObj->getResult();
if ($run_US > 0) {
    foreach ($run_US as $row_US) {
        $facebook = $row_US["facebook"];
        $instagram = $row_US["instagram"];
        $youtube = $row_US["youtube"];
        $twitter = $row_US["twitter"];
    }
}

if (isset($_POST['add_socials'])) {
    $facebook  = $myObj->escapeString($_POST['facebook']);
    $instagram = $myObj->escapeString($_POST['instagram']);
    $youtube   = $myObj->escapeString($_POST['youtube']);
    $twitter   = $myObj->escapeString($_POST['twitter']);

    $params = [
        'facebook'  => $facebook,
        'instagram' => $instagram,
        'youtube'   => $youtube,
        'twitter'   => $twitter
    ];

    $myObj->update('manage_players', $params, "id = '$player'");
    $run_social = $myObj->getResult();
    if ($run_social) {
        // echo "Update";
    } else {
        echo "update fail";
    }
}
?>
<!-- ===== User Profile ===== -->
<div class="container-fluid bannerBg"
    style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(admin/assets/upload/<?php echo $profile; ?>);">
    <div class="row">
        <div class="col text-light">
            <h1 class="title">My Profile</h1>
        </div>
    </div>
</div>
<!-- Banner End -->
<div class="container-fluid">
    <div class="container my-5">
        <h1 class="title text-center my-3"></h1>
        <div class="row Box_Shadow">
            <?php echo $login; ?>
            <?php echo $chang_pass; ?>
            <?php echo $repo_msg; ?>
            <?php echo $Candi_msg;
            unset($_SESSION['Candi_msg']);
            ?>
            <?php echo $user_update;
            unset($_SESSION['user_update']);
            ?>
            <div class="col">
                <div class="user-card-full row">
                    <div class="col-md-6 user-profile">
                        <div class="user-block text-center ">
                            <div class="user-profile-img mx-auto mb-3">
                                <img src="admin/assets/upload/<?php echo $profile; ?>" class="img-fluid" alt="User">
                            </div>
                            <h2 class="user-name m-0">
                                <?php echo $user_name; ?></h2>
                            <p class="user-username">
                                <?php echo $user_uname; ?></p>
                        </div>
                        <ul class="social-link text-start mb-0 pb-0">
                            <li>
                                <a href="log_out.php" class="SignUp-Btn text-light text-decoration-none">Logout</a>
                            </li>
                            <li>
                                <a href="update-user.php?update_user=<?php echo $player; ?>"
                                    class="SignUp-Btn text-light text-decoration-none">Update</a>
                            </li>
                            <li>
                                <button type="button" class="SignUp-Btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Add Social
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Social Media Links
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <form action="" class="form_main" method="POST">
                                                    <input type="text" name="facebook" id=""
                                                        class="col-12 mt-2 inputField" value="<?php echo $facebook; ?>">
                                                    <input type="text" name="instagram" id=""
                                                        class="col-12 mt-2 inputField" value="<?php echo $instagram; ?>">
                                                    <input type="text" name="youtube" id=""
                                                        class="col-12 mt-2 inputField" value="<?php echo $youtube; ?>">
                                                    <input type="text" name="twitter" id=""
                                                        class="col-12 mt-2 inputField" value="<?php echo $twitter; ?>">
                                                    <button type="submit" name="add_socials"
                                                        class="SignUp-Btn">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 user-card-info border border-top-0 border-bottom-0 border-end-0 p-0">
                        <div class="card-block">
                            <!-- Tabs Start  -->
                            <ul class="nav nav-pills Box_Shadow user-pills-parent " id="pills-tab" role="tablist">
                                <li class="nav-item Pills_Items" role="presentation">
                                    <button class="nav-link active user-pills" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">Profile</button>
                                </li>
                                <li class="nav-item Pills_Items" role="presentation">
                                    <button class="nav-link user-pills" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">Orders</button>
                                </li>

                            </ul>
                            <div class="tab-content padding-20" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="m-b-10 f-w-600">Email</p>
                                            <h6 class="text-muted f-w-400">
                                                <?php echo $user_email; ?></h6>
                                        </div>
                                        <div class="col-6">
                                            <p class="m-b-10 f-w-600">Account Status</p>
                                            <h6 class="text-muted f-w-400">
                                                <?php echo $UStatus_msg; ?></h6>
                                        </div>
                                    </div>
                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Match info</h6>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="m-b-10 f-w-600">Match Status</p>
                                            <h6 class="text-muted f-w-400">
                                                <?php echo $Candi_Status; ?>
                                            </h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="text-muted f-w-400">
                                                <?php
                                                if ($Candi_Status == '') {
                                                    echo '<p>You did not apply for Match.</p>';
                                                } else {
                                                    echo $status_msg;
                                                }
                                                ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Report Result</h6>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="m-b-10 f-w-600">Report Status</p>
                                            <h6 class="text-muted f-w-400">
                                                <?php echo $Repo_Status; ?>
                                            </h6>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="text-muted f-w-400">
                                                <?php echo $Repo_Status_msg; ?>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <div class="row text-center mb-3">
                                        <div class="col-6">
                                            <p class="m-b-10 f-w-600">Your Orders</p>
                                            <div class="Pending_orders_info">
                                                <span><?php echo $count_orders; ?></span>
                                            </div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <div class="Pending_orders_info">
                                                <a href="manage-orders.php" class="SignUp-Btn text-decoration-none">
                                                    View More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row text-center mb-3">
                                        <div class="col-6">
                                            <p class="m-b-10 f-w-600">Pending Orders</p>
                                            <div class="Pending_orders_info">
                                                <span><?php echo $count_Pen; ?></span>
                                            </div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <div class="Pending_orders_info">
                                                <a href="manage-orders.php" class="SignUp-Btn text-decoration-none">
                                                    View More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col-6">
                                            <p class="m-b-10 f-w-600">Completed Orders</p>
                                            <div class="Pending_orders_info">
                                                <span><?php echo $count_Com; ?></span>
                                            </div>
                                        </div>
                                        <div class="col-6 text-end">

                                            <div class="Pending_orders_info">
                                                <a href="manage-orders.php" class="SignUp-Btn text-decoration-none">
                                                    View More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ===== User Profile ===== -->
<?php include('user\include\footer.php'); ?>