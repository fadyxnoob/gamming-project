<?php    
    include('user/include/header.php');
    $posts = $time = $total_posts = $cat_id = $cid = $Author = $categories =  $pagination = '';
    $Cont_msg = '..';
    $limit = 1;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = '1';
    }
    $offset = ($page - 1) * $limit;

    // Fetch data from 
    $myObj->sql("SELECT * FROM `manage_posts`  WHERE status = 'Published' ORDER BY `id` DESC LIMIT {$offset},{$limit} ");
    $result = $myObj->getResult();
    if($result > 0){
        foreach($result as $data){
            $post_id     = $data['id'];
            $title       = $data['title'];
            if(strlen($title) > 50 ){
                $title = substr($title,0,50);
            }
            $desc        = $data['description'];
            $cat_id      = $data['cate'];
            $posted_date = $data['date'];
            $post_day    = date('d ', strtotime($posted_date));
            $post_month  = date(' M ', strtotime($posted_date));
            $img         = $data['image'];
            $post_img    ='  <img src="admin/assets/upload/'.$img.'" alt="Blog-image" width="100%" height="100%">';
            $Author      = $data['posted_by'];

            // fetching author name from tbl
            $myObj->select('register', '*', " id = '$Author'", null, null);
            $run_aut = $myObj->getResult();
            if($run_aut > 0){
                foreach($run_aut as $data){
                    $Author_name = $data["name"];
                }
            }

            //fetching cate name from cate tbl
            $myObj->select('manage_categories', '*', "id = '$cat_id'", null, null);
            $catRun = $myObj->getResult();
            if($catRun > 0){
                foreach($catRun as $data){
                    $cat_name = $data['cat_name'];
                }
            }
 
            $posts .='<div class="col-sm-10 col-md-6 col-lg-4 mx-sm-auto mx-md-0 mb-4">
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
    

?>
<!-- Banner Start -->
<div class="container-fluid bannerBg" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(user/assets/images/blogs/banner.jpg);">
    <div class="row">
        <div class="col text-light">
            <h2 class="pb-1 title">OUR BLOG</h2>
        </div>
    </div>
</div>
<!-- Banner End -->
<!-- Content Start -->
<div class="container-fluid mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title">Our Posts</h2>
            </div>
            <?php 
                if($posts == ''){
                    echo '<h1 class="title">No Posts Found.</h1>';
                }else{
                    echo $posts;
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
                    if ($current_page > 1) {
                        $prev_page = $current_page - 1;
                        echo '<li class="active m-2 page"><a href="blog.php?page='.$prev_page .'" class="text-decoration-none text-light">Previous</a></li>';
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
                 if ($current_page <= $total_page) {
                    $next_page = $current_page + 1;
                        echo '<li class="active m-2 page"><a href="blog.php?page=' . $next_page . '" class="text-decoration-none text-light">Next</a></li>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="offset-sm-8">
        </div>
        <!-- Categories -->
        <div class="col-sm-6 col-md-4 border ms-auto  category-felixable me-sm-5 me-md-0">
            <div class="categories">
                <h3 class="h4 fw-bold">CATEGORIES</h3>
                <ul class="m-0 p-0">
                    <?php echo $categories; ?>
                </ul>
            </div>
        </div>
        <!-- Categories Ended -->
    </div>
</div>
<!-- Content End -->
<?php include('user\include\footer.php') ?>