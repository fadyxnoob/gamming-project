<?php 
    include('include\header.php');
    include('include\sidebar.php');
    $page = '';
        //    fetch data from tbl
        $myObj->sql("SELECT * FROM manage_contact_us ");
        $data = $myObj->getResult();
        if($data > 0){
            $serial = 0;
            foreach($data as $row){
                $serial++;
                $id       = $row['id'];
                $heading  = $row['heading'];
                $disc     = $row['disc'];
    
                $page .='<tr>
                            <td>'.$serial.'</td>
                            <td>'.$heading.'</td>
                            <td>'.$disc.'</td>  
                            <td>
                                <a href="update-contact-us.php?con_id='.$id.'" class="btn bg-info">
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
            <li class="breadcrumb-item active">Manage Contact Us</li>
        </ol>
        <div class="row">
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Desctiption</th>
                                <th scope="col">Image</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $page; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>