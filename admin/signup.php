<?php
 include('include/conection.php');
  // Function Creating
 $uname = $email = $password = $nameerror = $nameerror = $unameerror =  $emailerror = $passworderror =  $passworderror = $fillmsg = '';
    function valid_data($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return ($data);
}

//isset button started
if(isset($_POST['signup'])){
    $name              = $_POST['name'];
    $fname             = $_POST['fname'];
    $uname             = $_POST['uname'];
    $email             = $_POST['email'];
    $password          = $_POST['password'];
    $con_password     = $_POST['con_password'];
    $profile           = $_FILES['profile']['name'];
           


    //validations started
    if($name != '' && $fname != '' && $uname != '' && $email != '' &&  $password != '' ){
             
        // name validations
        $name =valid_data($_POST['name']);
        if(!preg_match("/^[a-zA-Z']*$/",$name)){
            $nameerror = "<p class='text-danger'>Type only Letters</p>";
        }else{
            $namemsg = "success";
        }
        // Father name validations
        $fname =valid_data($_POST['fname']);
        if(!preg_match("/^[a-zA-Z']*$/",$fname)){
            $nameerror = "<p class='text-danger'>Type only Letters</p>";
        }else{
            $fnamemsg = "success";
        }

        //Username validations
        $uname = valid_data($_POST['uname']);
        if(!preg_match("/^[a-zA-Z]+[1-9]+/",$uname)){
            $unameerror = "<p class='text-danger'>Type Letters and Numbers</p>";
        }else{
            $unamemsg = "success";
        }


        //Email Validations
        $email = valid_data($_POST['email']);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $emailerror = "Type Valid Email";
        }else{
                    $query = "SELECT * FROM register WHERE email = '$email'";
                    $data = mysqli_query($conn, $query);
                    $count = mysqli_num_rows($data);
                    if($count > 0){
                        $emailerror = "<p class='text-danger'>This Email Already Exist</p>";
                      }else{
                        $emailerror = "<p class='text-success'>This Email Available</p>";
                        
                      }
        //email validations end
        }


        //password validations
        $password =valid_data($_POST['password']);
        if($password !== $con_password){
            $conf_passworderror = "<p class='text-danger'>Your Password does not Match</p>";

        }else{
            $uppercase     = preg_match('@[A-Z]@', $password);
            $lowercase     = preg_match('@[a-z]@', $password);
            $numbers       = preg_match('@[0-9]@', $password);
            $specialChars  = preg_match('@[^\w]@', $password);
                if( !$uppercase || !$lowercase || !$numbers || !$specialChars || strlen($password) <8 ){
                    $passworderror = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
                }else{
                    $key  = "12wasedvjih90";
                    $password = $password.$key;
                    $password = md5($password);
                    $passmsg = "success";
                }
        }
        //password validations ends\

        // img validations

        $allowed_img_extension = array("png",'PNG',"jpg","jpeg");
        // get img extension
        $file_extension = pathinfo($_FILES['profile']['name'],PATHINFO_EXTENSION);
        if(!in_array($file_extension , $allowed_img_extension )){
            $imgerror = "Select Valid Image(choose only jpeg, jpg and png)";
           
        }else{
            if($_FILES['profile']['size'] > 500000){
                $imgerror = "Image size exceeds! Please upload image less than 500kb";
               
               }else{
                $target = "assets/upload/".basename($_FILES['profile']['name']);
                if(file_exists($target)){
                   $imgerror = "$profile file already exist";
                 }else{
                  move_uploaded_file($_FILES['profile']['tmp_name'],$target);
                  $imgerror = "<p class='text-success'>Uploading Successfully</p>";
                 }
                 
               }
                
            }


    //data printing
    if($namemsg == "success" && $fnamemsg == "success" && $unamemsg == "success" && $passmsg == "success"){
                $query = "INSERT INTO `register`( `name`, `fname`, `email`, `uname`, `password`, `con_pass`, `profile`) VALUES ('".$name."','".$fname."','".$email."','".$uname."','".$password."','".$con_password."','".$profile."')";
                $data = mysqli_query($conn,$query);
                if($data){
                $fillmsg = "<p class='text-success'>The data was Inserted
                 <span class='text-danger fw-bold'>Please Remember Your Password</span></p>";
                }else{
                $fillmsg = "<p class='text-danger'>The data was not inserted</p>";
                }
            
    }else{
        $fillmsg = "An error accured";
    }


//validations else

}else{
        if(empty($_POST['name'])){
            $nameerror = "<p class='text-danger m-0 p-0'>Name is required</p>";
        }
        if(empty($_POST['fname'])){
            $nameerror = "<p class='text-danger m-0 p-0'>Father Name is required</p>";
        }
        if(empty($_POST['uname'])){
            $unameerror = "<p class='text-danger m-0 p-0'>user Name is required</p>";  
        }
        if(empty($_POST['email'])){
          $emailerror = "<p class='text-danger m-0 p-0'>Email is required</p>";  
        }
        $fillmsg = '<div class="alert alert-info m-0 p-1">
        Please fill all the data
        </div>';
    }
        
    //validations ended  
    // header('Location:login.php');
  
// issset button end
}


?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="assets\css\admin-dashboard.css"> -->
    <link rel="stylesheet" href="assets\css\accounts.css">

    <style>
    .container-fluid {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
            url(assets/images/sign-up/s3.jpg);
        padding-top: 20px;
        min-height: 100vh;
    }
    </style>
</head>

<body>

    <div class="container-fluid ">
        <div class="container">
            <div class="row">
                <div class="col-6 mx-auto">
                    <!-- signup form by ui-verse -->
                    <div class="form-box">
                        <form class="form" action="" method="POST" enctype="multipart/form-data">
                            <span class="title">Sign up to Eldritch</span>
                            <span class="subtitle">Create a free account with your email.</span>
                            <?php echo $fillmsg ; ?>
                            <div class="form-container">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-input-box">
                                            <input id="name" type="text" name="name" class="input" placeholder="Name">
                                            <span> <?php echo $nameerror; ?></span>
                                        </div>
                                        <div class="form-input-box">
                                            <input type="text" name="uname" class="input" placeholder="Username">
                                            <span> <?php echo $unameerror; ?> </span>
                                        </div>
                                        <div class="form-input-box">
                                            <input type="password" name="password" class="input" placeholder="Password">
                                            <span> <?php echo $passworderror; ?> </span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-input-box">
                                            <input type="text" name="fname" class="input" placeholder="Father Name">
                                            <span> <?php echo $nameerror; ?></span>
                                        </div>
                                        <div class="form-input-box">
                                            <input type="email" name="email" class="input" placeholder="Email address">
                                            <span> <?php echo $emailerror; ?> </span>
                                        </div>
                                        <div class="form-input-box">
                                            <input type="password" name="con_password" class="input"
                                                placeholder="Confirm Password">
                                            <span> <?php echo $passworderror; ?> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-file-box w-100">
                                    <input type="file" class="w-100 bg-light p-2 border-0" name="profile" class="input">
                                </div>
                            </div>
                            <button type="submit" name="signup">Sign up</button>
                        </form>
                        <div class="form-section">
                            <p>Have an account? <a href="index.php">Log in</a> </p>
                        </div>
                    </div>

                    <!-- signup form by ui-verse end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>