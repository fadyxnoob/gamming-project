<?php    
    include('user/include/header.php');
    $member = $time =  $home = $profile = $contact = '';
    // fetch data from tbl
    $myObj->sql("SELECT * FROM manage_our_team");
    $teamResult    = $myObj->getResult();
    if($teamResult > 0){
        foreach($teamResult  as $result){
            $name         = $result['Name'];
            $about        = $result['about'];
            $type         = $result['type'];
            $img          = $result['profile'];
            $member_img    ='<img src="Admin/assets/upload/'.$img.'" alt="image" width="100%" height="100%"/>';
            $member .='<div class="col-sm-8 col-md-6  col-lg-4 mx-auto text-start mt-sm-4 mt-md-0 mrtop-50">
                <div class="team-members">
                    <div class="members-box">
                        '.$member_img.'
                        <span></span>
                    </div>
                </div>
                    <div class="member-name text-center title mt-2">'.$name.'</div>
                    <div class="member-about text-center">'.$about.'</div>
                    <div class="fs-4 text-center m-0 p-0">'.$type.'</div>
            </div>';
        } 
    }
      

    // fetch about data from tbl 
    $myObj->sql("SELECT * FROM manage_about");
    $aboutResult    = $myObj->getResult();
    if($aboutResult > 0){
        foreach($aboutResult as $data){
            $p_title     = $data['title'];
            $p_title2    = $data['title2'];
            $descripton  = $data['data'];
            $img         = $data['img'];
            $abot_img    ='<img src="admin/assets/upload/'.$img.'" alt="image" width="100%" height="100%"/>';
        }
    }
   
?>
<!-- Banner Start -->
<div class="container-fluid bannerBg"
    style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(user/assets/images/About/banner.jpg);">
    <div class="row">
        <div class="col text-light">
            <h2 class="text-light title"><?php echo $p_title; ?></h2>
        </div>
    </div>
</div>
<!-- Banner End -->
<!-- Content Start -->
<div class="container-fluid about-main my-5 p-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6  main-img">
                <?php echo $abot_img; ?>
            </div>
            <div class="col-lg-6 main-disc px-4">
                <p>
                    <?php echo $descripton; ?>
                </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center mt-2 mb-3">
                <h2 class="h2 title"><?php echo $p_title2; ?></h2>
            </div>
            <?php echo $member; ?>

        </div>
    </div>
</div>
<!-- Content End -->
<?php include('user\include\footer.php') ?>