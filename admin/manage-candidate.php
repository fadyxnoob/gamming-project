<?php 
    $candidate =  $status_btn = '';
    include('include\header.php');
    include('include\sidebar.php');

    //    fetch data from tbl
    $myObj->sql("SELECT * FROM manage_candidate");
    $data   = $myObj->getResult();
    if($data > 0){
        foreach($data  as $row){
            $c_id       = $row['id'];   
            $ign_name   = $row['ign_name'];
            $ig_id      = $row['ig_id'];
            $status     = $row['status'];
            $date       = $row['date'];
            $p_date     = date('d M Y', strtotime($date));
            $p_time     = date('d M Y', strtotime($date));
            $p_id       = $row['p_id'];

            $myObj->select('manage_players', 'uname', "id = '$p_id'", null, null);
            $PL_name_run = $myObj->getResult();
            if($PL_name_run > 0){
                foreach($PL_name_run as $data_pl_name){
                    $Candi_name = $data_pl_name['uname'];
                }
            }
            
            if($status == 'Pending'){
                $status_btn = '<a href="candidate-status.php?c_id='.$c_id.'&status=Qualified" class="btn btn-warning"><i class="fa-solid fa-wifi"></i></a>';
            }else{
                $status_btn ='<a href="candidate-status.php?c_id='.$c_id.'&status=Pending" class="btn btn-success"><i class="fa-solid fa-wifi"></i></a>';
            }

            $myObj->select('manage_players', '*', "id = '$p_id'", null, null);
            $run_profile = $myObj->getResult();
            if($run_profile >0){
                foreach($run_profile as $data_profile){
                    $Candi_name = $data_profile['uname'];
                    $Candi_mail = $data_profile['mail'];
                    $img        ='<img src="assets/upload/'.$data_profile['profile'].'" width="50px"height="50px">'; 
                }
            }
            
            $candidate .='<tr>
                    <td>'.$p_id.'     </td>
                    <td>'.$Candi_name.'</td>
                    <td>'.$Candi_mail.'</td>
                    <td>'.$ign_name.'   </td>
                    <td>'.$ig_id.'      </td> 
                    <td>'.$status_btn.' </td> 
                    <td>'.$img.'        </td> 
                    <td>'.$p_date.'     </td> 
                    <td>'.$c_id.'     </td> 
                    </tr>';
        }
    }
       
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Manage Candidates</li>
        </ol>
        <div class="row">
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">PL id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">IG-Name</th>
                                <th scope="col">IG-ID</th>
                                <th scope="col">Status</th>
                                <th scope="col">Image</th>
                                <th scope="col">Date</th>
                                <th scope="col">Candy Id</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $candidate; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</main>
<!-- ===== MAIN END ===== -->

<?php include('include\footer.php'); ?>