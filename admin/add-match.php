<?php

$data_msg = $key_nums = $se_players  = $Winner_players =  $winner_candidates  = '';

include('include/header.php');
include('include/sidebar.php');

// Set Button
if (isset($_POST['add'])) {
    $player1         = $_POST['player1'];
    $player2         = $_POST['player2'];
    $status          = 'Pending';
    $params = [
        'player1' => $player1,
        'player2' => $player2,
        'status'  => $status,
    ];

    // fetching candidates id from tbl by uname 
    // Insert Data 
    $myObj->insert('manage_match', $params);
    $run = $myObj->getResult();
    if ($run) {

        // Assuming $myObj is properly set up with a connection
        $myObj->update('manage_candidate', ['status' => 'Match'], "uname = '$player1'");
        $myObj->update('manage_candidate', ['status' => 'Match'], "uname = '$player2'");

        echo '<script>window.location.href="manage-upcomming-match.php"</script>';
        exit();
    } else {
        $data_msg = '<p class="bg-danger p-2 text-light">Match Not Added</p>';
    }
}

// <!-- ===== Fetching Approved Candidates -->
$myObj->select('manage_candidate', '*', "status = 'Qualified'", null, null);
$qualifiedPlayers = $myObj->getResult();

// counting qualified players
$myObj->getRows('manage_candidate', "status = 'Qualified'");
$countQualified = $myObj->getResult();

if (!empty($qualifiedPlayers)) {
    foreach ($qualifiedPlayers as $row) {

        $c_id     = $row['id'];
        $ign_name = $row['ign_name'];
        $ig_id    = $row['ig_id'];
        $p_id     = $row['p_id'];

        // Get player profile by p_id
        $myObj->select('manage_players', '*', "id = '$p_id'", null, null);
        $run_profile = $myObj->getResult();

        if (!empty($run_profile)) {
            foreach ($run_profile as $data_profile) {
                $uname = $data_profile['uname'];
                $profileImg = $data_profile['profile'];

                $se_players .= '<option class="inputField" value="' . $uname . '">' . $uname . '</option>';
                $name1 = $uname;
                $img = '<img src="assets/upload/' . $profileImg . '" width="50px" height="50px">';
            }
        }
    }
}


// <!-- ===== Fetching Winner Candidates -->
$myObj->select('manage_candidate', '*', "status = 'Winner' ", null, null);
$winnerPlayers = $myObj->getResult();

// counting winner players
$myObj->getRows('manage_candidate', "status = 'Winner'");
$countWinners = $myObj->getResult();

if (!empty($winnerPlayers)) {
    foreach ($winnerPlayers as $row) {
        $serial++;
        $c_id     = $row['id'];
        $uname    = $row['uname'];
        $ign_name = $row['ign_name'];
        $ig_id    = $row['ig_id'];
        $wp_id    = $row['p_id'];

        // Append option (remove 'selected' unless it's single selection)
        $Winner_players .= '<option class="inputField" value="' . $uname . '">' . $uname . '</option>';

        // Get player profile
        $myObj->select('manage_players', '*', "id = '$wp_id'", null, null);
        $RW_profile = $myObj->getResult();

        if (!empty($RW_profile)) {
            foreach ($RW_profile as $DW_profile) {
                $imgPath = 'assets/upload/' . $DW_profile['profile'];
                $winner_profiles[] = '<img src="' . $imgPath . '" width="50px" height="50px">';
            }
        }
    }
}

?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <div class="container">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add New Match</li>
            </ol>
            <div class="row">
                <div class="col">
                    <form method="POST" class="form_main">
                        <div class="row">
                            <div class="col-12">
                                <?php echo $data_msg; ?>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">
                                        <?= ($countQualified > 0 || $countWinners > 0) ? 'Player 1' : 'No Players' ?>
                                    </label>
                                    <select name="player1" class="inputField" <?= ($countQualified > 0 || $countWinners > 0) ? '' : 'disabled' ?>>
                                        <?php
                                        echo $se_players;
                                        echo $Winner_players;
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">
                                        <?= ($countQualified > 0 || $countWinners > 0) ? 'Player 2' : 'No Players' ?>
                                    </label>
                                    <select name="player2" class="inputField" <?= ($countQualified > 0 || $countWinners > 0) ? '' : 'disabled' ?>>
                                        <?php
                                        echo $se_players;
                                        echo $Winner_players;
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-8">
                                <button
                                    type="<?= ($countQualified > 0 || $countWinners > 0) ? 'submit' : 'button' ?>"
                                    <?= ($countQualified > 0 || $countWinners > 0) ? '' : 'disabled' ?>
                                    name="add"
                                    class="btn SignUp-Btn">
                                    Add
                                </button>
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