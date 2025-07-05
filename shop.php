<?php   
    include('user/include/header.php');
    $products = $pop_items = $categories = $pagination = '';
    $limit = 2;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = '1';
    }
    $offset = ($page - 1) * $limit;
    
    $myObj->sql("SELECT * FROM `manage_products`  WHERE status = 'Active' ORDER BY `id` DESC LIMIT {$offset},{$limit} ");
    $result = $myObj->getResult();
    if($result > 0){
        foreach($result as $data){
            $p_id  = $data['id'];
            $name  = $data['name'];
            $price = $data['price'];
            $img   = $data['image'];
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

    //fetch items data from tbl
    $myObj->select('manage_products', '*', "pop_status = 'popular'", 'id DESC', 3);
    $productsResult = $myObj->getResult();
    if($productsResult > 0){
        foreach($productsResult as $data){
            $pop_id   = $data['id'];
            $pop_name = $data['name'];
            $price    = $data['price'];
            $popimg   = $data['image'];
            $pop_items .='<div class="col-md-6 mb-5">
                <div class="item">
                    <div class="product-warrper rounded overflow-hidden">
                        <div class="product-img-1">
                            <img src="admin/assets/upload/'.$popimg.'"
                            alt="product-img-1" class="img-fluid" id="image1" />
                        </div>
                        <div class="products-asset d-flex flex-column">
                            <a href="single-product.php?spro_id='.$pop_id.'">
                            <i class="fa-solid fa-eye text-light"></i></a>
                            <a href="single-product.php?spro_id='.$pop_id.'">
                            <i class="fa-solid fa-bag-shopping text-light"></i></a>
                        </div>
                    </div>
                </div>
            </div>';
        }
    }

    // fetching categories
    $myObj->select('manage_categories', '*', "type = 'Product'", null, null);
    $categoriesResults    = $myObj->getResult();
    if($categoriesResults > 0){
        foreach($categoriesResults as $data){
            $Pc_id = $data['id'];
            $category = $data['cat_name'];
            $counter = $myObj->getRows('manage_products', "cate = '$Pc_id'");
            if($counter > 0){
                $categories .='<li class="category-item">
                    <a href="product-category.php?Pc_id='.$Pc_id.'">'.$category.'</a>
                    <span class="post-count">
                    '.$counter.'
                    </span>
                </li>';
            }
           
        }
    } 
?>
<!-- Banner Start -->
<div class="container-fluid bannerBg" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
    url(user/assets/images/shop/banner.jpg)">
    <div class="row">
        <div class="col text-light">
            <h2 class="h1 title">Our Shop</h2>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Content Start -->
<div class="container-fluid mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title">Our Products</h2>
            </div>
            <div class="col-12 products">
                <div class="row">
                    <?php 
                        if($products == ''){
                            echo '<h1 class="text-start title">No Product Found!</h1>';
                        }else{
                            echo ''.$products.'';
                        }
                    ?>
<?php
    $max_visible_pages = 3;
    $myObj->select('manage_posts', '*', "status = 'Published'", null, null);
    $pegi_result = $myObj->getResult();
    $total_record = $myObj->getRows('manage_posts', null);
    if ($pegi_result > 0) {
        $total_page = ceil($total_record / $limit);
        $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $start_page = max(1, $current_page - floor($max_visible_pages / 2));
        $end_page = min($total_page, $start_page + $max_visible_pages - 1);

        for ($i = $start_page; $i <= $end_page; $i++) {
            $pagination .= '<li class="active m-2 page';

            if ($i === $current_page) {
                $pagination .= ' active';
            }
            $pagination .= '"><a href="shop.php?page=' . $i . '">' . $i . '</a></li>';
        }

        if ($end_page < $total_page) {
            $pagination .= '<li class="active m-2 page"><span>...</span></li>';
        }
    }
?>
        </div>
        <div class="row my-5">
            <div class="col bg-mine m-0">
                <?php
                    // Add "Previous" button
                    if ($current_page > 1) {
                        $prev_page = $current_page - 1;
                        echo '<li class="active m-2 page"><a href="shop.php?page='.$prev_page .'" class="text-decoration-none text-light">Previous</a></li>';
                    }
                ?>
            </div>
            <div class="col  d-flex Pages justify-content-center">

                <ul class="d-flex m-0 p-0 ">
                    <?php
                        echo $pagination;
                    ?>
                </ul>
            </div>
            <div class="col  m-0 text-end bg-mine">
                <?php 
                 // Add "Next" button
                 if ($current_page < $total_page) {
                    $next_page = $current_page + 1;
                    echo '<li class="active m-2 page"><a href="shop.php?page=' . $next_page . '" class="text-decoration-none text-light">Next</a></li>';
                }
                ?>
            </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 col-lg-8 ">
                        <div class="popular">
                            <h3 class="h4 title">Populer Items</h3>
                            <div class="popular-items row">
                                <?php echo  $pop_items;  ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mt-5">
                        <div class="categories bg-transparent mt-4 p-0 Box_Shadow">
                            <h3 class="h4"><span class="p-cat"></span> CATEGORIES</h3>
                            <ul class="m-0 p-0">
                                <?php echo $categories; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content End -->
<?php include('user\include\footer.php'); ?>