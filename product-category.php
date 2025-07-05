<?php 
    include('user/include/header.php');
    $post_day = $post_month = $Author_name =  $Category_Products = $cat_name = $categories = $category ='';
    if(isset($_GET['Pc_id'])){
        $Pc_id = $_GET['Pc_id'];
        // fetch data by categories 
        $myObj->sql("SELECT * FROM manage_products where status = 'Active' && cate = '$Pc_id'");
        $data    = $myObj->getResult();
        if($data > 0){
            foreach($data as $result){
                $p_id = $result['id'];
                $name = $result['name'];
                $price = $result['price'];
                $img = $result['image'];
                //fetching cate name from cate tbl
                $myObj->select('manage_categories', '*', "id = '$Pc_id'" );
                $cat_run  = $myObj->getResult();
                if($cat_run > 0){
                    foreach($cat_run as $result){
                        $cat_name = $result['cat_name']; 
                    }
                }
                 
                $Category_Products .='<div class="col-md-6 mt-5">
                    <div class="item">
                        <div class="product-warrper rounded overflow-hidden">
                            <div class="product-img-1">
                                <img src="admin/assets/upload/'.$img.'"
                                alt="product-img-1" class="img-fluid" id="image1" />
                            </div>
                            <div class="products-asset d-flex flex-column">
                                <a href="single-product.php?spro_id='.$p_id.'">
                                <i class="fa-solid fa-eye text-light"></i></a>
                                <a href="single-product.php?spro_id='.$p_id.'"><i class="fa-solid fa-bag-shopping text-light"></i></a>
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
    }  
?>
<!-- Content Start -->
<!-- Banner Start -->
<div class="container-fluid shop-banner BACK_BANNER">
    <div class="row">
        <div class="col text-light px-5 mt-5">
            <h2 class="h1 title text-black"><?php echo $cat_name; ?></h2>
        </div>
    </div>
</div>
<!-- Banner End -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 products">
                <div class="row">
                    <?php 
                        if($Category_Products == ''){
                            echo '<h1 class="text-start title">No Product Found!</h1>';
                        }else{
                            echo $Category_Products;
                        }
                    ?>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 mt-5">
                    <div class="categories bg-transparent p-0 mt-5 Box_Shadow">
                        <h2 class="h4"><span class="p-cat"></span> CATEGORIES</h2>
                        <ul class="m-0 p-0">
                            <?php echo $categories; ?>
                        </ul>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- Content End -->
<?php include('user\include\footer.php') ?>