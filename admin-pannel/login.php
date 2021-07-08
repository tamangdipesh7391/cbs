<?php  
ob_start();
session_start();
 require_once ("config/config.php");
require_once ("config/db.php");

if(isset($_POST['submit']))
{
    if($_POST['submit'] == 'login')
    {
        if(isset($_COOKIE)){
            $user = $_POST['username'];
            $result = $obj->Query("SELECT * FROM tbl_users WHERE username='$user'");
            if($result)
            {
                $result = $result[0];
                $cookie_username = $_POST['username'];
                $cookie_password = $_POST['password'];
                $current_username = $result->username;
                $current_password = $result->password;
                if($cookie_username == $current_username && $cookie_password == $current_password)
                {
                     echo "<script>window.location.href='".base_url()."'</script>";
                    
                }else{  
                         $old = $_POST;
                         $username=$_POST['username'];
                            $password=sha1($_POST['password']);
                            $user_select=$obj->Query("SELECT * FROM tbl_users WHERE username='$username' and password='$password'");
                            
                        if($user_select){

                            $user_select= $user_select[0];

                            //   cookie data 
                            if (isset($_POST['remember'])) {
                                setcookie('admin_username',$user_select->username,time()+86400);
                                setcookie('admin_password',$user_select->password,time()+86400);
                                setcookie('admin_remember','true',time()+86400);

                            }else{
                                setcookie('admin_username','');
                                setcookie('admin_password','');
                                setcookie('admin_remember','');
                            }

                        
                            $_SESSION['is_auth_admin'] = "true";
                            $_SESSION['fullname']=$user_select->name;
                            $_SESSION['admin_id'] = $user_select->id;
                            $_SESSION['profile']= $user_select->profile;
                            print_r($_COOKIE); 

                       
                        echo "<script>window.location.href='".base_url()."'</script>";
                        }
                        else {
                            $_SESSION['error'] = "Invalid username or password !";
                        }
                    
                }
            }else{
                $_SESSION['error'] = "Invalid username or password !";
            }

       
        }else{
                            $old = $_POST;
                        $username=$_POST['username'];
                        $password=sha1($_POST['password']);
                        $user_select=$obj->Query("SELECT * FROM tbl_users WHERE username='$username' and password='$password'");
                        
                    if($user_select){

                        
                        $user_select= $user_select[0];

                        //   cookie data 
                        if (isset($_POST['remember'])) {
                            setcookie('admin_username',$user_select->username,time()+86400);
                            setcookie('admin_password',$user_select->password,time()+86400);
                            setcookie('admin_remember','true',time()+86400);

                        }else{
                            setcookie('admin_username','');
                            setcookie('admin_password','');
                            setcookie('admin_remember','');
                        }

                    
                        $_SESSION['is_auth_admin'] = "true";
                        $_SESSION['fullname']=$user_select->name;
                        $_SESSION['admin_id'] = $user_select->id;
                        $_SESSION['profile']="profile";
                        print_r($_COOKIE); 

                   
                    echo "<script>window.location.href='".base_url()."'</script>";
                    }
                    else {
                        $_SESSION['error'] = "Invalid username or password !";
                    }
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
            <h1><a class="goto-link" href="<?=exit_url();?>"> Online Taxi Booking </a></h1>
        </div>
        <form class="login-form" action="" method="post" onsubmit="return validate_login()">
            <div class="login-wrap">
                <b class="text-center">Login Page</b>
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
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    <input type="text" id="username" value="<?php if(isset($old)){echo $old['username'];} ?>"
                        name="username" class="form-control" placeholder="Username" autofocus
                        value="<?php if(isset($_COOKIE['admin_username'])){echo $_COOKIE['admin_username'];} ?>">
                    <a id="usernameError" style="color:red;margin-left:6px"></a>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                        value="<?php if(isset($_COOKIE['admin_password'])){echo $_COOKIE['admin_password'];} ?>">
                    <a id="passwordError" style="color:red;margin-left:6px"></a>

                </div>
                <label class="checkbox">
                    <input type="checkbox" name="remember" <?php if(isset($_COOKIE['admin_remember'])){ ?>checked
                        <?php }?>> <span class="remember">Remember me</span>
                    <span class="pull-right"> <a href="forget_password.php"> Forgot Password?</a></span>
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
    <script src="<?=base_url('backend-assets/js/jquery.js')?>"></script>

    <script>
    function validate_login() {


        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        var usernameError = document.getElementById("usernameError");
        var passwordError = document.getElementById("passwordError");

        if (username == '') {

            usernameError.innerHTML = "Username is required";
            return false;
        } else {
            usernameError.innerHTML = '';
        }
        if (password == '') {

            passwordError.innerHTML = "Password is required";
            return false;
        } else {
            passwordError.innerHTML = '';
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