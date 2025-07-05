<?php
include('user/include/header.php');
$upcomming_matches = $matches_results = $img1 = $img2 = $CandiA_uname = $CandiB_uname = $current_matches = $current_match = '';
// ========= CURRENT MATCH ========= //

$myObj->select('manage_match', '*', 'status = "Approved"', 'id ASC', 1);
$matchesResult = $myObj->getResult();

if ($matchesResult > 0) {
    foreach ($matchesResult as $data) {
        $match_id = $data['id'];
        $Player_A = $data['player1'];
        $Player_B = $data['player2'];

        // Fetching Candidate uname for Player A
        $myObj->select('manage_candidate', '*', "uname = '$Player_A'", null, null);
        $playerAResult = $myObj->getResult();
        // print_r($playerAResult);

        if ($playerAResult > 0) {
            foreach ($playerAResult as $dataPlayerA) {
                $candiA_uname = $dataPlayerA['uname'];
                $CandiA_Avtar = $dataPlayerA['p_id'];
            }
        }

        $myObj->select('manage_players', 'profile', "id = '$CandiA_Avtar'", null, null);
        $run_profileA = $myObj->getResult();

        // Check if result is not empty
        if (!empty($run_profileA)) {
            foreach ($run_profileA as $dataPlayerA) {
                $imgA = '<img src="admin/assets/upload/' . $dataPlayerA['profile'] . '" alt="player">';
            }
        } else {
            $imgA = '<p class="text-danger">No image found</p>';
        }

        // Fetching Candidate uname for Player B
        $myObj->select('manage_candidate', '*', "uname = '$Player_B' ", null, null);
        $playerBResult = $myObj->getResult();
        if ($playerBResult > 0) {
            foreach ($playerBResult as $dataPlayerB) {
                $candiB_uname = $dataPlayerB['uname'];
                $candiB_Avtar = $dataPlayerB['p_id'];
            }
        }

        $myObj->select('manage_players', 'profile', 'id = ' . $candiB_Avtar . '', null, null);
        $run_profileB = $myObj->getResult();
        if ($run_profileB > 0) {
            foreach ($run_profileB as $dataPlayerB) {
                $imgB = '<img src="admin/assets/upload/' . $dataPlayerB['profile'] . '" alt="player">';
            }
        }

        $current_match .= '<div class="row">
                <div class="col-12 text-center pt-5 sm-heading">
                    <h3 class="title">Current Match</h3>
                    <p class="fs-4">Here is the Candidates of Current Match</p>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="img-box">
                        <div class="inner-img-box">
                            ' . $imgA . '
                        </div>
                    </div>
                    <h3 class="h4 fs-1 text-center text-capitalize">' . $candiA_uname . '</h3>
                </div>
                <div class="col-md-4 d-none d-lg-flex match-bw">
                    <h3 class="h1 fs-5"><span>V</span><span>/</span><span>S</span> </h3>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="img-box">
                        <div class="inner-img-box">
                          ' . $imgB . '
                        </div>
                    </div>
                    <h4 class="h4 fs-1 text-center text-capitalize">' . $candiB_uname . '</h4>
                </div>
            </div>';
    }
} else {
    echo '<p>No Match Found</p>';
}


// ========= NEXT MATCHES ========= //
//    fetch data from tbl
$myObj->select('manage_match', '*', 'status = "Approved"', null, null);
$matchesOfPlayers = $myObj->getResult();
// print_r($matchesOfPlayers);

