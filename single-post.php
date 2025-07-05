<?php
include('user/include/header.php');
$id = $category = $post_id = $recent_post = $comment_msg = $single_post = $print_comment = $cat_name = $Img_run = $Comment_counter = $fetch_comments = $delete_comment = '';
if (isset($_SESSION['player'])) {
    $user_id = $_SESSION['player'];

    $myObj->select('manage_players', '*', "id = '$user_id' ", null, null);
    $img_run    =  $myObj->getResult();
    if ($img_run > 0) {
        foreach ($img_run as $img_data) {
            $user_name = $img_data['name'];
            $user_image = $img_data['profile'];
            $Prin_IMG   = '<img src="admin/assets/upload/' . $user_image . '" class="img-fluid" alt="img" width="100%" height="100%" />';
        }
    }
}

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    // fetch data from tbl
    $myObj->select('manage_posts', '*', "id = '$post_id'", null, null);
    $Post_data = $myObj->getResult();

    if (!empty($Post_data)) {
        $Post_result = $Post_data[0]; // get the first post (no need foreach)

        $title       = $Post_result['title'];
        $description = $Post_result['description'];
        $cate        = $Post_result['cate'];
        $date        = $Post_result['date'];
        $posted_date = date('D, d M Y', strtotime($date));
        $img         = $Post_result['image'];
        $img1        = $Post_result['image2'];
        $img2        = $Post_result['image3'];
        $img3        = $Post_result['image4'];
        $posted_by   = $Post_result['posted_by'];

        // fetch admin name
        $Ad_name = '';
        $myObj->select('register', '*', "id = '$posted_by'");
        $Ad_run = $myObj->getResult();
        if (!empty($Ad_run)) {
            $Ad_name = $Ad_run[0]['name'];
        }

        // fetch category name
        $cat_name = '';
        $cat_id = '';
        $myObj->select('manage_categories', '*', "id = '$cate'");
        $data = $myObj->getResult();
        if (!empty($data)) {
            $cat_id = $data[0]['id'];
            $cat_name = $data[0]['cat_name'];
        }

        // comments count
        $Comment_counter1 = $myObj->getRows('comments', "post_id = '$post_id' ");

        // final output — no .=
        $single_post = ' 
            <div class="col-lg-8">
                <div class="post-main-img position-relative border">
                    <span class="Spost-Cate">
                        <a href="post-category.php?cid=' . $cat_id . '" class="h4 text-decoration-none text-light">' . $cat_name . '</a>
                    </span>
                    <img src="admin/assets/upload/' . $img . '">
                </div>
                <div class="Post-Date mt-3">
                    <span><i class="fa-solid fa-calendar-days text-dark"></i></span>
                    ' . $posted_date . '
                </div>
                <div class="Spost-Title">
                    <h2 class="h1">' . $title . '</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6 d-flex justify-content-between">
                        <div class="Posted-By">
                            <i class="fa-solid fa-user text-dark"></i> by
                            <span class="text-capitalize"> ' . $Ad_name . '</span>
                        </div>
                        <div class="PComments">
                            <i class="fa-solid fa-comments text-dark"></i>
                            ' . $Comment_counter1 . ' Comments
                        </div>
                    </div>
                </div>
                <div class="SP-Disc">
                    <p>' . $description . '</p>
                </div>
                <div class="SP-Sub-Images Box_Shadow">
                    <div class="SP-Sub-Img"><img src="admin/assets/upload/' . $img1 . '"></div>
                    <div class="SP-Sub-Img"><img src="admin/assets/upload/' . $img2 . '"></div>
                    <div class="SP-Sub-Img"><img src="admin/assets/upload/' . $img3 . '"></div>
                </div>
            </div>';

        // ===== Comments Insert
        $status = 'unseen';
        if (isset($_POST['Sub_Review'])) {
            if (!isset($_SESSION['player'])) {
                $_SESSION['not_login'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Please login to continue...
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                echo '<script>window.location.href="login.php"</script>';
                exit;
            }

            $comment = trim($_POST['comment']);

            // Empty input check
            if (empty($comment)) {
                $_SESSION['comment_msg'] = '<div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
                        Please write a comment before submitting.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                echo '<script>window.location.href="single-post.php?post_id=' . $post_id . '"</script>';
                exit;
            }

            $params = [
                'name' => $user_name,
                'post_id' => $post_id,
                'comment' => $comment,
                'user_id' => $user_id,
                'status' => $status,
            ];
            $myObj->insert('comments', $params);
            $c_run = $myObj->getResult();
            if ($c_run) {
                echo '<script>window.location.href="single-post.php?post_id=' . $post_id . '"</script>';
            } else {
                $comment_msg = "<p>Comment posting Fail</p>";
            }
        }

        // COMMENTS PRINTING 
        $myObj->select('comments', '*', "post_id = '$post_id' ", 'id DESC', null);
        $run_comments = $myObj->getResult();
        $Comment_counter = $myObj->getRows('comments', "post_id = '$post_id' ");
        if ($run_comments > 0) {
            foreach ($run_comments as $comments_result) {
                $com_id         = $comments_result['id'];
                $com_name       = $comments_result['name'];
                $posted_date    = $comments_result['date'];
                $com_Date       = date('d M Y', strtotime($posted_date));
                $com_comment    = $comments_result['comment'];
                $com_user       = $comments_result['user_id'];
                $print_comment .= '
                        <div class="Reviewer-info">
                            <div class="Review-card border py-1 px-2 d-flex justify-content-between">
                                <div class="Reviewer-Detail ps-3">
                                    <div class="h6 Reviewer-name fw-bold">' . $com_name . '</div>
                                    <p>' . $com_comment . '</p>
                                </div>
                                <div class="the-Review position-relative">
                                    <span class="review-date">' . $com_Date . '</span>';
                if ($user_id == $com_user) {
                    $delete_comment = '<p class="text-end mt-2">
                                                <a href="delete-user-comment.php?com_id2=' . $com_id . '" class="bg-danger px-2">
                                                    <i class="fa-solid fa-delete-left text-light"></i>
                                                </a>
                                            </p>';
                }
                $print_comment .= $delete_comment;  // Concatenate the delete_comment here
                $print_comment .= '
                                </div>
                            </div>
                        </div>';
            }
        }


        // fetching categories
        $categories = '';
        $myObj->select('manage_categories', '*', "type = 'Product'", null, null);
        $data    = $myObj->getResult();
        if ($data > 0) {
            foreach ($data as $row) {
                $Pc_id = $row['id'];
                $myObj->sql("SELECT * FROM manage_products WHERE cate = '$Pc_id' && status = 'Active'");
                $data1    = $myObj->getResult();
                $counter = $myObj->getRows('manage_products', "cate = '$Pc_id' && status = 'Active'");
                $category = $row['cat_name'];
                $categories .= '
                        <li class="category-item"><a href="post-category.php?cid=' . $cat_id . '">' . $category . '
                        </a>
                        <span class="post-count">
                        ' . $counter . '
                        </span>
                        </li>';
            }
        }
    }
}

