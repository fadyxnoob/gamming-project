<?php 
    include('include/header.php');
    include('include/sidebar.php');
    $event = '';    
    $serial  = 0;
    $myObj->select('manage_counter', '*', null, "event_id DESC", null);
    $data = $myObj->getResult();
    if($data > 0){
        foreach($data as $res){ 
            $serial++;
            $event_id = $res['event_id'];   
            $heading  = $res['heading'];   
            $deal_id  = $res['event_id'];   
            $Mdate    = $res['event_date'];
            $date     = date('d M Y', strtotime($Mdate));
            $h        = $res['event_h'];
            $m        = $res['event_m'];
            $s        = $res['event_s'];
            $event  = '<tr>
                <td>' . $serial . '</td>
                <td>' . $heading . '</td>
                <td>'.$date.'</td>
                <td>'.$h.'</td>
                <td>'.$m.'</td>
                <td>'.$s.'</td>
            </tr>';
        }
    }
    
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Manage Timer</li>
        </ol>
        <div class="row">
            <div class="col text-end mb-3">
                <?php 
                echo '<a href="add-event.php?eventid='.$event_id.'" name="" class="SignUp-Btn text-decoration-none">Update
                Timer</a>';
                 ?>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Heading</th>
                            <th>Date</th>
                            <th>Hour</th>
                            <th>Minutes</th>
                            <th>Second</th>
                        </tr>
                    </thead>
                    <?php echo  $event; ?>
                </table>

            </div>
        </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>