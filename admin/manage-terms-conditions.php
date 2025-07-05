<?php 
    include('include\header.php');
    include('include\sidebar.php');
    
    $disc = $terms_conditions = $serial ='';
    $myObj->sql("SELECT * FROM terms_conditions ");
    $data   = $myObj->getResult();
    if($data > 0){
        $serial = 0;
        foreach($data as $row){
            $serial    = $serial + 1;
            $id        = $row['id'];
            $disc      = $row['disc'];
            $terms_conditions .='<tr>
                <td>'.$serial.'    </td>
                <td>'.$disc.'  </td>
                <td>
                    <a href="update-trems-conditions.php?terms_id='.$id.'"class="btn bg-info">
                        <i class="fa-regular fa-pen-to-square "></i>
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
            <li class="breadcrumb-item active">Manage Terms and Conditions</li>
        </ol>
        <div class="row">
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">description</th>
                                <th scope="col">Edit</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $terms_conditions; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>