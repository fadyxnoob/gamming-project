<?php
// dieclare variables
$data_msg = $key_nums = $se_players = $winner_candidates  = '';

include('include/header.php');
include('include/sidebar.php');

// Fetching Final Results
$myObj->select('last_result', '*', "final = 'Yes'", 'id DESC', 1);
$run_last_result = $myObj->getResult();

if (!empty($run_last_result)) {
    foreach ($run_last_result as $data_Last_Result) {
        $serial++;
        $Final_match_id = $data_Last_Result["id"];
        $winner         = $data_Last_Result["winner"];
        $loser          = $data_Last_Result["loser"];
        $w_scores       = $data_Last_Result["w_scores"];
        $l_scores       = $data_Last_Result["l_scores"];
        $final          = $data_Last_Result["final"];
        $date           = $data_Last_Result["date"];
        $rsult_date     = date('d M Y', strtotime($date));

        $winner_candidates .= '<tr>
            <td>' . $serial . '</td>
            <td>' . $winner . '</td>
            <td>' . $w_scores . '</td>
            <td>' . $loser . '</td>
            <td>' . $l_scores . '</td>
            <td>' . $rsult_date . '</td>
        </tr>';
    }
}

if (isset($_POST['add'])) {
    $winner   = $myObj->escapeString($_POST['winner']);
    $opponent = $myObj->escapeString($_POST['loser']);
    $scores   = $myObj->escapeString($_POST['scores']);

    if (!empty($winner) && !empty($opponent) && !empty($scores)) {
        // Step 1: Insert final winner
        $insertData = [
            'uname'    => $winner,
            'scores'   => $scores,
            'opponent' => $opponent
        ];
        $insertSuccess = $myObj->insert('final_winners', $insertData);
        if ($insertSuccess) {
            // Step 2: Update winner status
            $updateWinner = $myObj->update('manage_candidate', ['status' => 'Final Won'], "uname = '$winner'");

            // Step 3: Update loser status
            $updateLoser = $myObj->update('manage_candidate', ['status' => 'Final Loss'], "uname = '$opponent'");

            // Step 4: Update result match
            $updateFinal = $myObj->update('last_result', ['status' => 'Clear'], "id = '$Final_match_id'");

            // Final check
            if ($updateWinner && $updateLoser && $updateFinal) {
                echo '<script>window.location.href="manage-Fwinners.php"</script>';
                exit;
            } else {
                $data_msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p class="m-0 p-0">Error updating records.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        } else {
            $data_msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p class="m-0 p-0">Failed to insert final winner.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    } else {
        $data_msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p class="m-0 p-0">Please Fill all the Fields.</p>
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
                <li class="breadcrumb-item active">Add Final Result</li>
            </ol>
            <div class="row">
                <div class="col-12">
                    <?php echo $data_msg; ?>
                </div>
                <div class="col">
                    <form method="POST" class="form_main">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Winner</label>
                                    <input type="text" name="winner" class="inputField">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Opponent</label>
                                    <input type="text" name="loser" class="inputField">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Scores</label>
                                    <input type="text" name="scores" class="inputField">
                                </div>
                            </div>
                            <div class="col-8">
                                <button type="submit" name="add" class="SignUp-Btn">Add </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-5">
                <h4>Here are the winners of latest matches</h4>
                <div class="card mb-4">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Winner</th>
                                    <th scope="col">Scores</th>
                                    <th scope="col">Loser</th>
                                    <th scope="col">Scores</th>
                                    <th scope="col">Date</th>
                                    <!-- <th scope="col">Date</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $winner_candidates; ?>
                            </tbody>
                        </table>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include/footer.php'); ?>