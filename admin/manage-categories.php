<?php 
    include('include\header.php');
    include('include\sidebar.php');
    
    $categorey = $row = $serial ='';
    $myObj->sql("SELECT * FROM manage_categories ORDER BY id DESC");
    $data   = $myObj->getResult();
    if($data > 0){
        $serial = 0;
        foreach($data as $row){
            $serial        = $serial + 1;
            $cat_id        = $row['id'];
            $cat_name      = $row['cat_name'];
            $type          = $row['type'];
            $categorey .='<tr>
                <td>'.$serial.'</td>
                <td>'.$cat_name.'</td>
                <td>'.$type.'</td>
                <td>
                    <a href="update-cate.php?catid='.$cat_id.'"class="btn bg-info">
                        <i class="fa-regular fa-pen-to-square "></i>
                    </a>
                </td>
                <td>
                    <a href="delete_categories.php?catid='.$cat_id.'"class="btn text-danger border border-warning">
                        <i class="fa-solid fa-trash"></i>
                    <a>     
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
            <li class="breadcrumb-item active">Manage Categories</li>
        </ol>
        <div class="row">
            <div class="col text-end mb-3">
                <a href="add-category.php" type="button" class="SignUp-Btn text-decoration-none">
                    <span data-feather="calendar"></span>
                    Add Categorey
                </a>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Type</th>
                                <th scope="col">Edit</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $categorey; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</main>
<!-- ===== MAIN END ===== -->

<?php include('include\footer.php'); ?>