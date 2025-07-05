<?php 
include('user/include/connection.php');
include('user/include/header.php');
    $current_matches = '';
    // ========= NEXT MATCH ========= //
    $fetch_query ="SELECT * FROM manage_match where status = 'Approved' ORDER BY id DESC LIMIT 1 OFFSET 1";
    $query_run = mysqli_query($conn, $fetch_query);
    while($candidates = mysqli_fetch_array($query_run)){
        $match_id = $candidates['id'];  
        $candi_A = $candidates['player1'];
        $candi_B = $candidates['player2'];  

            // Fetching Candidate uname key for $candi_A
            $fetch_key_p1 = "SELECT * FROM manage_candidate WHERE ig_id = '$candi_A' ";
            $key_num_p1 = mysqli_query($conn, $fetch_key_p1);
            $key_value_p1 = mysqli_fetch_array($key_num_p1);
            $candiA_uname = $key_value_p1['uname'];
            $candi1_Avtar = $key_value_p1['avtar'];

            // Fetching Candidate uname key for $candi_B
            $fetch_key_p2 = "SELECT * FROM manage_candidate WHERE ig_id = '$candi_B' ";
            $key_num_p2 = mysqli_query($conn, $fetch_key_p2);
            $key_value_p2 = mysqli_fetch_array($key_num_p2);
            $candiB_uname = $key_value_p2['uname'];
            $candi2_Avtar = $key_value_p1['avtar'];
    }

    // ========= Crrunt Matches ========= //
     //    fetch data from tbl
     $fetch  = "SELECT * FROM manage_match where status = 'Approved' ";
     $data   =  mysqli_query($conn,$fetch);
     $serial = 0;
     while($row    = mysqli_fetch_array($data)){
       $match_id   = $row['id'];  
       $p1 = $row['player1'];  
       $p2 = $row['player2']; 
       
    //    ===== fetching players username throug the in-game id
    // Fetching Candidate uname key for $p1
    $fetch_key_p1 = "SELECT * FROM manage_candidate WHERE ig_id = '$p1' ";
    $key_num_p1 = mysqli_query($conn, $fetch_key_p1);
    $key_value_p1 = mysqli_fetch_array($key_num_p1);
    $key_nums_p1 = $key_value_p1['uname'];

    // Fetching Candidate uname key for $p2
    $fetch_key_p2 = "SELECT * FROM manage_candidate WHERE ig_id = '$p2' ";
    $key_num_p2 = mysqli_query($conn, $fetch_key_p2);
    $key_value_p2 = mysqli_fetch_array($key_num_p2);
    $key_nums_p2 = $key_value_p2['uname'];

           $current_matches .='
           <div class="row m-0 my-5">
           <div class="col-6 match-images p-2">
               <div class="row m-0">
                   <div class="col-4">
                       <div class="player-img">
                           <img src="assets/images/blogs/sub-1.jpg" alt="">
                           <h2 class="h4 player-name text-light py-2">
                             '.$key_nums_p1.'
                           </h2>
                       </div>
                   </div>
                   <div class="col-4 d-flex justify-content-center align-items-center">
                      <div class="vs-img mt-5">
                       <img src="assets/images/shedule/vs_finished.png" alt="">
                      </div>
                   </div>
                   <div class="col-4">
                       <div class="player-img">
                           <img src="assets/images/blogs/sub-1.jpg" alt="">
                           <h3 class="h4 player-name text-light py-2">
                              '.$key_nums_p2.'
                           </h3>
                       </div>
                   </div>
               </div>
           </div>
           <div class="col-6 text-light text-center pt-4">
                  <div class="match-about">
                   <div class="m-cate d-flex justify-content-evenly">
                      <h3 class="h5"> Match Date</h3>
                   </div>
                   <div class="match-time mt-2">
                       12 May 2023 
                   </div>
               </div>
           </div>
       </div>';
}
?>
<!-- ===== NEXT MACH START ===== -->
<div class="container-fluid single-match">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5 sm-heading">
                <h3 class="title">Next Match</h3>
                <p class="fs-4">Here is the Candidates of Next Match</p>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="img-box">
                    <div class="inner-img-box">
                        <img src="Admin/assets/upload/<?php echo $candi1_Avtar;?>" alt="">
                    </div>
                </div>
                <h3 class="h4 fs-1 text-center text-capitalize"><?php echo $candiA_uname;?></h3>
            </div>
            <div class="col-sm-12 col-md-4 text-center match-bw">
                <h3 class="h1 fs-5"><span>V</span><span>/</span><span>S</span> </h3>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="img-box">
                    <div class="inner-img-box">
                        <img src="Admin/assets/upload/<?php echo $candi2_Avtar;?>" alt="">
                    </div>
                </div>
                <h4 class="h4 fs-1 text-center text-capitalize"><?php echo $candiB_uname;?></h4>
            </div>
        </div>
    </div>
</div>
<!-- ===== Next Match End ===== -->
<div class="container-fluid my-5">
    <div class="container">
        <div class="row m-0">
            <div class="col-10 mx-auto text-center">
                <h2 class="h1 title">Current Matches</h2>
            </div>

            <div class="row m-0 my-5 ">
                <div class="col-6 match-images p-2">
                    <div class="row m-0">
                        <div class="col-4">
                            <div class="player-img">
                                <img src="https://w0.peakpx.com/wallpaper/903/856/HD-wallpaper-pubg-mobile-karakter-game.jpg"
                                    alt="">
                                <h2 class="h4 player-name py-2">
                                    $key_nums_p1
                                </h2>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-center align-items-center">
                            <div class="vs-img mt-5">
                                <img src="assets/images/shedule/vs_finished.png" alt="">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="player-img">
                                <img src="https://w0.peakpx.com/wallpaper/903/856/HD-wallpaper-pubg-mobile-karakter-game.jpg"
                                    alt="">
                                <h3 class="h4 player-name  py-2">
                                    $key_nums_p2
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 text-center pt-4">
                    <div class="match-about">
                        <div class="m-cate d-flex justify-content-evenly">
                            <h3 class="h5"> Match Date</h3>
                        </div>
                        <div class="match-time mt-2">
                            12 May 2023
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content End -->
<?php include('user\include\footer.php') ?>