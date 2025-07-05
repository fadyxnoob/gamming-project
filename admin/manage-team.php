<?php 
    include('include\header.php');
    include('include\sidebar.php');

    $member = '';
    //    fetch data from tbl
    $myObj->sql("SELECT * FROM manage_our_team");
    $data   =  $myObj->getResult();
    if($data > 0){
        $serial = 0;
        foreach($data as $row){
            $serial     = $serial + 1;
            $member_id  = $row['id'];   
            $name       = $row['Name'];
            $about      = $row['about'];
            $type       = $row['type']; 
            $img ='<img src="assets/upload/'.$row['profile'].'" width="50px" height="50px">';

            $member .='<tr>
                <td>'.$serial.'     </td>
                <td>'.$name.'       </td>
                <td>'.$about.'      </td>
                <td>'.$type.'       </td>
                <td>'.$img.'        </td> 
                <td>
                    <a href="update-member.php?member_id='.$member_id.'" class="btn bg-info">
                    <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
                <td> 
                    <a href="delete-member.php?member_id='.$member_id.'"class="btn bg-warning">
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
            <li class="breadcrumb-item active">Manage Team</li>
        </ol>
        <div class="col text-end mb-3">
                <a href="add-team.php" type="button" class="SignUp-Btn text-decoration-none">
                    <span data-feather="calendar"></span>
                    Add Member
                </a>
            </div>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">About</th>
                            <th scope="col">Role</th>
                            <th scope="col">Image</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $member; ?>
                    </tbody>
                </table>
            </div>
        </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>