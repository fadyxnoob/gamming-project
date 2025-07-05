<?php 
    include('include\header.php');
    include('include\sidebar.php');
    
    $last_result  = $member_id ='';
    //    fetch data from tbl
      $myObj->sql("SELECT * FROM comments");
      $data   =  $myObj->getResult();
      if($data > 0){
        $serial = 0;
        foreach($data as $row){
            $serial     = $serial + 1;
            $id = $row['id'];   
            $name       = $row['name'];
            $post_id        = $row['post_id'];
            $comment        = $row['comment'];
            $date   = $row['date'];
    
                $last_result .='<tr>
                    <td>'.$serial.'     </td>
                    <td>'.$name.'       </td>
                    <td>'.$post_id.'       </td>
                    <td>'.$comment.'       </td>
                    <td>'.$date.'        </td> 
                    <td>
                        <a href="delete-comment.php?cmt_id='.$id.'"class="btn text-danger border border-warning">
                            <i class="fa-solid fa-trash"></i>
                        <a>     
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
            <li class="breadcrumb-item active">Manage Comments</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User</th>
                            <th scope="col">Post</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Date</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $last_result; ?>
                    </tbody>
                </table>
            </div>
        </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>