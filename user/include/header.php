<?php
    include('user/include/auth-check.php');

    // deault variables
    $name = $Items = '';
    $auth_check = false;

    if (isset($_SESSION['player'])) {
        $auth_check = true;
        $player = $_SESSION['player'];
        $myObj->select('manage_players', '*', "id = '$player'", null, null);
        $run = $myObj->getResult();
        if ($run > 0) {
            foreach ($run as $data) {
                $name   = $data['name'];
            }
        }

        if (!isset($_SESSION['cart'])) {
            $Items = 0;
        } else {
            $Items = count($_SESSION['cart']);
        }
    }

$myObj->sql("SELECT * From manage_website");
$run = $myObj->getResult();
// print_r($run);
if ($run > 0) {
    foreach ($run as $data) {
        $site_title   = $data['site_title'];
        $site_phone   = $data['site_phone'];
    }
}

$myObj->sql("SELECT * From manage_site_socials");
$runSocials = $myObj->getResult();
// print_r($runSocials);
if ($runSocials > 0) {
    foreach ($runSocials as $data) {
        $facebook   = $data['facebook'];
        $twitter    = $data['twitter'];
        $linkd      = $data['linkd'];
        $insta      = $data['insta'];
    }
}

// ======= DAYNAMICALLY CHANGE TITLE
$page = basename($_SERVER['PHP_SELF']);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $page; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="user/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="user/assets/lib/fancy-box/jquery.fancybox.min.css" rel="stylesheet" />

    <!-- CORE CSS== -->
    <link rel="stylesheet" href="user/assets/css/style.css" />
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid top-bar px-0 py-1 py-lg-0">
        <div class="row g-0  d-flex topBarInner">
            <div class="col d-none d-lg-block ps-5 text-start topBarInner2">
                <div class="h-100 d-inline-flex align-items-center text-white topBarInner3">
                    <span>Follow Us:</span>
                    <a class="btn btn-link" href="<?php echo $facebook; ?>"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-link" href="<?php echo $twitter; ?>"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-link" href="<?php echo $linkd; ?>"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-link" href="<?php echo $insta; ?>"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col text-start">
                <?php if ($name) {
                ?>
                    <div class="d-sm-block d-lg-flex <?= $auth_check ? 'justify-content-end me-5' : 'justify-content-center' ?> j align-items-center">
                        <a class="btn btn-link text-light text-decoration-none position-relative" href="user-profile.php">
                            <i class="fa-solid fa-user fs-4"></i>
                            <span class="text-capitalize fs-5 ms-2"> <?php echo $name; ?></span>

                        </a>
                    </div>
                <?php } else {
                } ?>
            </div>

            <div class="col-8 col-md-4 text-center <?= $auth_check ? 'd-none' : 'd-flex' ?> align-items-center justify-content-evenly">
                <div>
                    <i class="fa-solid fa-arrow-right-to-bracket fs-5 text-light"></i>
                    <a href="login.php" class="text-light me2">
                        Login
                    </a>
                </div>
                <div>
                    <i class="fa-solid fa-user-plus fs-5 text-light"></i>
                    <a href="signup.php" class="text-light me2">
                        Signup
                    </a>
                </div>
                <div>
                    <i class="fa-solid fa-user-plus fs-5 text-light"></i>
                    <a href="candidate.php" class="text-light me2">
                        Join
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    <div class="container-fluid g-0 " id="nav-sticky">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <h1 class="ms-5"><?php echo $site_title; ?></h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item Header-item">
                            <a class="menu-item active" href="index.php">Home</a>
                        </li>
                        <li class="nav-item Header-item">
                            <a class="menu-item" href="about.php">About</a>
                        </li>
                        <li class="nav-item Header-item">
                            <a class="menu-item" href="shedule.php">Matches</a>
                        </li>
                        <li class="nav-item Header-item">
                            <a class="menu-item" href="shop.php">Shop</a>
                        </li>
                        <li class="nav-item Header-item">
                            <a class="menu-item" href="blog.php">Blog</a>
                        </li>
                        <li class="nav-item Header-item">
                            <a class="menu-item" href="contact.php">Contact</a>
                        </li>
                    </ul>
                    <!-- Search Button -->
                    <form class="search-form" method="GET" action="search.php">
                        <button class="search-button">
                            <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img"
                                aria-labelledby="search">
                                <path
                                    d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9"
                                    stroke="currentColor" stroke-width="1.333" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </button>
                        <input class="search-input w-100" placeholder="Type your search" name="search" required="" type="text">
                    </form>
                    <!-- Search Button -->
                </div>
            </div>
        </nav>
    </div>

    <div id="cart">
        <a href="my-cart.php" data-quantity="" class="Cart_Btn text-decoration-none">
            <svg class="Cart_Btn_iCon" viewBox="0 0 24.38 30.52" height="30.52" width="24.38" xmlns="http://www.w3.org/2000/svg">
                <title>icon-cart</title>
                <path transform="translate(-3.62 -0.85)"
                    d="M28,27.3,26.24,7.51a.75.75,0,0,0-.76-.69h-3.7a6,6,0,0,0-12,0H6.13a.76.76,0,0,0-.76.69L3.62,27.3v.07a4.29,4.29,0,0,0,4.52,4H23.48a4.29,4.29,0,0,0,4.52-4ZM15.81,2.37a4.47,4.47,0,0,1,4.46,4.45H11.35a4.47,4.47,0,0,1,4.46-4.45Zm7.67,27.48H8.13a2.79,2.79,0,0,1-3-2.45L6.83,8.34h3V11a.76.76,0,0,0,1.52,0V8.34h8.92V11a.76.76,0,0,0,1.52,0V8.34h3L26.48,27.4a2.79,2.79,0,0,1-3,2.44Zm0,0">
                </path>
            </svg>
            <span class="Cart_quantity position-relative"><?php echo $Items; ?></span>
        </a>
    </div>