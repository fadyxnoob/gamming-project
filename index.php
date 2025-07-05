<?php
// error_reporting(E_ALL);
include('user/include/header.php');
$carousel_item = $posts = $Final_Winners = $counter_heading = $home_slider = $gallrey = $products = '';

$myObj->select('manage_slider', '*', 'slider_status = "Active" ');
$run = $myObj->getResult();

$myObj->getRows('manage_slider', 'slider_status = "Active" ');
$slider_count  = $myObj->getResult();

$index = 0;

if (!empty($run)) {
    foreach ($run as $data) {
        $id = $data['id'];
        $slider_title =  $data['title'];
        $slider_img = $data['img'];

        // First item should be active
        $active_class = ($index == 0) ? 'active' : '';

        $carousel_item .= '<div class="carousel-item ' . $active_class . '">
                <img class="w-100" src="admin/assets/upload/' . $slider_img . '" alt="slider" />
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 text-center mt-5 pt-5">
                                <h2 class="fs-1 display-5 mt-5 pt-5 text-white fw-bold mb-5 animated slideInRight">
                                ' . $slider_title . '
                                </h2>
                                <a href="about.php" class="btn btn-primary py-3 px-5 animated slideInRight">Explore More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

        $index++; // increment the counter
    }
}



//  ========  Index Products ========= 
$myObj->select('manage_products', '*', null, null, '3');
$result = $myObj->getResult();
// print_r($result);
if ($result > 0) {
    foreach ($result as $data) {
        $pro_id = $data['id'];
        $pro_img = $data['image'];
        $products .= '<div class="item">
                <div class="product-warrper rounded overflow-hidden">
                    <div class="product-img-1 bg-dark">
                        <img src="admin/assets/upload/' . $pro_img . '"alt="product" class="img-fluid" id="image1" />              
                    </div>
                    <div class="products-asset d-flex flex-column">
                        <a href="single-product.php?spro_id=' . $pro_id . '">
                        <i class="fa-solid fa-eye text-light"></i></a>
                        <a href="single-product.php?spro_id=' . $pro_id . '"><i class="fa-solid fa-bag-shopping text-light"></i></a>
                    </div>
                </div>
            </div>';
    }
}


//  ========  Index Posts ========= 
$Cont_msg = '..';
$myObj->select('manage_posts', '*', null, null, '3');
$postResult = $myObj->getResult();

// print_r($postResult);
if ($postResult > 0) {
    foreach ($postResult as $result) {
        $post_id     = $result['id'];
        $title       = $result['title'];
        if (strlen($title) > 55) {
            $title = substr($title, 0, 55);
        }
        $desc        = $result['description'];
        $cat_id      = $result['cate'];
        $posted_date = $result['date'];
        $post_day = date('d ', strtotime($posted_date));
        $post_month = date(' M ', strtotime($posted_date));
        $img = $result['image'];
        $post_img = '  <img src="admin/assets/upload/' . $img . '" alt="Blog" width="100%" height="100%">';
        $Author = $result['posted_by'];

        // fetching author name from tbl
        $myObj->select('register', 'name', 'id = ' . $Author . '', null, null);
        $authResult = $myObj->getResult();
        foreach ($authResult as $data) {
            $Author_name = $data["name"];
        }

        //fetching cate name from cate tbl
        $myObj->select('manage_categories', 'cat_name', 'id = ' . $cat_id . '', null, null);
        $catResult = $myObj->getResult();
        foreach ($catResult as $data) {
            $cat_name = $data['cat_name'];
        }

        $posts .= '<div class="col-sm-10 col-md-6 col-lg-4 mx-sm-auto mx-md-0 mb-4">
                <div class="full-wrapper wrapper-3">
                    <div class="image-part">
                        <a href="single-post.php?post_id=' . $post_id . '" class="image">
                            ' . $post_img . '
                        </a>
                    </div>
                    <div class="blog-content">
                        <span class="date-full">
                            <span class="day">' . $post_day . '</span>
                            <br />
                            <span class="month">' . $post_month . '</span>
                        </span>
                        <div class="blog-meta">
                            <a href="post-category.php?cid=' . $cat_id . '">' . $cat_name . '</a>
                        </div>
                        <div class="b-title">
                            <a href="single-post.php?post_id=' . $post_id . '">' . $title . '.' . $Cont_msg . '</a>
                        </div>  
                        <div class="author-info d-flex justify-content-end mt-2">
                            <div class="avatar">
                                <i class="fa-solid fa-user "></i>
                            </div>
                            <div class="info">
                                <p class="author-name">' . $Author_name . '</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }
}

//  ======== About START ========= 
$myObj->sql('SELECT * FROM manage_about ');
$aboutResult = $myObj->getResult();
if ($aboutResult > 0) {
    foreach ($aboutResult as $data) {
        $ab_disc  = $data['data'];
        if (strlen($ab_disc) > 1550) {
            $ab_disc = substr($ab_disc, 0, 1500);
        }
        $ab_image = $data['img'];
    }
}

//  ======== LIVE STREAM EVENT START ========= 
$myObj->sql('SELECT * FROM mange_event ');
$aboutResult = $myObj->getResult();
if ($aboutResult > 0) {
    foreach ($aboutResult as $data) {
        $event_link  = $data['link'];
        $event_thumb = $data['thumb'];
        $event_status = $data['status'];
    }
}


// ========== FINAL Winers =========
$myObj->sql("SELECT * FROM final_winners");
$winnerResult = $myObj->getResult();

