<?php 
    include('include/header.php');   
    include('include/sidebar.php');

     $Show_Users = $See_POrders = $DP_Orders  = $reports = $candidates = $login_msg ='';
     
        if(!isset($_SESSION['login'])){
            echo '<script>window.location.href="log-in.php"</script>';
        }else{
            $user = $_SESSION['login'];
        }         
        //  ================= MANAGE ORDERS
        // ========== FETCHING Pending Orders
        $myObj->select('user_orders', '*', "status = 'Pending' ", 'order_id DESC', 4);
        $data_pending   = $myObj->getResult();
        $count_pending = $myObj->getRows('user_orders', "status = 'Pending' ");
        $PO_COUNTER = '0';
        if($data_pending > 0){
            foreach($data_pending as $PNData){
                $PO_COUNTER = $PO_COUNTER + 1 ;
                $pn_id = $PNData['order_id'];
                $pn_name = $PNData['item_name'];
                $pn_price = $PNData['price'];
                $pn_quantity = $PNData['quantity'];
                $pn_status = $PNData['status'];
                $pn_pdid = $PNData['pd_id'];
    
                //    fetching buyer name
                $myObj->select('manage_order', '*', "id = '$pn_id' ", null, null);
                $buyer_data   = $myObj->getResult();
                if($buyer_data > 0){
                    foreach($buyer_data as $buyer_row){
                        $Buyer_Name   = $buyer_row["name"];
                    }
                }

    
                //  fetching Pending order product image
                $myObj->select('manage_products', '*', "id = '$pn_pdid' ", null, null);
                $Dpd_id   = $myObj->getResult();
                if($Dpd_id > 0){
                    foreach($Dpd_id as $rowPd_id){
                        $PO_img ='<img src="assets/upload/'.$rowPd_id['image'].'" width="50px" height="50px">';
                    }
                }
    
                //Change Active Status
                if($pn_status == 'Pending'){
                    $status_btn = '<a href="order-status.php?cpo_stts='.$pn_id.'&status=Completed" class="btn btn-warning"><i class="fa-solid fa-wifi"></i></a>';
                }else{
                    $status_btn ='<a href="order-status.php?cpo_stts='.$pn_id.'&status=Pending" class="btn btn-success"><i class="fa-solid fa-wifi"></i></a>';
                }
    
                $DP_Orders .='
                            <tr>
                                <td>'.$PO_COUNTER.'</td>
                                <td>'.$Buyer_Name.'</td>
                                <td>'.$pn_price.'</td>
                                <td>'.$pn_quantity.'</td>
                                <td>'.$pn_status.'</td>
                                <td>'.$status_btn.'</td>
                                <td>'.$PO_img.'</td>
                            </tr>
                            ';
            } 
        }
             
   
        // ============== MANAGE REPORTS
        // ========== FETCHING PENDING REPORTS
        $myObj->select('manage_reports', '*', "status = 'Pending' ", "id DESC", 4);
        $data_repos   =  $myObj->getResult();
        if($data_repos > 0){
            $count_repos  = $myObj->getRows('manage_reports', );
            $Repo_serial = 0;
            foreach($data_repos   as $Repo_row){
                $Repo_serial  = $Repo_serial + 1;
                $repo_id      = $Repo_row['id'];   
                $name         = $Repo_row['name'];
                $email        = $Repo_row['email'];
                $message      = $Repo_row['message'];
                $date         = $Repo_row['date'];
                $repo_date    = date('d M Y', strtotime($date));
                $Repo_status  = $Repo_row['status'];
        
                if($Repo_status == 'Pending'){
                    $status_btn = '<a href="repo-status.php?DR_id='.$repo_id.'&status=Checked"class="btn bg-danger text-light">
                        Pending
                    </a>';
                    }else{
                        $status_btn = '<button class="btn text-light bg-success">
                            <i class="fa-solid fa-wifi "></i>
                        </button>';
                    }
        
                    $reports .='<tr>
                            <td>'.$Repo_serial.'     </td>
                            <td>'.$name.'       </td>
                            <td>'.$email.'      </td>
                            <td>'.$message.'       </td>
                            <td>'.$repo_date.'        </td> 
                            <td>'.$status_btn.'</td>
                            </tr>';
              }
        }
        
        


        // ============== MANAGE CANDIDATES
        // ========== FETCHING PENDING CANDIDATES
        $Candi_serial = 0;
        $myObj->select('manage_candidate', '*', "status = 'Pending' ", 'id DESC', 4);
        $PC_Data   = $myObj->getResult();
        $PC_Count  = $myObj->getRows('manage_candidate', "status = 'Pending' ");
        if($PC_Data > 0){
            foreach($PC_Data     as $Candi_row){
                $Candi_serial     = $Candi_serial + 1;
                $Candi_id         = $Candi_row['id'];   
                $Candi_ign_name   = $Candi_row['ign_name'];
                $Candi_ig_id      = $Candi_row['ig_id'];
                $Candi_status     = $Candi_row['status'];
                $Candi_date       = $Candi_row['date'];
                $Candi_p_date     = date('d M Y', strtotime($Candi_date));
                $Candi_p_id       = $Candi_row['p_id'];
                if($Candi_status == 'Pending'){
                    $Candi_status_btn = '<a href="candidate-status.php?DC_id='.$Candi_id.'&status=Qualified" class="btn btn-warning"><i class="fa-solid fa-wifi"></i></a>';
                }else{
                    $status_btn ='<a href="candidate-status.php?DC_id='.$Candi_id.'&status=Pending" class="btn btn-success"><i class="fa-solid fa-wifi"></i></a>';
                }
                
                $myObj->select('manage_players', '*', "id = '$Candi_p_id'", null, null);
                $runc_profile = $myObj->getResult();
                if($runc_profile > 0){
                    foreach($runc_profile as $datac_profile){
                        $Candi_name = $datac_profile['uname'];
                        $Candi_img ='<img src="assets/upload/'.$datac_profile['profile'].' " width="50px"height="50px">'; 
                        $candidates .='<tr>
                                        <td>'.$Candi_serial.'     </td>
                                        <td>'.$Candi_name.'       </td>
                                        <td>'.$Candi_ign_name.'   </td>
                                        <td>'.$Candi_ig_id.'      </td> 
                                        <td>'.$Candi_status_btn.' </td> 
                                        <td>'.$Candi_img.'        </td> 
                                        <td>'.$Candi_p_date.'     </td> 
                                        <td>'.$Candi_id.'         </td> 
                                    </tr>';
                    }
                }
            }
        }
        


        // ============== MANAGE USERS
        // ========== FETCHING USERS DATA
        $serial = '0';
        $myObj->select('manage_players', '*', "status = 'block' ", "id DESC", 4);
        $data_PUser   = $myObj->getResult();
        if($data_PUser > 0){
            foreach($data_PUser as $row){
                $serial     = $serial +1;
                $PU_Id      = $row['id'];
                $PU_name    = $row['name'];
                $PU_uname   = $row['uname'];
                $PU_mail    = $row['mail'];
                $PU_conpass = $row['con_pass'];
                $PU_profile = $row['profile'];
                $PU_img     = '<img src="assets/upload/'.$PU_profile.'" alt="img" width="50px" height="50px">';
                $PU_status  = $row['status'];
    
                if($PU_status == 'block'){
                    $status_btn = '<a href="user-status.php?ud_id='.$PU_Id.'&status=unblock" class="btn  bg-danger text-light">
                    BLOCK</a>';
                }else{
                    $status_btn ='<a href="user-status.php?ud_id='.$PU_Id.'&status=block" class="btn bg-success text-light">
                    Un-Block</a>';
                }
                $Show_Users .='<tr>
                        <td>'.$serial.'     </td>
                        <td>'.$PU_name.'       </td>
                        <td>'.$PU_uname.'      </td>
                        <td>'.$PU_mail.'       </td>
                        <td>'.$PU_img.'        </td> 
                        <td>'.$status_btn.'</td>
                        </tr>';
            }
        }
        
        
    
    if(isset($_SESSION['login_msg'])){
        $login_msg = $_SESSION['login_msg'];
       
   }

