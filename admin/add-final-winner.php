<?php 
    $data_msg = $key_nums = $se_players  ='';
    include('include/conection.php');
    include('include/header.php');
    include('include/sidebar.php');   
    
     // <!-- ===== Fetching Final Results -->
     $winner_candidates  = '';
     $fetch_last_result  = "SELECT * FROM last_result WHERE `final` = 'Yes' ORDER by id DESC Limit 1";
     $serial = 1;
     $run_last_result    = mysqli_query($conn,$fetch_last_result);
     while( $data_Last_Result   = mysqli_fetch_array($run_last_result)){
     $serial             =   $serial + 1;
     $Final_match_id      = $data_Last_Result["id"];
     $winner             = $data_Last_Result["winner"];
     $loser              = $data_Last_Result["loser"];
     $w_scores           = $data_Last_Result["w_scores"];
     $l_scores           = $data_Last_Result["l_scores"];
     $final              = $data_Last_Result["final"];
     $date               = $data_Last_Result["date"];
     $rsult_date         = date('d M Y', strtotime($date));

     $winner_candidates .='<tr>
               <td>'.$serial.'    </td>
               <td>'.$winner.'      </td>
               <td>'.$w_scores.'      </td>
               <td>'.$loser.'  </td>
               <td>'.$l_scores.'  </td>
               <td>'.$rsult_date.'     </td>
               </tr>';
     }
    // Set Button
    if(isset($_POST['add'])){
        $winner         = $_POST['winner'];
        $opponent       = $_POST['loser'];
        $scores         = $_POST['scores'];

        // fetching candidates id from tbl by uname 
        // Insert Data 
        
        $insert_data =  "INSERT INTO `final_winners`(`uname`, `scores`, `opponent`) 
        VALUES ('$winner','$scores','$opponent')";  
        $run = mysqli_query($conn,$insert_data);
        if($run){
            $update_qu ="UPDATE `manage_candidate` SET 
                                status = 'Final Won' 
                                where uname = '$winner';";
            $update_qu .="UPDATE `manage_candidate` SET 
                                status = 'Final Loss' 
                                where uname = '$opponent';";
            $update_qu .="UPDATE `last_result` SET 
                                status = 'Clear' 
                                where id = '$Final_match_id'";
            $run_up_qu = mysqli_multi_query($conn,$update_qu);
            echo '<script>window.location.href="manage-Fwinners.php"</script>';
        }else{
            $data_msg ='<p class="bg-danger p-2 text-light">Result Not Added</p>'; 
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
                <div class="col">
                    <form method="POST" class="form_main">
                        <div class="row">
                            <div class="col-12">
                                <?php echo $data_msg;?>
                            </div>
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
                                <?php  echo $winner_candidates; ?>
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