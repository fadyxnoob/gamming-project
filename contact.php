<?php 
    include('user/include/header.php'); 
    $fillmsg = '';
    $status = 'Pending';

    if(isset($_SESSION['player'])){
        $player = $_SESSION['player'];
        if(isset($_POST['submit'])){ 
            $name = $myObj->escapeString($_POST['name']);
            $email  = $myObj->escapeString($_POST['email']);
            $message  = $myObj->escapeString($_POST['message']);
            $status = "Pending";
            
            // Checking input failed is empty or not
            if($name != '' && $email != '' && $message != ''){
                $myObj->select('manage_players', '*', "id = '$player", null, null);
                $run_check = $myObj->getResult();
                if($run_check > 0){
                    
                    $params = [
                        'name' => $name,
                        'email' => $email,
                        'message' => $message,
                        'status' => $status,
                        'user_id' => $player,
                    ];

                    $myObj->insert('manage_reports', $params);
                    $result = $myObj->getResult();
                    if($result){
                        $_SESSION['report_msg'] ='<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Okey!</strong> Your Report Submitted Successfully
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        echo '<script>window.location.href="user-profile.php"</script>';
                    }else{
                        $fillmsg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Something Wrong!</strong> Report Subbmtion Failed.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                }
            }
        } else{
            $fillmsg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Remember!</strong> All feilds are required
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } 
    }else{
        $fillmsg = '<div class="alert alert-warning alert-dismissible fade show not-login-alert" role="alert">
                        <strong><i class="fa-solid fa-circle-info fs-4 text-light"></i></strong>
                          <span class="fs-5 ms-3 text-light">
                        Please login first , if you want to Contact or Report.
                    </span>
                        <button type="button" class="btn-close text-light" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
    }

    $myObj->sql('SELECT * FROM manage_contact_us');
    $pageData = $myObj->getResult();
    if (!empty($pageData)) {
        foreach ($pageData as $pg_row) {
            $pg_heading  = $pg_row['heading'];
            $pg_disc     = $pg_row['disc'];
        }
    }  

?>
<!-- Banner Start -->
<div class="container-fluid bannerBg" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(user/assets/images/contact.jpg);">
    <div class="row">
        <div class="col text-light">
            <h2 class="h1 title">Contact Us</h2>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Content Start -->
<div class="container-fluid content">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-5 position-relative">
                <h2 class="title">
                    <?php echo $pg_heading;?>
                </h2>
                <span class=contact_span></span>
                <p class="mt-2">
                <?php echo $pg_disc;?>
                
                </p>
                <div class="row">
                <div class="col">
                    <div class="d-flex align-items-center">
                        <p class="m-0">Follow us on :</p>
                        <a class="btn-about-link" href="<?php echo $facebook; ?>"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn-about-link" href="<?php echo $twitter; ?>"><i class="fab fa-twitter"></i></a>
                        <a class="btn-about-link" href="<?php echo $linkd; ?>"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn-about-link" href="<?php echo $insta; ?>"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-6">
              <?php echo $fillmsg; ?>
                <form method="post" class="contact-form mt-2">
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Your Name" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email Adress" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <textarea name="message" class="form-control textarea text-aria" placeholder="Your Message"
                            aria-label="With textarea"></textarea>
                    </div>
                    <div class="form-button text-center mt-2">
                        <button type="submit" name="submit" class="btn">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Content End -->


<?php include('user\include\footer.php') ?>