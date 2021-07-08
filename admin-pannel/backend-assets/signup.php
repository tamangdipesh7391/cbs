<?php  
 require_once ("config/config.php");
require_once ("config/db.php");

if(isset($_POST['submit']))
{
    if($_POST['submit'] == 'login')
    {
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $user_select=$obj->Query("SELECT * FROM backend WHERE username='$username' and password='$password'");
        
      if($user_select){
        $user_select= $user_select[0];

        //   cookie data 
        if (isset($_POST['remember'])) {
            setcookie('admin_username',$user_select->username,time()+86400);
            setcookie('admin_password',$user_select->plane_password,time()+86400);
            setcookie('admin_remember','true',time()+86400);

        }else{
            setcookie('admin_username','');
            setcookie('admin_password','');
            setcookie('admin_remember','');
        }

       session_start();
        // $_SESSION['users_data']=$user_select;
        $_SESSION['whois']=$user_select->username;
        $_SESSION['whichCollege']=$user_select->college_name;

        $_SESSION['admin-status']="loggedin";
        $_SESSION['admin-login']='true';
       echo "<script>window.location.href='".base_url()."'</script>";

      }else {
        $error['adminError'] = "Email or Password invalid !";
      }

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
            <h1>Online Taxi Booking </h1>
        </div>
        <form class="login-form" action="" method="post ">
            <div class="login-wrap">
                <b class="text-center">Login Page</b>
                <p class="login-img"><i class="icon_lock_alt"></i></p>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="Username" autofocus>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <label class="checkbox">
                    <input type="checkbox" name="remember_me" value="ture"> <span class="remember">Remember me</span>
                    <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
                </label>
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit"
                    value="login">Login</button>
                <hr>
                <div class="signup-section">
                    Don't have an account? <a class="signup-link" href="<?=base_url('signup.php');?>"> Signup here.</a>
                </div>
            </div>
        </form>

    </div>

</body>

</html>