if (isset($_SESSION['comment_msg'])) {
    echo $_SESSION['comment_msg'];
    unset($_SESSION['comment_msg']);
}
?>
<!-- Banner Start -->
<div class="container-fluid Single-banner bannerBg">

    <div class="row">
        <div class="col text-light">
            <h1 class="h1">Single Post</h1>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Content Start -->
<div class="container-fluid my-5">
    <div class="container">
        <div class="row">
            <?php echo $single_post; ?>
            <div class="col-sm-4 col-md-6 col-lg-4">
                <div class="categories bg-transparent p-0 mt-5">
                    <h3 class="h4"><span class="p-cat"></span> CATEGORIES</h3>
                    <ul class="m-0 p-0">
                        <?php echo $categories; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <h2>Comments</h2>
                <h5><?php echo $Comment_counter; ?> comments for A <?php echo $title; ?></h5>
                <div class="Reviewes">
                    <?php echo $print_comment; ?>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <h1 class="h3">Add Comment</h1>
                <p class="">
                    Your email address will not be published. Required fields are
                    marked *
                </p>
            </div>
            <form action="" method="post" class="review-form">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label fs-5">Your review *</label>
                    <textarea class="inputField p-2" name="comment" id="exampleFormControlTextarea1"
                        rows="3"></textarea>
                </div>
                <button type="submit" name="Sub_Review" class="SignUp-Btn">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- Content End -->
<?php include('user\include\footer.php'); ?>