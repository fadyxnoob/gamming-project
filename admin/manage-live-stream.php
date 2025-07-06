<?php 
    include('include\header.php');
    include('include\sidebar.php');
    $live  = '';
        // ======== fetch data from tbl
        $myObj->sql("SELECT * FROM manage_live_stream");
        $data       = $myObj->getResult();
        if($data > 0){
            $serial     = 0;
            foreach($data as $row){
                $serial = $serial + 1;
                $id     = $row['id'];   
                $thumb  = $row['thumb'];
                $link   = $row['link'];
                $status = $row['status'];
                $thumbnail    ='<img src="assets/upload/'.$thumb.'" width="100%" height="100%">';
    
                if($status == 'Active'){
                $status_btn = '<a href="event_status.php?eventid='.$id.'&status=De-Active" class="btn btn-success" data-eventid='.$id.' id="eventid"><i class="fa-solid fa-wifi"></i></a>';
                }else{
                    $status_btn ='<a href="event_status.php?eventid='.$id.'&status=Active" class="btn btn-danger" data-eventid='.$id.' id="eventid"><i class="fa-solid fa-wifi"></i></a>';
                }
    
                $live .='<tr>
                            <td>'.$serial.'     </td>
                            <td>'.$link.'       </td>
                            <td>'.$status_btn.' </td> 
                            <td>
                            <a href="update-live-event.php?eventid='.$id.'" class="btn bg-info"> <i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>'.$thumbnail.' </td> 
                            </tr>';
            }
        }
        
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Manage Live Stream</li>
        </ol>
        <div class="row">
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Link</th>
                                <th scope="col">Status</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Thumbnail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $live; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</main>  
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>