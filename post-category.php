<?php 
  include('user/include/header.php');
    $post_day = $post_month = $Author_name =  $Category_Posts = $cat_name = $post_status = $categories = '';
    $Cont_msg = '..';
    if(isset($_GET['cid'])){
        $cid = $_GET['cid'];
        $myObj->sql("SELECT * FROM manage_posts WHERE status = 'Published' && cate = '$cid'");
        $data    =$myObj->getResult();
        if($data > 0){
            foreach($data as $result){
                $post_id     = $result['id'];
                $title       = $result['title'];
                if(strlen($title) > 55 ){
                    $title = substr($title,0,55);
                }
                $desc        = $result['description'];
                $cat_id      = $result['cate'];
                $post_status = $result['status'];
                $posted_date = $result['date'];
                $post_day    = date('d ', strtotime($posted_date));
                $post_month  = date(' M ', strtotime($posted_date));
                $img         = $result['image'];
                $post_img    ='  <img src="admin/assets/upload/'.$img.'" alt="Blog-image" width="100%" height="100%">';
                $Author      = $result['posted_by'];
                // fetching author name from tbl
                $myObj->select('register', '*', "id = '$Author'", null, null);
                $run_aut     = $myObj->getResult();
                if($run_aut > 0){
                    foreach($run_aut as $data_aut){
                        $Author_name = $data_aut["name"];
                    }
                }
                
                //fetching cate name from cate tbl
                
                //fetching cate name from cate tbl
                $myObj->select('manage_categories', '*', "id = '$cat_id'", null, null);
                $catRun = $myObj->getResult();
                if($catRun > 0){
                    foreach($catRun as $data){
                        $cat_name = $data['cat_name'];
                    }
                }  
                $Category_Posts .='<div class="col-sm-10 col-md-6  mx-sm-auto mx-md-0 mb-4">
                    <div class="full-wrapper wrapper-3">
                        <div class="image-part">
                            <a href="single-post.php?post_id='.$post_id.'" class="image">
                                '.$post_img.'
                            </a>
                        </div>
                        <div class="blog-content">
                            <span class="date-full">
                                <span class="day">'.$post_day.'</span>
                                <br />
                                <span class="month">'.$post_month.'</span>
                            </span>
                            <div class="blog-meta">
                                <a href="post-category.php?cid='.$cat_id.'">'.$cat_name.'</a>
                            </div>
                            <div class="b-title">
                                <a href="single-post.php?post_id='.$post_id.'">'.$title.'.'.$Cont_msg.'</a>
                            </div>
                            <div class="author-info d-flex justify-content-end mt-2">
                                <div class="avatar">
                                    <i class="fa-solid fa-user "></i>
                                </div>
                                <div class="info">
                                    <p class="author-name">'.$Author_name.'</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        }

        // Fetcch Numbers of posts from a cateory.
        // fetch Categoies data from tbl
        $myObj->select('manage_categories', '*', 'type = "Post"', null, null);
        $categoriesResults = $myObj->getResult();
        if (!empty($categoriesResults)) {
            foreach ($categoriesResults as $row) {
                $cid = $row['id'];
                $counter = $myObj->getRows('manage_posts', "cate = '$cid' AND status = 'Published'");
                if ($counter > 0) {
                    $category = $row['cat_name'];
                    $categories .= '<li class="category-item">
                        <a href="post-category.php?cid=' . $cid . '">' . $category . '</a>
                        <span class="post-count">' . $counter . '</span>
                    </li>';
                }
            }
        }
    }  
?>
<!-- Content Start -->
<!-- Banner Start -->
<div class="container-fluid blog-banner BACK_BANNER">
    <div class="row">
         <div class="col text-light px-5 mt-5">
            <h2 class="h1 title text-black"><?php echo $cat_name; ?></h2>
        </div>
    </div>
</div>
<!-- Banner End -->
<div class="container-fluid mb-5 ">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-8 products">
                <div class="row">
                    <?php 
                        if($Category_Posts == ''){
                            echo '<h1 class="text-start title">No Post Published!</h1>';
                        }else{
                            echo ''.$Category_Posts.'';
                        }
                    ?>
                </div>
            </div>
            <div class="col-sm-8 col-lg-4 product-action ms-sm-5 ms-md-0">
                <div class="categories bg-transparent p-0 mt-1 ">
                    <h3 class="h4"><span class="p-cat"></span> CATEGORIES</h3>
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