if (!empty($matchesOfPlayers)) {
    foreach ($matchesOfPlayers as $rowONe) {
        $match_id  = $rowONe['id'];
        $p1        = $rowONe['player1'];
        $p2        = $rowONe['player2'];

        // === Fetching Candidate uname key for $p1 ===
        $myObj->select('manage_candidate', '*', "uname = '$p1'", null, null);
        $key_value_p1 = $myObj->getResult();

        // Print data (for debug)
        // print_r($key_value_p1);

        if (!empty($key_value_p1)) {
            // Since uname is likely unique, take first item
            $keyData1 = $key_value_p1[0];
            $key_nums_p1 = $keyData1['uname'];
            $CP_Id1 = $keyData1['p_id'];

            // === Fetching Player Profile Using p_id ===
            $myObj->select('manage_players', 'profile', "id = '$CP_Id1'", null, null);
            $CPL_Data1 = $myObj->getResult();

            if (!empty($CPL_Data1)) {
                $keyData2 = $CPL_Data1[0];
                $CPL_one = '<img src="admin/assets/upload/' . $keyData2['profile'] . '" width="50px" height="50px">';
            } else {
                $CPL_one = '<p class="text-danger">No profile image found.</p>';
            }
        } else {
            $CPL_one = '<p class="text-warning">Player not found by uname.</p>';
        }



        // === Fetching Candidate uname key for $p2 ===
        $myObj->select('manage_candidate', '*', "uname = '$p2'", null, null);
        $key_value_p2 = $myObj->getResult();

        if (!empty($key_value_p2)) {
            $keyData2 = $key_value_p2[0]; // Use first item directly
            $key_nums_p2 = $keyData2['uname'];
            $CP_Id2 = $keyData2['p_id'];

            // === Fetching Player Profile Using p_id ===
            $myObj->select('manage_players', 'profile', "id = '$CP_Id2'", null, null);
            $CPL_Data2 = $myObj->getResult();

            if (!empty($CPL_Data2)) {
                $playerData2 = $CPL_Data2[0];
                $CPL_two = '<img src="admin/assets/upload/' . $playerData2['profile'] . '" width="50px" height="50px">';
            } else {
                $CPL_two = '<p class="text-danger">Profile image not found.</p>';
            }
        } else {
            $CPL_two = '<p class="text-warning">Player not found.</p>';
        }


        $current_matches .= '<div class="row m-0 my-5">
                <div class="col-6 match-images p-2">
                    <div class="row m-0">
                        <div class="col-4">
                            <div class="player-img">
                                ' . $CPL_one . '
                                <h2 class="fs-5 player-name py-2 text-center text-capitalize">
                                    ' . $key_nums_p1 . '
                                </h2>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-center align-items-center">
                            <div class="vs-img">
                            <img src="user/assets/images/shedule/vs_finished.png" alt="">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="player-img">
                                ' . $CPL_two . '
                                <h3 class="fs-5 player-name py-2 text-center text-capitalize">
                                    ' . $key_nums_p2 . '
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 text-light text-center pt-4">
                        <div class="match-about">
                        <div class="m-cate d-flex justify-content-evenly">
                            <h3 class="h5 text-dark"> Match Date</h3>
                        </div>
                        <div class="match-time mt-2 text-dark">
                            12 May 2023 
                        </div>
                    </div>
                </div>
            </div>';
    }
}

// ========= Comming Matches ========= //
//    fetch data from tbl
$myObj->select('manage_match', '*', 'status = "Pending"', null, null);
$pandingMatchesdata   =  $myObj->getResult();

