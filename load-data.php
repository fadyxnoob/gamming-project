<?php

header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Set proper header
include_once 'admin/include/database.php';
$myObj = new Database();

// Initialize response array
$response = [
    "streamContent"  => "",
    "statusContent"  => "",
    "streamActive"   => false,
    "streamLink"     => ""
];

// Fetch data using custom method
$myObj->sql("SELECT * FROM `manage_live_stream`");
$data = $myObj->getResult();

// Check if data is available
if (!empty($data) && is_array($data)) {
    foreach ($data as $event_result) {
        $event_Thumbnail = $event_result['thumb'];
        $event_status    = $event_result['status'];
        $event_link      = $event_result['link'];

        // HTML for stream section
        $response['streamContent'] .= '
        <div class="col p-0">
            <div class="blog-img-video video">
                <img alt="video-img" src="admin/assets/upload/' . $event_Thumbnail . '" />
                <a data-fancybox class="button button-animate" href="' .
            ($event_status === 'Active' ? $event_link : '#') . '">
                    <i class="fa-solid fa-play animate_icon"></i>
                </a>
            </div>
        </div>';

        // If stream is active
        if ($event_status === 'Active') {
            $response['streamActive'] = true;
            $response['streamLink'] = $event_link;
        }

        // HTML for stream status
        $response['statusContent'] .= '
        <div class="col text-center">
            <h3 class="title">Live Stream</h3>
            <div class="p fs-5">' .
            ($event_status === 'Active'
                ? 'You can watch our YouTube live Stream here.'
                : 'Stream Closed.') .
            '</div>
        </div>';
    }
} else {
    // No data found
    $response['statusContent'] = '<div class="col text-center text-danger">No live stream available.</div>';
}

// Output clean JSON
echo json_encode($response);
