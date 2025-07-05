<?php 
    $data_msg = $key_nums = $se_players  = $Winner_players =  $winner_candidates  = '';

    include('include/header.php');
    include('include/sidebar.php');   
    // Set Button
    if(isset($_POST['add'])){
        $player1         = $_POST['player1'];
        $player2         = $_POST['player2'];
        $status          = 'Pending';
        $params = [
            'player1' =>  $player1,
            'player2' => $player2,
            'status' => $status,
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
    $myObj->select('manage_candidate', '*', "status = 'Qualified' ", null, null);
    $data   = $myObj->getResult();
    $serial = 0;
    if($data > 0){
        foreach($data   as $row){
            $serial     = $serial + 1;
            $c_id       = $row['id'];   
            $ign_name   = $row['ign_name'];
            $ig_id      = $row['ig_id'];
            $p_id       = $row['p_id'];
            
            $myObj->select('manage_players', '*', "id = '$p_id'", null, null);
            $run_profile = $myObj->getResult();
            if($run_profile > 0){
                foreach($run_profile as $data_profile){
                    $se_players .='<option class="inputField" selected>'.$data_profile['uname'].'</option>';  
                    $name1 =$data_profile['uname'];
                    $img='<img src="assets/upload/'.$data_profile['profile'].'" width="50px"height="50px">';  
                }
            }
        }
    }

    $myObj->select('manage_candidate', '*', "status = 'Winner' ", null, null);
    $data_winners   = $myObj->getResult();
    $serial = 0;
    if($data_winners > 0){
        foreach($data_winners   as $row){
            $serial          = $serial + 1;
            $c_id            = $row['id'];   
            $Winner_players .='<option class="inputField" selected>'.$row['uname'].'</option>'; 
            $ign_name        = $row['ign_name'];
            $ig_id           = $row['ig_id'];
            $wp_id           = $row['p_id'];
            
            $myObj->select('manage_players', '*', "id = '$wp_id' ", null, null);
            $RW_profile      = $myObj->getResult();
            if($RW_profile > 0){
                foreach($RW_profile as  $DW_profile){
                    $winer_prof      = '<img src="assets/upload/'.$DW_profile['profile'].'" width="50px"height="50px">';  
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
                                <?php echo $data_msg;?>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label"> Player 1</label>
                                    <select name="player1" id="" class="inputField">
                                        <?php echo $se_players;
                                                echo $Winner_players;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Player 2</label>
                                    <select name="player2" id="" class="inputField">
                                        <?php echo $se_players;
                                            echo $Winner_players;
                                        ?>
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
        </div>
    </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include/footer.php');?>