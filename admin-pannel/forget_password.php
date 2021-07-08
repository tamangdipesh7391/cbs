<?php  
ob_start();
session_start();
 require_once ("config/config.php");
require_once ("config/db.php");

if(isset($_POST['submit']))
{
    if($_POST['submit'] == 'login')
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

    <title>Login Page</title>

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
        <form class="login-form" action="" method="post" onsubmit="return validate_login()">
            <div class="login-wrap">
                <b class="text-center">Forgot Password</b>
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
                <p class="login-img"><i class="fa fa-unlock"></i></p>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="text" id="username" value="<?php if(isset($old)){echo $old['username'];} ?>"
                        name="username" class="form-control" placeholder="Enter your email" autofocus>
                    <a id="usernameError" style="color:red;margin-left:6px"></a>
                </div>

                <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit"
                    value="change">Proceed</button>
                <hr>
                <div class="signup-section">
                    <a class="signup-link" href="<?=base_url('login.php');?>"> <b>Go back login page.</b></a>
                </div>
            </div>
        </form>

    </div>
    <script src="<?=base_url('backend-assets/js/jquery.js')?>"></script>

    <script>
    function validate_login() {


        var username = document.getElementById("username").value;

        var usernameError = document.getElementById("usernameError");

        if (username == '') {

            usernameError.innerHTML = "Username is required";
            return false;
        } else {
            usernameError.innerHTML = '';
        }

    }
    $(document).ready(function() {
        setTimeout(function() {
            $('.alert').hide('slow')
        }, 7000);
    });
    </script>

</body>

</html>