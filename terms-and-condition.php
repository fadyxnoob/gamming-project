<?php 
  include('user/include/header.php');
    $myObj->sql("SELECT * FROM terms_conditions");
    $run   = $myObj->getResult();
    if($run > 0){
        foreach($run as $row){}
    }
?>
<!-- ===== Banner ===== -->
<div class="container-fluid bannerBg" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(user/assets/images/privacy.jpg);"> 
    <div class="row">
        <div class="col">
            <h1 class="title text-light"> Terms and Conditions</h1>
        </div>
    </div>
</div>
<!-- ===== CONTENT ====== -->
<div class="container-fluid mt-5">
    <div class="container ">
        <div class="row">
            <h1 class="title text-center">Here are the Terms and Conditions</h1>
            <div class="col policy-cont Box_Shadow px-5 py-2">
                <?php echo html_entity_decode($row['disc'])?>
            </div>
        </div>
    </div>
</div>
<!-- ===== FOOTER ===== -->
<?php include('user\include\footer.php'); ?>