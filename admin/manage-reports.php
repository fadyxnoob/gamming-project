<?php 
    include('include\header.php');
    include('include\sidebar.php');
    $reports = '';
    //    fetch data from tbl
    $myObj->sql("SELECT * FROM manage_reports");
    $data   =  $myObj->getResult();
    if($data){
        $serial = 0;
        foreach($data as $row){
            $serial     = $serial + 1;
            $repo_id    = $row['id'];   
            $name       = $row['name'];
            $email      = $row['email'];
            $message    = $row['message'];
            $date       = date('d M y', strtotime($row['date']));
            $status       = $row['status'];

            if($status == 'Pending'){
                $status_btn = '<a href="repo-status.php?repo_id='.$repo_id.'&status=Checked"class="btn bg-danger">
                <i class="fa-solid fa-wifi"></i>
                </a>';
                }else{
                    $status_btn = '<button class="btn text-light bg-success">
                        <i class="fa-solid fa-wifi "></i>
                    </button>';
                }

                $reports .='<tr>
                    <td>'.$serial.'     </td>
                    <td>'.$name.'       </td>
                    <td>'.$email.'      </td>
                    <td>'.$message.'       </td>
                    <td>'.$date.'        </td> 
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
            <li class="breadcrumb-item active">Manage Reports</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
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
                        <?php echo $reports; ?>
                    </tbody>
                </table>
            </div>
        </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>