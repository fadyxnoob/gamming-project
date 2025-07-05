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

?>