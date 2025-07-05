<?php
include('user/include/header.php');

$uname = $email = $unameerror =  $emailerror = $fillmsg = $ignerror = $igiderror = '';

if (!isset($_SESSION['player'])) {
    echo '<script>window.location.href="login.php"</script>';
} else {
    $player = $_SESSION['player'];
    // $Status_qu = "SELECT * FROM `` where  ";
    $myObj->select('manage_players', '*', "id = '$player' ", null, null);
    $Status_data = $myObj->getResult();

    if ($Status_data > 0) {
        foreach ($Status_data as $result) {
            $Pl_Status = $result['status'];
            $Pl_Uname = $result['uname'];
            $Pl_Email = $result['mail'];
        }
    }
}

$player = $_SESSION['player'];

// Function Creating
function valid_data($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return ($data);
}

//isset button started
if (isset($_POST['register'])) {
    $ig_name           = $myObj->escapeString($_POST['ign']);
    $ig_id             = $myObj->escapeString($_POST['igid']);
    $status            = "Pending";

    //validations started
    if ($ig_name  != '' &&  $ig_id != '') {
        //in game name validations
        $ig_name = valid_data($_POST['ign']);
        if (!$ig_name) {
            $ignerror = "<p class='text-danger'>Type Letters and Numbers</p>";
        } else {
            $ignmsg = "success";
        }
        //in game id validations
        $ig_id = valid_data($_POST['igid']);
        if (($ig_id)) {
            $igid = "<p class='text-danger'>Type Only Numbers</p>";
        } else {
            $igid_msg = "success";
        }

        //data Insertion
        if ($ignmsg = "success" && $igid_msg = "success") {
            $params = [
                'uname'     => $Pl_Uname,
                'ign_name'  => $ig_name,
                'ig_id'     => $ig_id,
                'status'    => $status,
                'p_id'      => $player,
            ];

            $myObj->insert('manage_candidate', $params);
            $data = $myObj->getResult();
            
            if ($data) {
                $_SESSION['Candi_msg'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Please Wait!</strong> until we approved your request. 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                echo '<script>window.location.href="user-profile.php"</script>';
            } else {
                $fillmsg = "<p class='text-danger'>Regestration Failed</p>";
            }
        } else {
            $fillmsg = "An error accured";
        }
        //validations else
    } else {
        if (empty($_POST['uname'])) {
            $unameerror = "<p class='text-danger'>User Name is required</p>";
        }
        if (empty($_POST['email'])) {
            $emailerror = "<p class='text-danger'>Email is required</p>";
        }
        if (empty($_POST['ign'])) {
            $ignerror = "<p class='text-danger'>In-Game Name is required</p>";
        }
        if (empty($_POST['igid'])) {
            $igiderror = "<p class='text-danger'>In-Game ID is required</p>";
        }
        $fillmsg = '<div class="alert alert-info lead">
                        Please fill all the data
                    </div>';
    }
    // Checking Player if already register or not
    $myObj->sql("SELECT p_id FROM manage_candidate where p_id = '$player' < 0 ");
    $reg_data = $myObj->getResult();
    if (!$reg_data) {
        $reg_error = '<p class="text-dark">You are already registered,  </p>';
    }
}
?>

<body>
    <div class="container-fluid registster_tour bannerBg">
        <div class="row">
            <div class="col">
                <h1 class="title text-light">Register </h1>
            </div>
        </div>

    </div>
    <div class="container-fluid my-5 ">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <?php if ($Pl_Status == 'block') {
                        echo '<div class="row my-5 Box_Shadow p-5">
                                <div class="col-12 text-center">
                                <h1>You can not join yet,</h1>
                                <p class="fs-5">Your account is in review</p>
                                </div>
                                <div class="col-3">
                                    <a href="user-profile.php" class="SignUp-Btn text-decoration-none">Go Back</a>
                                </div>
                            </div>';
                    } else {
                        echo '<h1 class="title">Register for the tournament</h1>

                            <form method="POST" enctype="multipart/form-data" class=" px-5 py-3 text-light Box_Shadow">
                            
                            <div class="row mt-1">
                                <div class="col-md-6 mt-3">
                                    <label for="name" class="form-label text-dark">Username</label>
                                    <input type="disabled" name="uname" class="inputField" id="name" value="' . $Pl_Uname . '" disabled>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="email" class="form-label text-dark">Email address</label>
                                    <input type="disabled" name="email" class="inputField" id="email" value="' . $Pl_Email . '" disabled>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="pass" class="form-label text-dark">In-Game Name</label>
                                    <input type="text" name="ign" class="inputField" id="pass" placeholder="Enter in game name">
                                    <span> ' . $ignerror . ' </span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="conf_pass" class="form-label text-dark">In-Game ID</label>
                                    <input type="text" name="igid" class="inputField" id="conf_pass" placeholder="Enter in game id">
                                    <span>  ' . $igiderror . ' </span>
                                </div>
                                <div class="col-12 mt-3 d-flex justify-content-between">
                                    <span class="text-dark">You can not add new e-mail and user name while regestration</span>
                                    <button type="submit" name="register" class="SignUp-Btn py-2 px-5">Register</button>
                                </div>
                            </div>
                        </form>';
                    } ?>

                </div>
            </div>
        </div>
    </div>
    <?php include('user\include\footer.php') ?>