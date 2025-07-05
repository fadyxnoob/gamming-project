<?php 
    include('include\header.php');
    include('include\sidebar.php');
    $mcat_name = $popstatus_btn = $category =  $post = $poppost_id = $cat_name =  $popstatus_id = $user_id ='';
    if(isset($_SESSION['login'])){
        $user_id = $_SESSION['login'];
    }

    //    fetch data from tbl
    $myObj->select('manage_posts', '*', "posted_by = '$user_id' ", null, null);
    $data   = $myObj->getResult();
    if($data > 0){
        $serial = 0;
        foreach($data as $row){
            $serial++;
            $post_id    = $row['id'];   
            $name       = $row['title'];
            $disc       = $row['description'];
            $cat_id     = $row['cate'];
            $status     = $row['status'];
            $pop_status = $row['popular'];
            $img         ='<img src="assets/upload/'.$row['image'].'" width="50px" height="50px">';
            $author_id   = $row['posted_by'];
            $date        = $row['date'];
            $p_date      = date('d M Y', strtotime($date));
          
            if($pop_status == 'popular'){
                $popstatus_btn ='<a href="post-pop-status.php?popstatus_id='.$post_id.'&pop_status=unpopular" class="btn bg-success text-light">
                                    <i class="fa-solid fa-wifi"></i>
                                </a>';
            }else{
                $popstatus_btn ='<a href="post-pop-status.php?popstatus_id='.$post_id.'&pop_status=popular" class="btn bg-danger">
                                    <i class="fa-solid fa-wifi"></i>
                                </a>';
            }
            if($status == 'Draft'){
            $status_btn ='<a href="post-status.php?status_id='.$post_id.'&status=Published" class="btn bg-danger">
                            <i class="fa-solid fa-wifi"></i>
                        </a>';
            }else{
                $status_btn ='<a href="post-status.php?status_id='.$post_id.'&status=Draft" class="btn bg-success text-light">
                                <i class="fa-solid fa-wifi"></i>
                            </a>';
            }
            
            // fetch category
            $myObj->select('manage_categories', '*', "id = '$cat_id'", null, null);
            $data2   = $myObj->getResult();
            if($data2 > 0){
                foreach($data2 as $row2)
                $mcat_name  = $row2['cat_name'];
            }
    
            // fetc author name
            $myObj->select('register', '*', "id = '$author_id'", null, null);
            $data3   = $myObj->getResult();
            if($data3 > 0){
                foreach($data3 as $row3){
                    $Author_name  = $row3['name'];
                }
            }  

    
            $post .='<tr>
                        <td>'.$serial.'     </td>
                        <td>'.$name.'       </td>
                        <td>'.$mcat_name.'   </td>
                        <td>'.$disc.'       </td>
                        <td>'.$status_btn.' </td> 
                        <td>'.$popstatus_btn.' </td> 
                        <td>'.$p_date.'        </td> 
                        <td>'.$Author_name.'        </td> 
                        <td>'.$img.'        </td> 
                        <td>
                            <a href="update-post.php?post_id='.$post_id.'" class="btn bg-info">
                            <i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td> 
                            <a href="delete-post.php?post_id='.$post_id.'"class="btn bg-warning">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>';
        }
    }
    
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Manage Posts</li>
        </ol>
        <div class="row">
            <div class="col text-end mb-3">
                <a href="add-post.php" type="button" class="SignUp-Btn text-decoration-none">
                    <span data-feather="calendar"></span>
                    Add Post
                </a>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Popular</th>
                                <th scope="col">Date</th>
                                <th scope="col">Auther</th>
                                <th scope="col">Image</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if($post == ''){
                                    echo'<div class="alert alert-warning d-flex align-items-center justify-content-between p-0 ps-2 fs-5" role="alert">
                                    We did not found your post <a href="add-post.php" class="alert-link SignUp-Btn text-decoration-none">View more </a>
                                </div>';
                                }else{
                                    echo $post;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</main>
<!-- ===== MAIN END ===== -->  
<?php include('include\footer.php'); ?>