if ($winnerResult > 0) {
    foreach ($winnerResult as $data) {
        $FW_uname    = $data["uname"];
        $myObj->sql("SELECT * FROM `manage_players` WHERE uname = '$FW_uname'");
        $winnerMoreResult = $myObj->getResult();
        // print_r($winnerMoreResult);
        if ($winnerMoreResult > 0) {
            foreach ($winnerMoreResult as $data) {
                $FW_Profile   = $data["profile"];
                $FW_facebook  = $data["facebook"];
                $FW_instagram = $data["instagram"];
                $FW_youtube   = $data["youtube"];
                $FW_twtter    = $data["twitter"];

                $Final_Winners .= '<div class="col-sm-8 col-md-6 col-lg-4 mt-sm-2 mt-lg-0 mx-auto">
                        <div class="Wcard-wrapper mx-auto">
                            <img src="admin/assets/upload/' . $FW_Profile . '"
                                alt="Final Winner">
                            <h2 class="text-capitalize">' . $FW_uname . '</h2>
                            <ul>
                                <li>
                                    <a href="' . $FW_facebook . '">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="' . $FW_instagram . '">
                                        <i class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="' . $FW_twtter . '">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="' . $FW_youtube . '">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>';
            }
        }
    }
}

?>

<!-- Carousel Start -->
<div class="container-fluid px-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            echo $carousel_item;

            if ($slider_count > 1) {
                echo '<button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>';
            }
            ?>
        </div>
    </div>
</div>
<!-- Carousel End -->
<!-- products -->
<div class="container-fluid px-5">
    <div class="container">
        <div class="row">
            <div class="col text-center my-5">
                <h2 class="title">OUR PRODUCTS</h2>
            </div>
        </div>
        <div class="row">
            <div class="owl-carousel product-carousel">
                <?php echo $products; ?>
            </div>
        </div>
    </div>
</div>
<!-- products -->
<!-- live stream -->
<div class="container-fluid mt-5">
    <div class="container ">
        <div class="row">
            <div class="col text-center" id="liveEventStatus">
                <h3 class="title">
                    Live Stream
                </h3>
                <div class="p fs-5">
                    <!-- <?php
                            if ($event_status == 'Active') {
                                echo 'You can watch our youtube live Stream here.';
                            } else {
                                echo 'Stream Closed';
                            }
                            ?> -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid live_stream">
    <div class="row">
        <div class="col p-0" id="showLiveStream"></div>
    </div>
</div>
<!-- live stream -->
<!-- event -->
<div class="container-fluid event">
    <div class="row">
        <div class="col py-5 my-3">
            <h3 class="h1 text-white text-center title">
                <?php
                $myObj->sql("SELECT * FROM manage_counter");
                $eventResult = $myObj->getResult();
                if ($eventResult > 0) {
                    foreach ($eventResult as $data) {
                        $deal_id = $data['event_id'];
                        $counter_heading = $data['heading'];
                    }
                }
                echo $counter_heading;
                ?>
            </h3>
            <div class="count-down row mx-auto">
                <div class="box  mx-auto">
                    <p class="h1 text-white" id="days"></p>
                    <span class="text-light ms-2">Day</span>
                </div>
                <div class="box  mx-auto">
                    <p class="h1 text-white" id="hours"></p>
                    <span class="text-light ms-2">Hour</span>
                </div>
                <div class="box  mx-auto">
                    <p class="h1 text-white" id="minutes"></p>
                    <span class="text-light ms-2">Minutes</span>
                </div>
                <div class="box  mx-auto">
                    <p class="h1 text-white" id="seconds"></p>
                    <span class="text-light ms-2">Sec</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- event -->
<!-- blog post -->
<div class="container-fluid mt-5 mb-2">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h3 class="title">LATEST NEWS</h3>
            </div>
        </div>
        <div class="row">
            <?php echo $posts; ?>
        </div>
    </div>
</div>
<!-- Winners Of Tournaments -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <h6 class="h1 title text-center">Latest Winners</h6>
            <?php if ($Final_Winners == '') {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Unfortunaitly!</strong> No Result Found
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            } else {
                echo $Final_Winners;
            }
            ?>

        </div>
    </div>
</div>
<!-- Winners Of Tournaments -->

<script>
    let countDownDate = <?php
                        $deal = '';
                        $myObj->select('manage_counter', '*', null, 'event_id  DESC', null);
                        $cuntDownResult = $myObj->getResult();
                        if ($cuntDownResult > 0) {
                            foreach ($cuntDownResult as $data) {
                                $deal_id = $data['event_id'];
                                $date = $data['event_date'];
                                $h = $data['event_h'];
                                $m = $data['event_m'];
                                $s = $data['event_s'];
                            }
                        }

                        echo strtotime("$date $h:$m:$s") ?> * 1000;
    let now = <?php echo time() ?> * 1000;
    let x = setInterval(function() {
        now = now + 1000;
        let distance = countDownDate - now;
        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById("days").innerText = days;
        document.getElementById("hours").innerText = hours;
        document.getElementById("minutes").innerText = minutes;
        document.getElementById("seconds").innerText = seconds;
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);

    function showAlert() {
        let customAlert = document.getElementById("custom-alert");
        customAlert.style.display = "block";
    }

    function closeAlert() {
        let customAlert = document.getElementById("custom-alert");
        customAlert.style.display = "none";
    }

    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('success') === 'true') {
        showAlert();
    }
</script>
<?php include('user/include/footer.php'); ?>