<?php  
ob_start();
session_start();
 require_once ("config/config.php");
require_once ("config/db.php");

if(isset($_POST['submit']))
{
    if($_POST['submit'] == 'signup')
    {
       
     
        
    }

}
     
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Signup Page</title>

    <!-- Bootstrap CSS -->
    <link href="backend-assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="backend-assets/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="backend-assets/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="backend-assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="backend-assets/css/style.css" rel="stylesheet">
    <link href="backend-assets/css/style-responsive.css" rel="stylesheet" />

</head>

<body class="login-img3-body">
    <div class="container">
        <div class="login-title">
            <h1><a class="goto-link" href="<?=exit_url();?>"> Online Taxi Booking </a></h1>

        </div>
        <form class="login-form signup-form" action="" method="post" onsubmit="return validate_form()"
            enctype="multipart/form-data">
            <div class="login-wrap">
                <b class="text-center">Change Password</b>

                <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success">
                    <?php echo $_SESSION['success'];unset($_SESSION['success']);  ?>
                </div>
                <?php }  ?>
                <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['error'];unset($_SESSION['error']);  ?>
                </div>
                <?php }  ?>



                <p class="login-img"><i class="icon_lock_alt"></i></p>


                <label for="Password">Password <span style="color:red;">*</span></label>

                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input type="password" id="password" name="password" class="form-control"
                        placeholder="New Password">
                    <a style="color:red;margin-left:6px;" id="passwordError"></a>

                </div>
                <label for="Confirm Password">Confirm password <span style="color:red;">*</span></label>

                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control"
                        placeholder="Confirm Password">
                    <a style="color:red;margin-left:6px" id="c_passwordError"></a>

                </div>


                <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit"
                    value="signup">Change</button>
                <hr>
                <div class="signup-section">
                    <a class="signup-link" href="<?=base_url('login.php');?>"> <b>Go back login page.</b></a>

                </div>
            </div>
        </form>

    </div>

    <script src="<?=base_url('backend-assets/js/jquery.js')?>"></script>


    <script>
    function validate_form() {

        let password = document.getElementById("password").value;
        let confirm_password = document.getElementById("confirm_password").value;
        let passwordError = document.getElementById("passwordError");
        let c_passwordError = document.getElementById("c_passwordError");

        if (password == '') {
            passwordError.innerHTML = "Password is required!";
            return false;

        } else {
            passwordError.innerHTML = '';
        }
        if (confirm_password == '') {
            c_passwordError.innerHTML = "Confirm Password is required!";
            return false;

        } else {
            c_passwordError.innerHTML = '';
        }
        if (password != confirm_password) {
            c_passwordError.innerHTML = "Confirm Password doesn't matched!";
            return false;

        } else {
            c_passwordError.innerHTML = '';
        }
    }
    $(document).ready(function() {
        setTimeout(function() {
            $('.alert').hide('slow')
        }, 5000);
    });
    </script>

</body>

</html>