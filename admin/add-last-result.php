<?php
include('include/header.php');
include('include/sidebar.php');

$data_msg = $key_nums = $last_match_id = $approved_candidates = '';

$myObj->select('manage_match', '*', "`status` = 'Played'", 'id ASC', null);
$data = $myObj->getResult();

if (!empty($data)) {
    foreach ($data as $row) {
        $last_match_id = $row['id'];
        $Player1       = $row['player1'];
        $player2       = $row['player2'];

        $approved_candidates .= '<tr>
            <td>' . $last_match_id . '</td>
            <td>' . $Player1 . '</td>
            <td>' . $player2 . '</td>
        </tr>';
    }
}


// Set Button
if (isset($_POST['add'])) {
    if( empty($_POST['winner']) || empty($_POST['loser']) || empty($_POST['Wscore']) || empty($_POST['Lscore'])) {
      echo $data_msg = '<p class="bg-danger p-2 text-light">Please Fill All Fields</p>';
        //   echo '<script>window.location.href="add-last-result.php"</script>';
        return;
    }

    $winner     = $myObj->escapeString($_POST['winner']);
    $loser      = $myObj->escapeString($_POST['loser']);
    $Wscore     = $myObj->escapeString($_POST['Wscore']);
    $Lscore     = $myObj->escapeString($_POST['Lscore']);
    $final      = $myObj->escapeString($_POST['type']);

    // Step 1: Insert into last_result
    $insertSuccess = $myObj->insert('last_result', [
        'winner'   => $winner,
        'loser'    => $loser,
        'w_scores' => $Wscore,
        'l_scores' => $Lscore,
        'final'    => $final,
        'match_id' => $last_match_id
    ]);

    // Step 2: Update match status
    $updateMatch = $myObj->update('manage_match', ['status' => 'Clear'], "id = '$last_match_id'");

    // Step 3: Update loser status
    $updateLoser = $myObj->update('manage_candidate', ['status' => 'Out'], "uname = '$loser'");

    // Step 4: Update winner status
    $updateWinner = $myObj->update('manage_candidate', ['status' => 'Winner'], "uname = '$winner'");

    if ($insertSuccess && $updateMatch && $updateLoser && $updateWinner) {
        echo '<script>window.location.href="manage-results.php"</script>';
    } else {
        $data_msg = '<p class="bg-danger p-2 text-light">Result Not Added</p>';
    }
}
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <div class="container">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Last Result</li>
            </ol>
            <div class="row">
                <div class="col">
                    <?php echo $data_msg; ?>
                    <form method="POST" class="form_main">
                        <div class="row">
                            <div class="col-12">
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label"> Winner Name</label>
                                    <input type="text" name="winner" value="" class="form-control inputField" id="title"
                                        placeholder="Add usernme">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Loser Name</label>
                                    <input type="text" name="loser" value="" class="form-control inputField" id="title"
                                        placeholder="Add usernme">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="">Scores</label>
                                    <input type="text" name="Wscore" value="" class="inputField" id="title">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="">Scores</label>
                                    <input type="text" name="Lscore" value="" class="inputField" id="title">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="">Final</label>
                                    <select name="type" id="" class="inputField">
                                        <option value="Yes">Yes</option>
                                        <option value="No" selected>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-8">
                                <button type="submit" name="add" class="btn SignUp-Btn">Add </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-5">
                <div class="card mb-4">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th scope="col">Match Id</th>
                                    <th scope="col">Player 1</th>
                                    <th scope="col">Player 2</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $approved_candidates; ?>
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