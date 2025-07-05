<?php 
    include('include/conection.php');
    include('include/header.php');
    include('include/sidebar.php');
    $update  = '';
if(isset($_GET['eventid'])){
    $dealid = $_GET['eventid'];
}
 if(isset($_POST['update'])){	
    $heading = $_POST['heading'];
    $date=$_POST['date'];
    $h= $_POST['h'];
    $m= $_POST['m'];
    $s= $_POST['s'];
    //updating the table
    $result = $conn->query("UPDATE manage_counter 
                               SET  heading = '$heading',
                                    event_date = '$date',
                                   event_h = '$h',
                                   event_m = '$m',
                                   event_s = '$s'
                               WHERE event_id = '$dealid'");
	
    //redirectig to the display page. In our case, 
    $update = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Next Time!</strong> The Timer has been set.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
        echo '<script>window.location.href="manage-counter.php"</script>';
    }
            $result = $conn->query("SELECT * FROM manage_counter ");
            $result = $conn->query("SELECT * FROM manage_counter ");
            while($res = $result->fetch_assoc()) { 
                $deal_id = $res['event_id']; 
                $heading = $res['heading'];  
                $date = $res['event_date'];
                $h = $res['event_h'];
                $m = $res['event_m'];
                $s = $res['event_s'];   
            }
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <div class="container">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Set Timer</li>
            </ol>
            <div class="row">
                <div class="col-12 text-center">
                    <?php echo $update;?>
                </div>
                <div class="col">
                    <form method="POST" action="#" enctype="multipart/form-data">
                        <label for="heaing">Heading</label>
                        <input type="text" name="heading" class="form-control inputField" value="<?php echo $heading; ?>">
                        Date
                        <input class="form-control inputField" type="date" name="date" value="<?php echo $date;?>">
                        Hours
                        <input class="form-control inputField" type="number" name="h" value="<?php echo $h;?>">
                        Minutes
                        <input class="form-control inputField" type="number" name="m" value="<?php echo $m;?>">
                        Seconds
                        <input class="form-control inputField" type="number" name="s" value="<?php echo $s;?>">
                        <button class="SignUp-Btn" type="submit" name="update">Set</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main> 
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>