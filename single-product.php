<?php
include('user/include/header.php');

// default variables
$id = $rece_product = $print_comment = $Short_Disc = $user_id =  $delete_comment = '';
$disc_Dots = '...';

if (isset($_SESSION['player'])) {
    $user_id    = $_SESSION['player'];
    $myObj->select('manage_players', '*', "id = '$user_id'", null, null);
    $img_run   = $myObj->getResult();

    if ($img_run > 0) {
        foreach ($img_run as $img_data) {
            $user_name  = $img_data['name'];
            $user_image = $img_data['profile'];
            $Prin_IMG   = '<img src="admin/assets/upload/' . $user_image . '" class="img-fluid" alt="img" width="100%" height="100%" />';
        }
    }
}


if (isset($_GET['spro_id'])) {
    $product_id = $_GET['spro_id'];

    // Fetch product data
    $myObj->select('manage_products', '*', "id = '$product_id'", null, null);
    $productData = $myObj->getResult();

    if (!empty($productData)) {
        $result = $productData[0];

        $p_id        = $result['id'];
        $name        = $result['name'];
        $cate        = $result['cate'];
        $price       = $result['price'];
        $Full_Disc   = $result['disc'];
        $Short_Disc  = strlen($Full_Disc) > 150 ? substr($Full_Disc, 0, 150) . '...' : $Full_Disc;

        $img         = $result['image'];
        $img1        = $result['image2'];
        $img2        = $result['image3'];
        $img3        = $result['image4'];

        $main_img = '<img src="Admin/assets/upload/' . $img . '" alt="image"/>';
        $sub_img1 = '<img src="Admin/assets/upload/' . $img1 . '" alt="gl-p1"/>';
        $sub_img2 = '<img src="Admin/assets/upload/' . $img2 . '" alt="gl-p2"/>';
        $sub_img3 = '<img src="Admin/assets/upload/' . $img3 . '" alt="gl-p3"/>';

        // Fetch category name
        $Category = 'N/A';
        $myObj->select('manage_categories', '*', "id = '$cate'", null, null);
        $catData = $myObj->getResult();
        if (!empty($catData)) {
            $Category = $catData[0]['cat_name'];
        }

        // HTML Output
        $Single_Pro = '
        <div class="col-lg-6 product-gallery Box_Shadow">
            <div class="product-main-img">' . $main_img . '</div>
            <ul class="product-sub-images">
                <li class="pro-sub-img">' . $sub_img1 . '</li>
                <li class="pro-sub-img">' . $sub_img2 . '</li>
                <li class="pro-sub-img">' . $sub_img3 . '</li>
            </ul>
        </div>
        <div class="col-lg-6 SPro-About ps-lg-5 mt-3 mt-lg-0">
            <form action="manage-cart.php" method="POST">
                <h2 class="h1">' . $name . '</h2>
                <div class="product-price fs-5">
                    <span class="fs-4 fw-bold">Price: </span>' . $price . '
                </div>
                <p class="product-short-info mb-2">' . $Short_Disc . '</p>
                <div class="product-others mb-2 mb-lg-0">
                    <div class="pro-cate fs-5">
                        <span class="fw-bold fs-4">Category : </span>' . $Category . '
                    </div>
                </div>
                <div class="Add-To-Cart d-flex">
                    <button type="submit" name="add_to_cart" class="SignUp-Btn mt-lg-2 py-2 px-4 fs-5">
                        <span></span>Add To Cart
                    </button>
                </div>
                <input type="hidden" value="' . $name . '"    name="item_name">
                <input type="hidden" value="' . $price . '"   name="price">
                <input type="hidden" value="' . $p_id . '"    name="pd_id">
                <input type="hidden" value="' . ($user_id ?? '') . '" name="user_id">
            </form>
        </div>';
    }
}

// recent Categories
$myObj->select('manage_products', '*', null, null, 3);
$data1    = $myObj->getResult();
if ($data1 > 0) {
    foreach ($data1 as $result1) {
        $rp_id    = $result1['id'];
        $name     = $result1['name'];
        $price    = $result1['price'];
        $pro_img  = $result1['image'];

        $rece_product .= '
                    <div class="col-md-6 col-lg-4 mt-sm-5 mt-md-2">
                    <div class="item">
                        <div class="product-warrper rounded overflow-hidden">
                            <div class="product-img-1">
                                <img src="admin/assets/upload/' . $pro_img . '"
                                alt="product-img-1" class="img-fluid" id="image1" />
                            </div>
                            <div class="products-asset d-flex flex-column">
                                <a href="single-product.php?spro_id=' . $rp_id . '">
                                <i class="fa-solid fa-eye text-light"></i></a>
                                <a href="single-product.php?spro_id=' . $rp_id . '">
                                <i class="fa-solid fa-bag-shopping text-light"></i></a>
                            </div>
                        </div>
                    </div>
                </div>';
    }
}


