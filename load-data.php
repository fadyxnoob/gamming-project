<?php
include('user/include/connection.php');

// Initialize response array
$response = array(
    "streamContent" => "",
    "statusContent" => "",
    "streamActive" => false,
    "streamLink" => ""
);

// Fetching live stream data
$fetch_event = "SELECT * FROM mange_event";
$event_run = mysqli_query($conn, $fetch_event);

if ($event_run) {
    while ($event_result = mysqli_fetch_array($event_run)) {
        $event_Thumbnail = $event_result['thumb'];
        $event_status = $event_result['status'];
        $event_link = $event_result['link'];

        // Generate HTML for each event
        $streamContent = '<div class="col p-0">
                            <div class="blog-img-video video">
                                <img alt="video-img" src="admin/assets/upload/' . $event_Thumbnail . '" />
                                <a data-fancybox="" class="button button-animate" href="';

        if ($event_status == 'Active') {
            $streamContent .= $event_link;
            $response['streamActive'] = true;
            $response['streamLink'] = $event_link;
        }

        $streamContent .= '">
                            <i class="fa-solid fa-play animate_icon"></i>
                            </a>
                            </div>
                            </div>';

        // Append to response
        $response['streamContent'] .= $streamContent;

        // Generate status content
        $statusContent = '<div class="col text-center">
                            <h3 class="title">Live Stream</h3>
                            <div class="p fs-5">';

        if ($event_status == 'Active') {
            $statusContent .= "You can watch our YouTube live Stream here.";
        } else {
            $statusContent .= "Stream Closed.";
        }

        $statusContent .= '</div>
                        </div>';

        // Append to response
        $response['statusContent'] .= $statusContent;
    }
} else {
    $response['statusContent'] = "Error fetching data from the database.";
}

// Return JSON encoded response
echo json_encode($response);
?>
