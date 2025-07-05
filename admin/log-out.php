<?php


session_start();

// Unset all session variables
session_unset();

// Destroy the session
// session_destroy();

// Prevent caching (for browser back button issue)
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

// Redirect to login page
header("Location: login.php");
exit;




// session_start();
// if (isset($_SESSION['login'])) {

//    $login = ($_SESSION['login']);
//    unset($login);

//    // session_destroy();
//    echo '<script>window.location.href="login.php"</script>';
// } else {
//    echo 'Log Out Failed!';
// }


?>