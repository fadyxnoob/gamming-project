<?php 
    include('include\header.php');
    include('include\sidebar.php');
    $players = $pop_btn = '';

    //    fetch data from tbl
    $myObj->sql("SELECT * FROM manage_players ORDER BY id DESC");
    $data   = $myObj->getResult();
    if($data > 0){
        $serial = 0;
        foreach($data as $row){
            $serial        = $serial + 1;
            $user_id       = $row['id'];   
            $name          = $row['name'];
            $uname         = $row['uname'];
            $mail          = $row['mail'];
            $status        = $row['status'];
            $img           = $row['profile'];   
            $user_img ='<img src="assets/upload/'.$img.'" alt="img" width="50px" height="50px">';
           
            if($status == 'block'){
            $status_btn = '<a href="user-status.php?user_id='.$user_id.'&status=unblock" class="btn  bg-danger text-light">
            BLOCK</a>';
            }else{
                $status_btn ='<a href="user-status.php?user_id='.$user_id.'&status=block" class="btn bg-success text-light">
                Un-Block</a>';
            }
              $players .='<tr>
                        <td>'.$serial.'     </td>
                        <td>'.$name.'       </td>
                        <td>'.$uname.'      </td>
                        <td>'.$mail.'       </td>
                        <td>'.$status_btn.' </td>  
                        <td>'.$user_img.'        </td> 
                        </tr>';
      }
    }

?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Manage Users</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">E-Mail</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $players; ?>
                            </tbody>
                        </table>
            </div>
        </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>