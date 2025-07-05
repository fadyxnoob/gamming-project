<?php 
    include('include\header.php');
    include('include\sidebar.php');
    $slider  = $candidate =  $status_btn = '';
    
    //    fetch data from tbl
    $myObj->sql("SELECT * FROM manage_slider");
    $data   = $myObj->getResult();
    if($data > 0){
        $serial = 0;
        foreach($data as $row){
            $serial     = $serial + 1;
            $slider_id  = $row['id'];   
            $name       = $row['title'];
            $status     = $row['slider_status'];
            $img ='<img src="assets/upload/'.$row['img'].'" width="50px" height="50px">';
    
            if($status == 'Active'){
            $status_btn = '<a href="slider_status.php?sliderid='.$slider_id.'&status=De-Active" class="btn btn-success"><i class="fa-solid fa-wifi"></i></a>';
            }else{
                $status_btn ='<a href="slider_status.php?sliderid='.$slider_id.'&status=Active" class="btn btn-danger"><i class="fa-solid fa-wifi"></i></a>';
            }
    
            $slider .='<tr>
                <td>'.$serial.'     </td>
                <td>'.$name.'       </td>
                <td>'.$status_btn.' </td> 
                <td>
                    <a href="update-slider.php?sliderid='.$slider_id.'" class="btn bg-info"> <i class="fa-solid fa-pen-to-square"></i></a>
                </td>
                <td>
                    <a href="delete-slider.php?sliderid='.$slider_id.'" class="btn bg-warning"> <i class="fa-solid fa-trash"></i></a>
                </td>
                </td> 
                <td>'.$img.'        </td> 
            </tr>';
        }
    }
    
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Manage Slider</li>
        </ol>
        <div class="row">
        <div class="col text-end mb-3">
                    <a href="add-slider.php" type="button" class="SignUp-Btn text-decoration-none">
                        <span data-feather="calendar"></span>
                        Add Slider
                    </a>
                </div>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $slider; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>