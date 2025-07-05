<?php  
    include('user/include/header.php');
    $emailMsg  = $forget_email = '';
    if(isset($_POST["forget_pass"])){
        $forget_email = $_POST['email'];
        $myObj->select('manage_players', '*', "mail = '$forget_email' ", null, null);
        $run = $myObj->getResult($conn,$query);
        if($run > 0){
            foreach($run as $data){

            }
        }

        if($data){  
            echo '<script>window.location.href="change-password.php?user_id='.$data['id'].'"</script>';
        }else{
            $emailMsg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Please!</strong> Enter Valid Email Address
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
?>
<div class="container-fluid bannerBg" style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(user/assets/images/About/banner.jpg);">
    <div class="row">
        <div class="col text-light">
            <h1 class=" title">Forget Password</h1>
        </div>
    </div>
</div>
</div>
<div class="container-fluid my-5">
    <div class="container">
        <div class="row">
            <?php echo $emailMsg; ?>
            <div class="col-md-6 mx-auto border py-2">

                <form action="" method="post" class="SignUp_Form">
                    <div class="mb-3">
                        <h4>Enter your Email Address</h4>
                        <input type="email" name="email" class="form-control inputField"
                            id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <button type="submit" name="forget_pass" class="SignUp-Btn">Forget Password</button>
                </form>

            </div>
        </div>
    </div>
</div>
<?php include('user\include\footer.php') ?>