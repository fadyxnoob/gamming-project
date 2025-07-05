<?php 
    include('user/include/header.php');
    $print_faqs = '';
    $myObj->sql("SELECT * FROM manage_faqs");
    $data   = $myObj->getResult();
    if($data > 0){
        foreach($data as $row){
            $question      = $row['question'];
            $answer        = $row['answer'];
            $print_faqs .='
                <li class="accordion-item">
                    <h3 class="accordion-thumb text-dark"><span class=""text-dark>'.$question.'</span></h3>
                    <p class="accordion-panel text-dark">
                        '.$answer.'
                    </p>
                </li>';   
        }
    }
    
?>
<!-- Banner Start -->
<div class="container-fluid bannerBg" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(user/assets/images/shop/banner.jpg);">
    <div class="row">
        <div class="col text-light">
            <h1 class="title">FAQ's</h1>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Content Start -->
<div class="container-fluid site-acordine ">
    <div class="container">
        <div class="row">
            <div class="col ">
                <h2 class="main-title text-center mt-5">Frequently Asked <strong>Questions</strong></h2>
                <ul class="accordion Box_Shadow p-3">
                    <?php echo $print_faqs; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Content End -->
<?php include('user\include\footer.php') ?>