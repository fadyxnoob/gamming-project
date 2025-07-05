<?php 
    include('include\header.php');
    include('include\sidebar.php');

    $final_winners = '';
        //    fetch data from tbl
        $myObj->sql("SELECT * FROM final_winners ");
        $run           =  $myObj->getResult();
        if($run > 0){
            $serial        = 0;
            foreach($run as $row){
                $serial    = $serial + 1;
                $id        = $row['id'];   
                $uname     = $row['uname'];
                $scores    = $row['scores'];
                $opponent  = $row['opponent']; 
                $Mdate      = $row['date']; 
                $date       = date('d M Y', strtotime($Mdate));
    
    
                $final_winners .='<tr>
                        <td>'.$serial.'     </td>
                        <td>'.$uname.'       </td>
                        <td>'.$opponent.'       </td>
                        <td>'.$scores.'      </td>
                        <td>'.$date.'        </td> 
                        <td>
                            <a href="update-final.php?Final_id='.$id.'" class="btn bg-info">
                            <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td> 
                            <a href="delete-final.php?Final_id='.$id.'"class="btn bg-warning">
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
            <li class="breadcrumb-item active">Manage Final Winner</li>
        </ol>
        <div class="col text-end mb-3">
                <a href="add-final-winner.php" type="button" class="SignUp-Btn text-decoration-none">
                    <span data-feather="calendar"></span>
                    Add Winner
                </a>
            </div>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Winner</th>
                            <th scope="col">Loser</th>
                            <th scope="col">Scores</th>
                            <th scope="col">Date</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $final_winners; ?>
                    </tbody>
                </table>
            </div>
        </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>