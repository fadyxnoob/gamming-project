<?php
include('admin/include/database.php');
$myObj = new Database();
// Function Creating
$uname = $namemsg = $email = $password = $nameerror = $unameerror =  $emailerror =  $passworderror = $fillmsg = $imgerror = $conf_passworderror  = $unamemsg = '';
function valid_data($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return ($data);
}

//isset button started
if (isset($_POST['signup'])) {

    $name          = $myObj->escapeString($_POST['name']);
    $uname         = $myObj->escapeString($_POST['uname']);
    $email         = $myObj->escapeString($_POST['email']);
    $password      = $myObj->escapeString($_POST['password']);
    $con_password  = $myObj->escapeString($_POST['con_password']);
    $profile       = $_FILES['profile']['name'];
    $status        = $myObj->escapeString('block');
    $facebook      = 'https://www.facebook.com';
    $instagram     = 'https://www.instagram.com';
    $youtube       = 'https://www.youtube.com';
    $twitter       = 'https://www.twitter.com';

    //validations started
    if ($name != '' && $uname != '' && $email != '' &&  $password != '' &&  $con_password != '' &&  $profile != '') {

        // name validations
        $name = valid_data($_POST['name']);

        if (!preg_match("/^[a-zA-Z']+(?: [a-zA-Z']+)*$/", $name)) {
            $nameerror = "<p class='text-light p-0 m-0'>Type only letters and spaces</p>";
        } else {
            $namemsg = "success";
        }

        //Username validations
        $uname = valid_data($_POST['uname']);
        if (!preg_match("/^[a-z0-9]+/", $uname)) {
            $unameerror = "<p class='text-light p-0 m-0'>Type Small Letters and Numbers</p>";
        } else {
            // $myObj->select('manage_players', '*', "uname = '$uname' ", null, null);
            // $Un_data = $myObj->getResult();
            $Un_count = $myObj->getRows('manage_players', "uname = '$uname' ");
            if ($Un_count > 0) {
                $unameerror = "<p class='text-light p-0 m-0'>This username is already taken!</p>";
            } else {
                $unamemsg = "success";
            }
        }

        //Email Validations
        $email = valid_data($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerror = "Type Valid Email";
        } else {
            // $myObj->select('manage_players', '*', "mail = '$email' ", null, null);
            // $Un_data = $myObj->getResult();
            $count = $myObj->getRows('manage_players', "mail = '$email' ");
            if ($count > 0) {
                $emailerror = "<p class='text-light p-0 m-0'>This Email Already Exist</p>";
            }
            //email validations end
        }

        //password validations
        $password = valid_data($_POST['password']);
        if ($password !== $con_password) {
            $conf_passworderror = "<p class='text-light p-0 m-0'>Your Password does not Match</p>";
        } else {
            $uppercase     = preg_match('@[A-Z]@', $password);
            $lowercase     = preg_match('@[a-z]@', $password);
            $numbers       = preg_match('@[0-9]@', $password);
            $specialChars  = preg_match('@[^\w]@', $password);
            if (!$uppercase || !$lowercase || !$numbers || !$specialChars || strlen($password) < 8) {
                $passworderror = '<p class="text="text-light p-0 m-0">Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</p>';
            } else {
                $key  = "12wasedvjih90";
                $password = $password . $key;
                $password = md5($password);
                $passmsg = "success";
            }
        }
        //password validations ends\

        // img validations
        $allowed_img_extension = array("png", "PNG", "jpg", "jpeg");
        $file_extension = pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION);

        if (!in_array($file_extension, $allowed_img_extension)) {
            $imgerror = "Select Valid Image (choose only jpeg, jpg, and png)";
        } else {
            if ($_FILES['profile']['size'] > 500000) {
                $imgerror = "Image size exceeds! Please upload an image less than 500kb";
            } else {
                $target = "admin/assets/upload/" . basename($_FILES['profile']['name']);

                if (file_exists($target)) {
                    $imgerror = $_FILES['profile']['name'] . "<p class='text-light'>file already exists</p>";
                } else {
                    if (move_uploaded_file($_FILES['profile']['tmp_name'], $target)) {
                    } else {
                        $imgerror = "Error uploading the file. Please try again.";
                    }
                }
            }
        }

        //data printing
        if ($namemsg == "success" && $unamemsg == "success" && $passmsg == "success") {

            $params = [
                'name'      => $name,
                'uname'     => $uname,
                'mail'      => $email,
                'pass'      => $password,
                'con_pass'  => $con_password,
                'profile'   => $profile,
                'status'    => $status,
                'facebook'  => $facebook,
                'instagram' => $instagram,
                'youtube'   => $youtube,
                'twitter'   => $twitter,
            ];

            $myObj->insert('manage_players', $params);
            $data = $myObj->getResult();
            if ($data) {
                $fillmsg = "<p class='text-success '>SignUp Successfully
                        <span class='text-danger'>Please Remember Your Password</span>
                    </p>";
                header('Location:login.php');
            } else {
                $fillmsg = "<p class='text-danger '>Signup Failed</p>";
            }
        } else {
            $fillmsg = '<div class="alert alert-light text-dark p-1">
                    An Error Accured
                </div>';
        }

        //validations else

    } else {
        if (empty($_POST['name'])) {
            $nameerror = "<p class='text-light p-0 m-0'>Name is required</p>";
        }
        if (empty($_POST['uname'])) {
            $unameerror = "<p class='text-light p-0 m-0'>User Name is required</p>";
        }
        if (empty($_POST['email'])) {
            $emailerror = "<p class='text-light p-0 m-0'>Email is required</p>";
        }
        if (empty($_POST['password'])) {
            $passworderror = "<p class='text-light p-0 m-0'>Password is required</p>";
        }
        $fillmsg = '<div class="alert alert-light text-dark p-1">
        Please fill all the data
        </div>';
    }
    //validations ended  
    // issset button end
}
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="user/assets/css/style.css">
</head>

<div class="container-fluid signup-bg">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-6 mx-auto p-5 SignUp-Col">
                <h2 class="text-center text-light">Sign Up</h2>
                <?php echo $fillmsg; ?>
                <form action="" method="post" enctype="multipart/form-data" class="SignUp_Form">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="exampleInputEmail1" class="form-label text-light">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter Name">
                            <?php echo $nameerror; ?>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="exampleInputEmail1" class="form-label text-light">Username</label>
                            <input type="text" name="uname" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter Username">
                            <?php echo $unameerror; ?>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="exampleInputEmail1" class="form-label text-light">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter Email">
                            <?php echo $emailerror; ?>
                        </div>
                        <div class="col-6">
                            <label for="exampleInputEmail1" class="form-label text-light">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter Password">
                            <?php echo $passworderror; ?>
                        </div>
                        <div class="col-6 ">
                            <label for="exampleInputEmail1" class="form-label text-light">Confirm Password</label>
                            <input type="password" name="con_password" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Confirm Password">
                            <?php echo $conf_passworderror; ?>
                        </div>
                        <div class="col-12 mt-2 User_Profile">
                            <input type="file" name="profile" class="text-light" id="Upload_File">
                            <label for="Upload_File" class="Upload_File">Upoad Image</label>
                            <button type="submit" name="signup" class="btn SignUp-Btn">Signup</button>
                        </div>
                        <?php echo $imgerror; ?>
                    </div>
                </form>
                <div class="sign_in_link d-flex mt-3">
                    <p class="text-light fs-5">Already Have an Account</p>
                    <a href="login.php" class="ms-2 fs-5 text-decoration-none">Login</a>
                </div>
            </div>
        </div>
    </div>