if ($pandingMatchesdata > 0) {
    foreach ($pandingMatchesdata as $row) {
        $match_id   = $row['id'];
        $up1        = $row['player1'];
        $up2        = $row['player2'];
        $up2date    = $row['date'];
        $Up_date    = date('d M Y', strtotime($up2date));

        // Fetching Candidate primary key for $p1
        $myObj->select('manage_candidate', '*', "uname = '$up1'", null, null);
        $key_num_p1 = $myObj->getResult();

        if (!empty($key_num_p1)) {
            $key_value_p1 = $key_num_p1[0]; // Get first row
            $key_nums_p1 = $key_value_p1['id'];
            $UCPL_Id1 = $key_value_p1['p_id'];
            $key_uname_p1 = $key_value_p1['uname'];

            // Now get profile image from manage_players
            $myObj->select('manage_players', 'profile', "id = '$UCPL_Id1'", null, null);
            $RUC_PL1 = $myObj->getResult();

            if (!empty($RUC_PL1)) {
                $UC_PLD1 = $RUC_PL1[0];
                $UC_PLimg1 = '<img src="admin/assets/upload/' . $UC_PLD1['profile'] . '" width="50px" height="50px">';
            } else {
                $UC_PLimg1 = '<p class="text-danger">Profile not found</p>';
            }
        } else {
            $UC_PLimg1 = '<p class="text-warning">Candidate not found</p>';
        }


        // === Fetching Candidate primary key for $p2 ===
        $myObj->select('manage_candidate', '*', "uname = '$up2'", null, null);
        $key_num_p2 = $myObj->getResult();

        if (!empty($key_num_p2)) {
            $key_value_p2 = $key_num_p2[0]; // First (or only) row
            $key_nums_p2 = $key_value_p2['id'];
            $UCPL_Id2 = $key_value_p2['p_id'];
            $key_uname_p2 = $key_value_p2['uname'];

            // === Fetch player profile by player id ===
            $myObj->select('manage_players', 'profile', "id = '$UCPL_Id2'", null, null);
            $RUC_PL2 = $myObj->getResult();

            if (!empty($RUC_PL2)) {
                $UC_PLD2 = $RUC_PL2[0];
                $UC_PLimg2 = '<img src="admin/assets/upload/' . $UC_PLD2['profile'] . '" width="50px" height="50px">';
            } else {
                $UC_PLimg2 = '<p class="text-danger">Profile not found</p>';
            }
        } else {
            $UC_PLimg2 = '<p class="text-warning">Candidate not found</p>';
        }

        $upcomming_matches .= '<div class="row m-0 my-5">
                <div class="col-6 match-images p-2">
                    <div class="row m-0">
                        <div class="col-4">
                            <div class="player-img">
                                ' . $UC_PLimg1 . '
                                <h3 class="fs-5 player-name py-2">
                                ' . $key_uname_p1 . '
                                </h3>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-center align-items-center">
                            <div class="vs-img mt-5">
                            <img src="user/assets/images/shedule/vs_finished.png" alt="">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="player-img">
                            ' . $UC_PLimg2 . '
                                <h4 class="fs-5 player-name py-2">
                                ' . $key_uname_p2 . '
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 text-light text-center pt-4">
                <div class="match-about">
                        <div class="m-cate d-flex justify-content-evenly">
                            <h4 class="h5 text-dark text-center"> Match Date</h4>
                        
                        </div>
                        <div class="match-time mt-2 text-dark">
                        ' . $Up_date . '
                        </div>
                    </div>
                </div>
            </div>';
    }
}

// =========  RESULTS =========
//Fething data from tbl
$myObj->select('last_result', '*', null, 'id DESC', null);
$data           =  $myObj->getResult();

