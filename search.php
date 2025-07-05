<?php
    include('user/include/header.php');
    $products = '';
    $noresults = true;
    $noresults = false;
    $query = $_GET["search"];
    $myObj->sql("SELECT * FROM `manage_products` WHERE `name` LIKE '%$query%'");
    $run = $myObj->getResult();
    if($run > 0){
        foreach($run as $result){
            $p_id = $result['id'];
            $name = $result['name'];
            $price = $result['price'];
            $img = $result['image'];
            $products .='<div class="col-md-6 col-lg-4 mb-3">
                <div class="item">
                    <div class="product-warrper rounded overflow-hidden">
                        <div class="product-img-1">
                            <img src="admin/assets/upload/'.$img.'"
                            alt="product-img-1" class="img-fluid" id="image1" />
                        </div>
                        <div class="products-asset d-flex flex-column">
                            <a href="single-product.php?spro_id='.$p_id.'">
                            <i class="fa-solid fa-eye text-light"></i></a>
                            <a href="single-product.php?spro_id='.$p_id.'">
                            <i class="fa-solid fa-bag-shopping text-light"></i></a>
                        </div>
                    </div>
                </div>
            </div>';
        }
    } 
?>
<div class="container-fluid my-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title">Results for (<?php echo $query;?>)</h2>
            </div>
            <div class="col-12 products">
                <div class="row">
                    <?php 
                        if($products == ''){
                            echo '<h1 class="text-center title Box_Shadow p-3">No Result Found for '.$query.'!</h1>';
                        }else{
                            echo ''.$products.'';
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include('user\include\footer.php'); ?>