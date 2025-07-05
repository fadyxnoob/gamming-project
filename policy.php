<?php 
    include('user/include/header.php');
    $myObj->sql("SELECT * FROM privacy_policy ");
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
            <h1 class="title text-light">Privacy Policy</h1>
        </div>
    </div>
</div>

<!-- ===== CONTENT ====== -->
<div class="container-fluid mt-5">
    <div class="container ">
        <div class="row">
            <div class="col policy-cont Box_Shadow p-5">
                <?php echo $row['disc']?>
            </div>
        </div>
    </div>
</div>
<!-- ===== FOOTER ===== -->
<?php include('user\include\footer.php') ?>