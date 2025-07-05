<?php 
    include('include\header.php');
    include('include\sidebar.php');
    $up_matches = $candi_key =  $member = '';
     
      //    fetch data from tbl
      $myObj->sql("SELECT * FROM manage_match");
      $data   =  $myObj->getResult();
      if($data > 0){
        $serial = 0;
        foreach($data as $row){
            $serial++;
            $match_id     = $row['id'];  
            $p1           = $row['player1'];  
            $p2           = $row['player2'];  
            $date         = $row['date'];  
            $match_date   = date('d M', strtotime($date));
            $match_status = $row['status'];  
    
            if($match_status == 'Pending'){
                $status_btn = '<a href="match-status.php?match_id='.$match_id.'&status=Approved" class="btn btn-danger"><i class="fa-solid fa-wifi"></i></a>';
                }else{
                    $status_btn = '<a href="match-status.php?match_id='.$match_id.'&status=Pending" class="btn btn-success"><i class="fa-solid fa-wifi"></i></a>';
                }
                $up_matches .='
                            <tr>
                                <td>'.$serial.'</td> 
                                <td>'.$p1.'</td> 
                                <td>'.$p2.'</td> 
                                <td>'.$status_btn.'</td> 
                                <td>'.$match_date.'</td> 
                            </tr>';   
            }
      }

      
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Upcomming Matches</li>
        </ol>
        <div class="row">
            <div class="col text-end mb-3">
                <a href="add-match.php" class="SignUp-Btn text-decoration-none">Add Match</a>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                    <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Player 1</th>
                                    <th scope="col">Player 2</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $up_matches; ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>