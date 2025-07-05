<?php 
    include('include\header.php');
    include('include\sidebar.php');
    $slider  = $candidate =  $status_btn = '';

        //    fetch data from tbl
        $myObj->sql("SELECT * FROM manage_site_socials");
        $data   = $myObj->getResult();
        if($data > 0){
            $serial = 0;
            foreach($data as $row){
                $serial++;
                $social_id = $row['id'];   
                $facebook  = $row['facebook'];
                $twitter   = $row['twitter'];
                $linkd     = $row['linkd'];
                $insta     = $row['insta'];
               
    
                $slider .='<tr>
                    <td>'.$serial.'     </td>
                    <td>'.$facebook.'       </td>
                    <td>'.$twitter.'       </td>
                    <td>'.$linkd.' </td> 
                    <td>'.$insta.' </td> 
                    <td>
                        <a href="update-socials.php?social_id='.$social_id.'" class="btn bg-info"> <i class="fa-solid fa-pen-to-square"></i></a>
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
                                <th scope="col">Facebook</th>
                                <th scope="col">Twitter</th>
                                <th scope="col">Linked-in</th>
                                <th scope="col">Instagrm</th>
                                <th scope="col">Edit</th>
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