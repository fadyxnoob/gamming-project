<?php 
    include('include\header.php');
    include('include\sidebar.php');
    
    $last_result  = $member_id ='';
    //    fetch data from tbl
      $myObj->sql("SELECT * FROM last_result where final = 'NO'");
      $data     = $myObj->getResult();
      if($data  > 0){
        $serial = 0;
        foreach($data as $row){
          $serial     = $serial + 1;
          $match_id   = $row['id'];   
          $winner     = $row['winner'];
          $loser      = $row['loser'];
          $w_scores   = $row['w_scores'];
          $l_scores   = $row['l_scores'];
          $scores     = $w_scores .'/'. $l_scores ;
          $Mdate      = $row['date'];
          $date       = date('d M Y', strtotime($Mdate));
  
          $last_result .='<tr>
                              <td>'.$serial.'     </td>
                              <td>'.$winner.'       </td>
                              <td>'.$loser.'      </td>
                              <td>'.$winner.'       </td>
                              <td>'.$scores.'       </td>
                              <td>'.$date.'        </td> 
                              <td>
                                  <a href="update-last-result.php?match_id='.$match_id.'" class="btn bg-info">
                                  <i class="fa-solid fa-pen-to-square"></i>
                                  </a>
                              </td>
                              <td>
                                  <a href="delete-last-result.php?match_id='.$match_id.'"class="btn bg-warning">
                                  <i class="fa-solid fa-trash"></i>
                                  </a> 
                              </td>
                          </tr>';
        }
      }
  
?>     
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Match's Results</li>
        </ol>
        <div class="row">
        <div class="col text-end mb-3">
                <a href="add-last-result.php" type="button" class="SignUp-Btn text-decoration-none">
                    <span data-feather="calendar"></span>
                    Add Result
                </a>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Player 1</th>
                                <th scope="col">Player 2</th>
                                <th scope="col">Winner</th>
                                <th scope="col">Scores</th>
                                <th scope="col">Date</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $last_result; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</main>
<!-- ===== MAIN END ===== -->

<?php include('include\footer.php'); ?>