<?php 
  include('user/include/header.php');
    $myObj->sql("SELECT * FROM `manage_user_guide` ");
    $run   = $myObj->getResult();
    if($run > 0){
        foreach($run as $row){
        }
    }
?>
<!-- ===== Banner ===== -->
<div class="container-fluid bannerBg" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(user/assets/images/privacy.jpg);">
    <div class="row">
        <div class="col">
            <h1 class="title text-light">User Guide</h1>
        </div>
    </div>
</div>
<!-- ===== CONTENT ====== -->
<div class="container-fluid mt-5">
    <div class="container ">
        <div class="row">
            <div class="col policy-cont Box_Shadow px-5 py-2">
                <?php
              echo html_entity_decode($row['disc']);
                 ;?>
            </div>
        </div>
    </div>
</div>
<!-- ===== FOOTER ===== -->
<?php   include('user/include/footer.php');?>