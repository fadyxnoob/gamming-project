<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; ELDRITCH 2023</div>
        </div>
    </div>
</footer>
</div>
</div>
<!-- <script src="../assets/js/scripts.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>

<!-- summer note -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.js"></script>

<script src="assets/js/datatables-simple-demo.js"></script>
<script src="assets/js/datatables-simple-demo2.js"></script>
<script src="assets/js/datatables-simple-demo3.js"></script>
<script src="assets/js/datatables-simple-demo4.js"></script>
<script src="assets/js/scripts.js"></script>
<script type="text/javascript">
$(document).ready(function() {
        $('#about_data').summernote();
    });
$(document).ready(function() {
    setInterval(function() {
        $.post("comment_seen.php", {
            data: 'get'
        }, function(data) {
            if (data > 0) {
                $(".comments_counter").show();
                $(".comments_counter").text(data);
            }
        });
    },1000);

    $(".comments_seen").click(function() {
        console.log('Button clicked'); // Check if the button click event is fired
        $(".comments_counter").hide();
        $.post("comment_seen.php", {
            update: 'update'
        }, function(data) {
            console.log('Response from server: ' + data); // Check the response from the server
        });
    });
});
</script>
</body>

</html>