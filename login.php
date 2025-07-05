<?php

session_start();
include('admin/include/database.php');
$myObj = new Database();

// Constants
define("PASSWORD_KEY", "12wasedvjih90");

// Default variables
$error_msg = $uxser_ID = $not_login_msg = '';

// Flash session message for password changed
if (isset($_SESSION['change_Pass'])) {
    $error_msg = $_SESSION['change_Pass'];
    unset($_SESSION['change_Pass']);
}

// Login check
if (isset($_POST['login'])) {
    $uname = $myObj->escapeString($_POST['uname']);
    $pass  = $myObj->escapeString($_POST['password']);

    // Encrypt password
    $password = md5($pass . PASSWORD_KEY);

    // Query user
    $myObj->select('manage_players', '*', "uname = '$uname' AND pass = '$password'", null, null);
    $userData = $myObj->getResult();

    if (!empty($userData)) {
        $user = $userData[0];

        // Set session
        $_SESSION['player'] = $user['id'];
        $_SESSION['login_msg'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Welcome!</strong> Login Successfully
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

        // Optionally update last_login
        $today = date('Y-m-d');
        $myObj->update('manage_players', ['last_login' => $today], "id = {$user['id']}");
        $myObj->getResult();

        echo '<script>window.location.href="user-profile.php"</script>';
        exit;
    } else {
        $_SESSION['logout_msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong> You should check your Username and Password.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        $error_msg = $_SESSION['logout_msg'];
    }
}

// If redirected without login
if (isset($_SESSION['not_login'])) {
    $not_login_msg = $_SESSION['not_login'];
    unset($_SESSION['not_login']);
}
?>

<!-- Bootstrap CSS v5.2.1 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Boxicons CDN Link -->
<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
<link rel="stylesheet" href="user/assets\css\style.css">

</head>

<body class="signup-bg">
    <div class="container-fluid">
        <div class="container login-container">
            <div class="row">
                <div class="col-md-6 col-lg-4 mx-auto" id="login-col">
                    <?php echo $not_login_msg;
                    unset($_SESSION['not_login']) ?>
                    <?php echo $error_msg; ?>
                    <!-- Form By Uiverse -->
                    <form action="login.php" method="POST" class="form_main">
                        <h1 class="heading text-light">Login</h1>
                        <div class="inputContainer">
                            <svg class="inputIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="#2e2e2e" viewBox="0 0 16 16">
                                <path
                                    d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z">
                                </path>
                            </svg>
                            <input type="text" class="inputField text-light" name="uname" id="username" placeholder="Username">
                        </div>
                        <div class="inputContainer">
                            <svg class="inputIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="#2e2e2e" viewBox="0 0 16 16">
                                <path
                                    d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z">
                                </path>
                            </svg>
                            <input type="password" name="password" class="inputField" id="password"
                                placeholder="Password">
                        </div>
                        <button id="button" name="login" class="">Login</button>
                        <a class="forgotLink text-light" href="forget-password.php">Forgot password?</a>
                        <p class="text-light pb-0">or</p>
                        <a class="forgotLink text-light pt-0" href="signup.php">Sign Up</a>
                    </form>
                    <!-- form by uiverse -->
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>