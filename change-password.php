<?php  
    include('user/include/header.php');
    $Alert ='';
    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];

        if(isset($_POST['change_pass'])) {
            $password = $_POST['password'];
            $Con_password = $_POST['con_password'];

            // if input are empty
            if($password == '' && $Con_password == ''){
                $Alert ='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Please!</strong> Fill All the Data
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }else{
                if($password == $Con_password){
                    $uppercase     = preg_match('@[A-Z]@', $password);
                    $lowercase     = preg_match('@[a-z]@', $password);
                    $numbers       = preg_match('@[0-9]@', $password);
                    $specialChars  = preg_match('@[^\w]@', $password);
                        if( !$uppercase || !$lowercase || !$numbers || !$specialChars || strlen($password) <8 ){
                            $Alert ='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Wrong Format!</strong> Password should be 8 characters and include one upper letter and one digit and one special character.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                        }else{
                            $key  = "12wasedvjih90";
                            $password = $password.$key;
                            $password = md5($password);
                        }
                        $params = [
                            'pass' => $password,
                            'con_pass' => $Con_password,
                        ];
                        $myObj->update('manage_players', $params,  "id = '$user_id' ");
                        $run_password = $myObj->getResult();
                        if($run_password){
                            $_SESSION['change_Pass'] ='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <strong>Alright!</strong> Your password has changed.
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>';
                            echo '<script>window.location.href="login.php"</script>';                        
                        }else{
                            $Alert ='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Something went wrong!</strong> Try again.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        }
                }else{
                    $Alert ='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Oh!</strong> Password and Confirm password should be same.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
            }
        }
    }
?>

<div class="container-fluid bannerBg"style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(user/assets/images/About/banner.jpg);">
    <div class="row">
        <div class="col text-light">
            <h1 class="h1">Change Password</h1>
        </div>
    </div>
</div>
</div>
<div class="container-fluid mt-5">
    <div class="container">
        <div class="row">
            <?php echo  $Alert; ?>
            <div class="col-md-6 mx-auto border py-2">
                <form action="" method="post" class="SignUp_Form">
                    <div class="mb-3">
                        <h5>Password</h5>
                        <input type="password" name="password" class="form-control inputField"
                            id="exampleFormControlInput1" placeholder="Enter new password">
                    </div>
                    <div class="mb-3">
                        <h5>Confirm Password</h5>
                        <input type="password" name="con_password" class="form-control inputField"
                            id="exampleFormControlInput1" placeholder="Confirm new password">
                    </div>
                    <button type="submit" name="change_pass" class="SignUp-Btn">Change Password</button>
                </form>

            </div>
        </div>
    </div>
</div>
<?php include('user\include\footer.php') ?>