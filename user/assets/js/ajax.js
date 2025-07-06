$(document).ready(function () {
    var player = null;

    function loadData() {
        $.ajax({
            url: "load-data.php",
            type: "POST",
            dataType: "json",
            success: function (result) {
                
                if (result.streamContent) {
                    $("#showLiveStream").html(result.streamContent);
                } else {
                    $("#showLiveStream").html('<div class="text-danger">No stream available.</div>');
                }

                if (result.statusContent) {
                    $("#liveEventStatus").html(result.statusContent);
                } else {
                    $("#liveEventStatus").html('<div class="text-danger">No status found.</div>');
                }

                if (result.streamActive) {
                    enableStreamLink(result.streamLink);
                } else {
                    disableStreamLink();
                }
            },

            error: function (xhr, status, error) {
                console.error("AJAX ERROR::", xhr.responseText);
            }
        });
    }

    // Function to enable the stream link
    function enableStreamLink(link) {
        $("#streamLink").attr("href", link).removeClass("disabled").removeAttr("onclick");
    }

    // Function to disable the stream link
    function disableStreamLink() {
        $("#streamLink").addClass("disabled").attr("onclick", "return false;").removeAttr("href");
    }

    // Function to stop the video player (if applicable)
    function stopVideo() {
        // Implement logic here to stop the video player, if necessary
        // Example: if (player) { player.stop(); }
    }

    // Call loadData once immediately
    loadData();

    // Set up interval to call loadData every 5 seconds (5000 milliseconds)
    setInterval(loadData, 1000); // Adjust the interval as needed
});
