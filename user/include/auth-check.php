<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('admin/include/database.php');

$myObj = new Database();

if (isset($_SESSION['player'])) {
    // $_SESSION['not_login'] = '<div class="alert alert-danger">Please login to continue.</div>';
    // header('Location: login.php');
    // exit;

    // Auto logout after 25 days inactivity
    $player_id = $_SESSION['player'];
    $myObj->select('manage_players', 'last_login', "id = '$player_id'", null, null);
    $playerData = $myObj->getResult();

    if (!empty($playerData)) {
        $last_login = $playerData[0]['last_login'];
        $today = date('Y-m-d');
        $diff_days = (strtotime($today) - strtotime($last_login)) / (60 * 60 * 24);

        if ($diff_days > 25) {
            session_unset();
            session_destroy();
            header('Location: login.php?session=expired');
            exit;
        } else {
            // Update last login to keep session fresh
            $myObj->update('manage_players', ['last_login' => $today], "id = '$player_id'");
            $myObj->getResult();
        }
    }
}
