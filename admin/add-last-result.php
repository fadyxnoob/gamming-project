<?php 
    include('include/conection.php');
    include('include/header.php');
    include('include/sidebar.php');
    $data_msg = $key_nums = $last_match_id = '';

    // last match fetched
    $approved_candidates = '';
    $fetch               = "SELECT * FROM manage_match WHERE `status` = 'Played' ORDER BY id ASC ";
    $data                = mysqli_query($conn, $fetch);
    while($row           = mysqli_fetch_array($data)){
        $last_match_id   = $row['id'];   
        $Player1         = $row['player1'];
        $player2         = $row['player2'];


            $approved_candidates .='<tr>
                                        <td>'.$last_match_id.'</td>
                                        <td>'.$Player1.'      </td>
                                        <td>'.$player2.'      </td>
                                    </tr>';
    }
    // Set Button
    if(isset($_POST['add'])){
        $winner         = $_POST['winner'];
        $loser          = $_POST['loser'];
        $Wscore         = $_POST['Wscore'];
        $Lcores         = $_POST['Lcores'];
        $final          = $_POST['type'];

        // Insert Data
        $insert_data =  "INSERT INTO `last_result`(`winner`, `loser`, `w_scores`, `l_scores`,`final`, `match_id`)
        VALUES ('$winner','$loser','$Wscore','$Lcores','$final','$last_match_id');";  
        $insert_data .= "UPDATE manage_match SET `status` = 'Clear' WHERE id = '$last_match_id';";     
        $insert_data .= "UPDATE manage_candidate SET `status` = 'Out' WHERE uname = '$loser';";   
        $insert_data .= "UPDATE manage_candidate SET `status` = 'Winner' where uname = '$winner'";   

        $run = mysqli_multi_query($conn, $insert_data);
        if ($run) {
        // $data_msg = 'Update Query Pass';
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
                    <?php echo $data_msg;?>
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
                                    <input type="text" name="Lcores" value="" class="inputField" id="title">
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
<?php include('include/footer.php');?>