if ($data > 0) {
    foreach ($data as $row) {
        $match_id    = $row['id'];
        $winner      = $row['winner'];
        $loser       = $row['loser'];
        $w_scors     = $row['w_scores'];
        $l_scores    = $row['l_scores'];
        $match_date1 = $row['date'];
        $match_date  = date('d M Y', strtotime($match_date1));

        // Fetching Candidate uname key for $p1
        $myObj->select('manage_candidate', '*', "uname = '$winner'", null, null);
        $key_num_p1 = $myObj->getResult();
        // print_r($key_num_p1);
        
        if (!empty($key_num_p1)) {
            $key_value_p1 = $key_num_p1[0]; // First row
            $p1_name = $key_value_p1['uname'];
            $p1_avtar = $key_value_p1['p_id'];

            // Fetch profile image
            $myObj->select('manage_players', 'profile', "id = '$p1_avtar'", null, null);
            $RR_Qu1 = $myObj->getResult();

            if (!empty($RR_Qu1)) {
                $RD_1 = $RR_Qu1[0];
                $RPL_1img = '<img src="admin/assets/upload/' . $RD_1['profile'] . '" width="50px" height="50px">';
            } else {
                $RPL_1img = '<p class="text-danger">Profile not found</p>';
            }
        } else {
            $RPL_1img = '<p class="text-warning">Candidate not found</p>';
        }

        // === Fetching Candidate uname key for $p2 (loser) ===
        $myObj->select('manage_candidate', '*', "uname = '$loser'", null, null);
        $key_num_p2 = $myObj->getResult();

        if (!empty($key_num_p2)) {
            $key_value_p2 = $key_num_p2[0]; // Get first row
            $p2_name = $key_value_p2['uname'];
            $p2_avtar = $key_value_p2['p_id'];

            // === Fetch profile image from manage_players ===
            $myObj->select('manage_players', 'profile', "id = '$p2_avtar'", null, null);
            $RR_Qu2 = $myObj->getResult();

            if (!empty($RR_Qu2)) {
                $RD_2 = $RR_Qu2[0];
                $RPL_2img = '<img src="admin/assets/upload/' . $RD_2['profile'] . '" width="50px" height="50px">';
            } else {
                $RPL_2img = '<p class="text-danger">Profile image not found</p>';
            }
        } else {
            $RPL_2img = '<p class="text-warning">Loser not found</p>';
        }

        $matches_results .= '<div class="row m-0 my-5 pt-0">
                <div class="col-6 match-images p-2 pt-0">
                    <div class="row m-0 pt-0 ">
                        <div class="col-4">
                            <div class="h4 text-success">Winner</div>
                            <div class="player-img">
                                ' . $RPL_1img . '
                                <h4 class="fs-5 player-name py-2">
                                    ' . $p1_name . '
                                </h4>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-center align-items-center">
                            <div class="vs-img mt-5">
                            <img src="user/assets/images/shedule/vs_finished.png" alt="">
                            </div>
                        </div>
                        <div class="col-4">
                            <h4 class="fs-5 loser-cate">Loser</h4>   
                            <div class="player-img">
                                ' . $RPL_2img . '
                                <p class="h4 player-name fs-5 py-2">
                                    ' . $p2_name . '
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 text-light text-center pt-4">
                    <div class="match-about">
                        <div class="m-cate d-flex justify-content-evenly">
                            <p class="h5 text-dark"> Match Date</p>
                        </div>
                        <div class="match-time mt-2 text-dark">
                            ' . $match_date . '
                        </div>
                        <div class="match-time mt-2 text-dark">
                            <p><span>Scores</span> ' . $w_scors . '/' . $l_scores . '</p>
                        </div>
                    </div>
                </div>
            </div>';
    }
}

?>
<!-- ===== Current MACH START ===== -->
<div class="container-fluid single-match">
    <div class="container">
        <?php echo  $current_match; ?>
        <!-- ===== Next Match End ===== -->
    </div>
</div>
<!-- Content Start -->
<div class="container-fluid my-5">
    <div class="container">
        <div class="row m-0">
            <div class="col-10 mx-auto text-center">
                <h2 class="h1 title">See Shedules Here</h2>
            </div>
            <div class="col-12 mx-auto ">
                <div class="shedule-detail ">
                    <!-- Tabs start -->
                    <div class="tab-bg">
                        <ul class="nav nav-pills tab-bar" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation" id="Crrunt_Matches">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Next Matches</button>
                            </li>
                            <li class="nav-item" role="presentation" id="UpComming_Matches">
                                <button class="nav-link up-match-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">Comming Matches</button>
                            </li>
                            <li class="nav-item" role="presentation" id="Result_Matches">
                                <button class="nav-link result-match-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false"> Results</button>
                            </li>
                        </ul>
                        <div class="tab-content shedule-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <?php
                                if (!$current_matches) {
                                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Unfortunaitly!</strong> No Match Found
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>';
                                } else {
                                    echo $current_matches;
                                }
                                ?>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <?php
                                if (!$upcomming_matches) {
                                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Unfortunaitly!</strong> No Match Found
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>';
                                } else {
                                    echo $upcomming_matches;
                                }
                                ?>
                            </div>
                            <!-- ===== Matches Results -->
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                <?php
                                if (!$matches_results) {
                                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Unfortunaitly!</strong> No Result Found
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>';
                                } else {
                                    echo $matches_results;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- Tabs end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content End -->
<?php include('user\include\footer.php'); ?>