?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <?php echo $login_msg ; unset($_SESSION['login_msg']);?>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>
        <div class="row">

            <div class="col-xl-3 col-md-6">
                <div class="card dashboard_card text-white mb-4 position-relative">
                    <div class="card-body">New Candidates</div>
                    <div class="p position-absolute notif_counter"><?php echo $PC_Count; ?></div>
                    <div
                        class="card-footer d-flex align-items-center justify-content-between border border-bottom-0 border-start-0 border-end-0 border-light">
                        <a class="small text-white stretched-link" href="manage-candidate.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card dashboard_card text-white mb-4 position-relative">
                    <div class="card-body">Pending Reports</div>
                    <div class="p position-absolute notif_counter"><?php echo $count_repos; ?></div>
                    <div
                        class="card-footer border border-bottom-0 border-start-0 border-end-0 border-light d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="manage-reports.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card dashboard_card text-white mb-4 position-relative">
                    <div class="card-body">Pending Orders</div>
                    <div class="p position-absolute notif_counter"><?php echo $count_pending; ?></div>
                    <div
                        class="card-footer d-flex align-items-center justify-content-between border border-bottom-0 border-start-0 border-end-0 border-light">
                        <a class="small text-white stretched-link" href="manage-orders.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card dashboard_card text-white mb-4 position-relative">
                    <div class="card-body">Comments</div>
                    <div class="p position-absolute  notif_counter comments_counter">0</div>
                    <div
                        class="card-footer d-flex align-items-center justify-content-between border border-bottom-0 border-start-0 border-end-0 border-light">
                        <a class="small text-white stretched-link comments_seen" href="manage-comments.php">View
                            Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="h2">New Users</div>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>E-Mail</th>
                                <th>Profile</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($Show_Users == ''){
                                echo  $DP_order_msg ='<div class="alert alert-warning d-flex align-items-center justify-content-between p-0 ps-2 fs-5" role="alert">
                                    There is no User Pending <a href="manage_users.php" class="alert-link SignUp-Btn text-decoration-none">View more </a>
                                </div>';
                                }else{
                                    echo $Show_Users;
                                }
                             ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="h2">Pending Orders</div>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple2">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Status</th>
                                <th scope="col">Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($DP_Orders == ''){
                                  echo  $DP_order_msg ='<div class="alert alert-warning d-flex align-items-center justify-content-between p-0 ps-2 fs-5" role="alert">
                                    There is no Order Pending <a href="completed-orders.php" class="alert-link SignUp-Btn text-decoration-none">View more </a>
                                  </div>';
                                }else{
                                    echo $DP_Orders;
                                } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="h2">Un-Check Reports</div>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple3">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Report</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($reports == ''){
                                  echo  $reports_msg ='<div class="alert alert-warning d-flex align-items-center justify-content-between p-0 ps-2 fs-5" role="alert">
                                    There is not Un-Check Report <a href="manage-reports.php" class="alert-link SignUp-Btn text-decoration-none">View more </a>
                                  </div>';
                                }else{
                                    echo $reports;
                                    } ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="h2">Pending Candidates</div>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple3">
                        <thead>
                            <tr>
                                <th scope="col"> #</th>
                                <th scope="col"> Name</th>
                                <th scope="col"> IG-Name</th>
                                <th scope="col"> IG-ID</th>
                                <th scope="col"> Status</th>
                                <th scope="col"> Image</th>
                                <th scope="col"> Date</th>
                                <th scope="col"> DB Id</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($candidates == ''){
                                  echo  '<div class="alert alert-warning d-flex align-items-center justify-content-between p-0 ps-2 fs-5" role="alert">
                                    There is no Candidate Pending <a href="manage-candidate.php" class="alert-link SignUp-Btn text-decoration-none">View more </a>
            </div>';
                                }else{
                                    echo $candidates;
                                } 
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>