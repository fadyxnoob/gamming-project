<?php
include('include/database.php');
$myObj = new Database();

if (isset($_GET['member_id']) && is_numeric($_GET['member_id'])) {
    $member_id = $_GET['member_id'];

    // Fetch member profile image
    $myObj->select('manage_our_team', 'profile', "id = '$member_id'");
    $data = $myObj->getResult();

    if (!empty($data)) {
        $profile = $data[0]['profile'];

        // Delete image file if it exists and not empty
        if (!empty($profile)) {
            $file = 'assets/upload/' . $profile;
            if (file_exists($file)) {
                unlink($file);
            }
        }

        // Delete record from database
        $deleted = $myObj->delete('manage_our_team', "id = '$member_id'");

        if ($deleted) {
            echo '<script>window.location.href="manage-team.php"</script>';
            exit;
        } else {
            echo "❌ Member deletion failed!";
            exit;
        }
    } else {
        echo "⚠️ No member found with this ID.";
        exit;
    }
} else {
    echo "❌ Invalid request!";
    exit;
}
