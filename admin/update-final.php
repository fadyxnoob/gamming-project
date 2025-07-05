<?php
    include('include/header.php');
    include('include/sidebar.php');
    $cat_name =  $data_msg = '';
    if(isset($_GET['Final_id'])){
        $match_id = $_GET['Final_id'];

        // fetch data
        $myObj->select('final_winners', '*', "id = '$match_id' ", null, null);
        $run   = $myObj->getResult();
        if($run){
            foreach($run as $row){
                $winner =$row['uname'];
                $scores =$row['scores'];
                $loser =$row['opponent'];
            }
        }
    }
   
    if(isset($_POST['update_result'])){
        $winner       = $_POST['winner'];
        $loser        = $_POST['loser'];
        $scores       = $_POST['scores'];

        $params = [
            'uname' => $winner,
            'scores' => $scores,
            'opponent' => $loser
        ];
        
        $myObj->update('final_winners', $params, "id = '$match_id'");

        $myObj->update('manage_candidate', ['status' => 'Final Loss'], "uname = '$loser'");
        $myObj->update('manage_candidate', ['status' => 'Final Won'], "uname = '$winner'");
        $update_run = $myObj->getResult();
        if($update_run){
            echo "Query Pass";
            echo '<script>window.location.href="manage-Fwinners.php"</script>'; 
        }else{
            echo "Query Fail";
        }
    }
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <div class="container">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Update Final Result</li>
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
                                    <input type="text" name="winner" value="<?php echo $winner; ?>"class="form-control inputField" id="title"
                                        placeholder="Add usernme">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Loser</label>
                                    <input type="text" name="loser" value="<?php echo $loser; ?>" class="form-control inputField" id="title"
                                        placeholder="Add usernme">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="">Scores</label>
                                    <input type="text" name="scores" value="<?php echo $scores; ?>" class="inputField" id="title">
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