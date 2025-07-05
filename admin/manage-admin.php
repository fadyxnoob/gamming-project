<?php 
    $admin =  $status_btn = '';
    include('include\header.php');
    include('include\sidebar.php');
    if(!isset($_SESSION['login'])){
        echo '<script>window.location.href="log-in.php"</script>';
    } else {
        $user = $_SESSION['login'];
    } 

    // fetch data from tbl
    $myObj->sql("SELECT * FROM register");
    $data = $myObj->getResult();
    if($data > 0){
        $serial = 0;
        foreach($data as $row){
            $serial = $serial + 1;
            $A_id = $row['id'];   
            $name = $row['name'];
            $fname = $row['fname'];
            $email = $row['email'];
            $uname = $row['uname'];
            $avtar = $row['profile'];
            $img = '<img src="assets/upload/'.$avtar.'" width="50px" height="50px">'; 
            $posts = $row['posts'];
    
            $editAdmin = ''; 
            if($user == $A_id){
                $editAdmin = '<a href="edit-admin.php?edit_admin='.$A_id.'" class="SignUp-Btn text-light ">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>';
            }
    
            $admin .='<tr>
                <td>'.$serial.'</td>
                <td>'.$name.'  </td>
                <td>'.$uname.' </td> 
                <td>'.$email.' </td> 
                <td>'.$img.'   </td> 
                <td>'.$posts.' </td> 
                <td>'.$editAdmin.'</td>
            </tr>';
        }
    }
    
?>

<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Manage Admin</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Image</th>
                            <th scope="col">Posts</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $admin; ?>
                    </tbody>
                </table>
            </div>
        </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>