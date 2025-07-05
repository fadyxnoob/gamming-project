<?php
session_start();
include('database.php');
$myObj = new Database();
$profile1 = $name = $name     = $profile1 = '';
  if(isset($_SESSION['login'])){
        $user_id  = $_SESSION['login'];
        $myObj->select('register', '*', "id = '$user_id' ", null, null);
        $run = $myObj->getResult();
        if($run > 0){
            foreach($run as $result){
                $name     = $result['name'];
                $profile  = $result['profile'];
                $profile1 ='<img src="assets/upload/'.$profile.'" alt"admin">';  
            }
        }
    }else{
        echo'<script>window.location.href="login.php"</script>';
    }

    $myObj->sql("SELECT * FROM manage_website ");
    $run1 = $myObj->getResult();
    if($run1 > 0){
        foreach($run1  as $result1){
            $title = $result1['site_title'];
        }
    }
    
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="utf-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
     <meta name="description" content="" />
     <meta name="author" content="" />
     <title>admin-dashboard</title>
     <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
     <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
         <!-- include summernote css/js -->
         <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

 </head>

 <body class="sb-nav-fixed">
     <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
         <!-- Navbar Brand-->
         <a class="navbar-brand ps-3" href="index.php"><?php echo $title ;?></a>
         <!-- Sidebar Toggle-->
         <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                 class="fas fa-bars"></i></button>
         <!-- Navbar Search-->
         <form class="d-none invisible  d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
             <div class="input-group">
                 <input class="form-control navSearchBAr" type="text" placeholder="Search for..." aria-label="Search for..."
                     aria-describedby="btnNavbarSearch" />
                 <button class="btn" id="btnNavbarSearch" type="button"><i
                         class="fas fa-search"></i></button>
             </div>
         </form>
         <!-- ===== Navbar-->
         <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 d-flex align-items-center">
             <li class="nav-item me-3">
               <div class="admin_img ">
                <?php echo $profile1; ?>
               </div>
             </li>
             <li><a class="text-light text-decoration-none" href="log-out.php">Logout</a></li>
         </ul>
     </nav>