<?php
    include('include/header.php');
    include('include/sidebar.php');
    $cat_name =  $data_msg = '';

    if(isset($_GET['match_id'])){
        $match_id = $_GET['match_id'];
        // fetch data
        $myObj->select('last_result', '*', "id ='$match_id'", null, null);
        $run   = $myObj->getResult();
        if($run > 0){
            foreach($run as $row){
                $match_id = $row['id'];
                $winner   = $row['winner'];
                $loser    = $row['loser'];
                $w_scores = $row['w_scores'];
                $l_scores = $row['l_scores'];
            }
        }
    }  

    if (isset($_POST['update_result'])) {
        $winner       = $_POST['winner'];
        $loser        = $_POST['loser'];
        $w_scores     = $_POST['w_scores'];
        $l_scores     = $_POST['l_scores'];
    
        // Validate and sanitize inputs
        $winner = htmlspecialchars($winner);
        $loser = htmlspecialchars($loser);
        $w_scores = htmlspecialchars($w_scores);
        $l_scores = htmlspecialchars($l_scores);
        $match_id = htmlspecialchars($match_id);
    
        $paramas = [
            'winner'   => $winner,
            'loser'    => $loser,
            'w_scores' => $w_scores,
            'l_scores' => $l_scores
        ];
    
        $update1 = $myObj->update('last_result', $paramas, "id = '$match_id'");
        $update2 = $myObj->update('manage_candidate', ['status' => 'Out'], "uname = '$loser'");
        $update3 = $myObj->update('manage_candidate', ['status' => 'Match'], "uname = '$winner'");
    
        if ($update1 && $update2 && $update3) {
            $update_run = $myObj->getResult();
            if ($update_run) {
                echo "Query Pass";
                echo '<script>window.location.href="manage-results.php"</script>'; 
                exit();
            } else {
                echo "Query Fail";
            }
        } else {
            echo "One or more updates failed.";
        }
    } 
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <div class="container">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Update Result</li>
            </ol>
            <div class="row">
                <div class="col">
                    <form method="POST" class="form_main">
                        <div class="row">
                            <div class="col-12">
                                <?php echo $data_msg;?>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label"> Winner Name</label>
                                    <input type="text" name="winner" value="<?php echo $winner; ?>"class="form-control inputField" id="title"
                                        placeholder="Add usernme">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Loser Name</label>
                                    <input type="text" name="loser" value="<?php echo $loser; ?>" class="form-control inputField" id="title"
                                        placeholder="Add usernme">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="">Winner Scores</label>
                                    <input type="text" name="w_scores" value="<?php echo $w_scores; ?>" class="inputField" id="title">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="">Loser Scores</label>
                                    <input type="text" name="l_scores" value="<?php echo $l_scores; ?>" class="inputField" id="title">
                                </div>
                            </div>
                            <div class="col-8">
                                <button type="submit" name="update_result" class="btn SignUp-Btn">Update </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- <div class="row mt-5">
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
                            <?php  $approved_candidates; ?>
                            </tbody>
                        </table>
                        </table>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</main>
<!-- ===== MAIN END ===== -->

<?php include('include\footer.php'); ?>