<?php 
    include('include\header.php');
    include('include\sidebar.php');
    $t_member = '';
    //    fetch data from tbl
    $myObj->sql("SELECT * FROM `manage_about` ");
    $data   = $myObj->getResult();
    if($data > 0){
        $serial = 0;
        foreach($data as $row){
            $serial++;
            $about_id  = $row['id'];
            $title     = $row['title'];
            $title2    = $row['title2'];
            $home      = $row['data'];
            $image     = $row['img'];
            $ab_img    ='<img src="assets/upload/'.$image.'" width="50px" height="50px">';

            $t_member .='<tr>
                <td>'.$serial.'</td>
                <td>'.$title.'</td>
                <td>'.$title2.'</td>
                <td>'.$home.'</td>
                <td>'.$ab_img.'</td>  
                <td>
                    <a href="update-about.php?about_id='.$about_id.'" class="btn bg-info">
                        <i class="fa-solid fa-pen-to-square"></i>
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
            <li class="breadcrumb-item active">Manage About</li>
        </ol>
        <div class="row">
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Team Title</th>
                                <th scope="col">Desctiption</th>
                                <th scope="col">Image</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $t_member; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>