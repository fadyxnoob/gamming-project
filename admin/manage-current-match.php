<?php 
    include('include/header.php');
    include('include/sidebar.php');
    $current_matches = $single_match = '';

        //    fetch data from tbl
      $myObj->sql("SELECT * FROM manage_match where status != 'Pending'");
      $data   =  $myObj->getResult();
      if($data > 0){
        $serial = 0;
        foreach($data as $row){
          $serial     = $serial + 1;
          $match_id = $row['id'];   
          $p1       = $row['player1'];
          $p2       = $row['player2'];
          $match_status = $row['status'];
          if($match_status == 'Approved'){
              $status_btn = '<a href="match-status.php?match_played='.$match_id.'&status=Played" class="btn btn-danger"><i class="fa-solid fa-wifi bg-danger"></i></a>';
              }else{
                  $status_btn ='<a href="match-status.php?match_played='.$match_id.'&status=Approved" class="btn btn-success"><i class="fa-solid fa-wifi bg-succss"></i></a>';
              }
                $current_matches .='<tr>
                    <td>'.$serial.'   </td>
                    <td>'.$p1.'       </td>
                    <td>'.$p2.'        </td> 
                    <td>'.$status_btn.'</td>
                    </tr>';
        }
      }
      
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Current Matches</li>
        </ol>
        <div class="row">
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Player 1</th>
                                <th scope="col">Player 2</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $current_matches; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>