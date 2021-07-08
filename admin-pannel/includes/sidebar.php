<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <div class="profile">


        </div>
        <ul class="sidebar-menu">

            <li class="active">
                <a class="" href="<?=base_url()?>">
                    <i class="icon_house_alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="fa fa-car"></i>
                    <span>Taxi</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li> <a class="" href="<?=base_url('add_taxi.php')?>">
                            <i class="fa fa-plus-circle"></i> Add Taxi</a></li>
                    <li><a class="" href="<?=base_url('show_taxi.php')?>"><i class="fa fa-eye"></i> Show Taxi</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a class="" href="<?=base_url('destination')?>">
                    <i class="fa fa-home"></i>
                    <span>Destination</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="fa fa-book"></i>
                    <span>Bookings</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li> <a class="" href="<?=base_url('all_bookings.php')?>">
                            <i class="fa fa-eye"></i> All Bookings</a></li>
                    <li><a class="" href="<?=base_url('new_bookings.php')?>"><i class="fa fa-pencil"></i> New Bookins</a>
                    </li>
                    <li> <a class="" href="<?=base_url('confirmed_bookings.php')?>">
                            <i class="fa fa-check"></i> Confirm Bookings</a></li>
            </li>
        </ul>
        </li>



        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">