// ===== Comments Insert;
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
        echo '<script>window.location.href="single-product.php?spro_id=' . $p_id . '"</script>';
        exit;
    }

    $props = [
        'name' => $user_name,
        'product_id' => $product_id,
        'comment' => $comment,
        'user_id' => $user_id,
        'status' => $status,
    ];

    $myObj->insert('comments', $props);
    $c_run = $myObj->getResult();

    if ($c_run) {
        echo '<script>window.location.href="single-product.php?spro_id=' . $p_id . '"</script>';
    } else {
        $comment_msg = "<p>Comment posting Fail</p>";
    }
}

// fetching comments for the spesific product
$myObj->select('comments', '*', "product_id = '$product_id'", 'id DESC', null);
$run_comments = $myObj->getResult();
$Comment_counter = $myObj->getRows('comments', "product_id = '$product_id'");

if (!$run_comments) {
    // print_r($myObj->getResult());
} else {
    foreach ($run_comments as $comments_result) {
        $com_id       = $comments_result['id'];
        $com_name       = $comments_result['name'];
        $posted_date    = $comments_result['date'];
        $com_Date       = date('d M Y', strtotime($posted_date));
        $com_comment    = $comments_result['comment'];
        $com_user       = $comments_result['user_id'];
        $print_comment .= '
                    <div class="Reviewer-info">
                        <div class="Review-card border p-2 d-flex justify-content-between">
                            <div class="Reviewer-Detail ps-3">
                                <div class="h6 Reviewer-name fw-bold">' . $com_name . '</div>
                                <p>' . $com_comment . '</p>
                            </div>
                            <div class="the-Review position-relative">
                                <span class="review-date">' . $com_Date . '</span>';
        if ($user_id == $com_user) {
            $delete_comment = '<p class="text-end mt-2">
                                            <a href="delete-user-comment.php?com_id=' . $com_id . '" class="bg-danger px-2">
                                                <i class="fa-solid fa-delete-left text-light"></i>
                                            </a>
                                        </p>';
        }
        $print_comment .= $delete_comment;
        $print_comment .= '
                            </div>
                        </div>
                    </div>';
    }
}

if (isset($_SESSION['comment_msg'])) {
    echo $_SESSION['comment_msg'];
    unset($_SESSION['comment_msg']);
}

?>

<!-- Banner Start -->
<div class="container-fluid single-product-bg ">
    <div class="row">
        <div class="col">
            <p class="product-sequence">
                <span>Eldritch <i class="fa-solid fa-greater-than"></i></span>
                <span>Shop <i class="fa-solid fa-greater-than"></i></span>
                <span><?php echo $Category; ?> <i class="fa-solid fa-greater-than"></i></span>
                <span><?php echo $name; ?></span>
            </p>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Content -->
<div class="container-fluid product-description">
    <div class="container">
        <div class="row">
            <?php echo $Single_Pro; ?>

        </div>
    </div>
    <div class="container-fluid Pro-Disc">
        <div class="container">
            <div class="row mt-5">
                <div class="col">
                    <h2 class="h1">Description</h2>
                    <p class="Pro-Disc">
                        <?php echo $Full_Disc; ?>
                    </p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <h2 class="h1">Comments</h2>
                    <h5><?php echo $Comment_counter; ?> comments for <?php echo $name; ?></h5>
                    <div class="Reviewes">
                        <?php echo $print_comment; ?>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <h3 class="h3">Add Comment</h3>
                    <p>
                        Your email address will not be published. Required fields are
                        marked *
                    </p>
                </div>
                <form action="" method="post" class="review-form">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Your review *</label>
                        <textarea class="inputField p-2" name="comment" id="exampleFormControlTextarea1"
                            rows="10"></textarea>
                    </div>
                    <button type="submit" name="Sub_Review" class="SignUp-Btn">Submit</button>
                </form>
            </div>
            <div class="row">
                <div class=" Recent-Products mt-5">
                    <h3>Recent Products</h3>
                </div>
                <?php echo $rece_product; ?>
            </div>
        </div>
    </div>
</div>
<!-- Content -->
<?php include('user\include\footer.php'); ?>