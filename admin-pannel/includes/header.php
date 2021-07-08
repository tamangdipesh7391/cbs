<?php 
$unread_bookings = $obj->select('tbl_bookings','COUNT(id) as unread','status',array(0),' AND confirm = 0');
$new_bookings = $obj->select('tbl_bookings','*','status',array(0),' AND confirm = 0 LIMIT 4');

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

    <title>Laravel Webbased Project</title>

    <!-- Bootstrap CSS -->
    <link href="<?=base_url('backend-assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?=base_url('backend-assets/css/bootstrap-theme.css')?>" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?=base_url('backend-assets/css/elegant-icons-style.css')?>" rel="stylesheet" />
    <link href="<?=base_url('backend-assets/css/font-awesome.min.css')?>" rel="stylesheet" />
    <!-- full calendar css-->
    <link href="<?=base_url('backend-assets/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css')?>"
        rel="stylesheet" />
    <link href="<?=base_url('backend-assets/assets/fullcalendar/fullcalendar/fullcalendar.css')?>" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="<?=base_url('backend-assets/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')?>" rel="stylesheet"
        type="text/css" media="screen" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="<?=base_url('backend-assets/css/owl.carousel.css')?>" type="text/css">
    <link href="<?=base_url('backend-assets/css/jquery-jvectormap-1.2.2.css')?>" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="<?=base_url('backend-assets/css/fullcalendar.css')?>">
    <link href="<?=base_url('backend-assets/css/widgets.css')?>" rel="stylesheet">
    <link href="<?=base_url('backend-assets/css/style.css')?>" rel="stylesheet">
    <link href="<?=base_url('backend-assets/css/style-responsive.css')?>" rel="stylesheet" />
    <link href="<?=base_url('backend-assets/css/xcharts.min.css')?>" rel=" stylesheet">
    <link href="<?=base_url('backend-assets/css/jquery-ui-1.10.4.min.css')?>" rel="stylesheet">

</head>

<body>
    <!-- container section stsart -->
    <section id="container" class="">



        <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="" data-placement="bottom"><i
                        class="icon_menu fa-2x"></i></div>
            </div>

            <!--logo start-->
            <a href="<?=base_url();?>" class="logo">Admin <span class="lite">Pannel</span></a>
            <!--logo end-->



            <div class="top-nav notification-row">
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">

                    <!-- alert notification start-->
                    <li id="alert_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="fa fa-bell-o"></i>
                            <span
                                class="badge bg-important"><?php if($unread_bookings) echo $unread_bookings[0]['unread'];?></span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">You have
                                    <?php if($unread_bookings) echo $unread_bookings[0]['unread'];?> new
                                    notifications</p>
                            </li>
                            <?php 
                                foreach($new_bookings as $data) : ?>
                            <li>
                                <a href="<?=base_url('new_bookings.php?action=hilight&id='.$data['id']);?>">
                                    <span><i class="fa fa-user-circle"></i></span>
                                    <?=$data['fullname'];?>
                                    <!-- <span class="small italic pull-right">5 mins</span> -->
                                </a>

                            </li>
                            <?php endforeach ; ?>

                            <li>


                                <a href="<?=base_url('new_bookings.php');?>">See all notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <?php
                                if(isset($_SESSION['profile'])){ ?>
                                <img alt="" class=" img-rounded" width="40px" height="40px"
                                    src="backend-assets/profile/<?=$_SESSION['profile'];?>">

                                <?php }else{ ?>
                                <i class="fa fa-user-circle fa-2x "></i>
                                <?php  } ?>


                            </span>
                            <span class="username">

                                <?php
                            if(isset($_SESSION['fullname'])){
                                echo $_SESSION['fullname'];
                            }else{
                                // echo "User";
                            }
                            ?>
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="<?=base_url('edit_profile.php');?>"><i class="icon_profile"></i> My Profile</a>
                            </li>

                            <li>
                                <a href="<?=base_url('logout.php');?>"><i class="icon_key_alt"></i> Log Out</a>
                            </li>

                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
        </header>
        <!--header end-->