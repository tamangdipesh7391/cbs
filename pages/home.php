<?php 
$taxi = $obj->select('tbl_cars');

?>

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active" style="background:url('assets/img/slide/slider-1.jpg')">
                    <div class="carousel-container">

                        <div class="carousel-content">

                            <h2 class="animate__animated animate__fadeInDown">Brand New Taxis <span> are available
                                    now</span></h2>
                            <p class="animate__animated animate__fadeInUp">We provide you the best services among other
                                taxi servies. We care about your satisfaction not about the cost and other things.</p>
                            <a href="<?=base_url('about.php');?>"
                                class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item" style="background:url('assets/img/slide/slider-2.jpg')">
                    <div class="carousel-container">

                        <div class="carousel-content">

                            <h2 class="animate__animated animate__fadeInDown">Brand New Taxis <span> are available
                                    now</span></h2>
                            <p class="animate__animated animate__fadeInUp">We provide you the best services among other
                                taxi servies. We care about your satisfaction not about the cost and other things.</p>
                            <a href="<?=base_url('about.php');?>"
                                class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item" style="background:url('assets/img/slide/car2.jpg')">
                    <div class="carousel-container">

                        <div class="carousel-content">

                            <h2 class="animate__animated animate__fadeInDown">Brand New Taxis <span> are available
                                    now</span></h2>
                            <p class="animate__animated animate__fadeInUp">We provide you the best services among other
                                taxi servies. We care about your satisfaction not about the cost and other things.</p>
                            <a href="<?=base_url('about.php');?>"
                                class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
                        </div>
                    </div>
                </div>

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
</section><!-- End Hero -->

<main id="main">



    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <h1>Available Taxis</h1>

                    <!-- <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-card">Card</li>
                        <li data-filter=".filter-web">Web</li>
                    </ul> -->
                </div>
            </div>
            <hr>

            <div class="row portfolio-container">
                <?php 
                foreach($taxi as $key=>$data) : ?>


                <div class="col-lg-3 col-md-4 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="admin-pannel/backend-assets/cars/<?=$data['car_image'];?>" height="350px"
                            class=" img-responsive" alt="">
                        <div class="portfolio-info">
                            <h4><?=$data['car_model'];?></h4>
                            <p><?=$data['car_seat_limit'];?> Seater</p>
                            <hr>
                            <div class="portfolio-links">
                                <a href="car_details.php?car_id=<?=$data['id'];?>" class="btn btn-outline-info">View
                                    Details</a>
                                <a href="car_book.php?car_id=<?=$data['id'];?>" class="btn btn-outline-success">Book
                                    Now</a>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ;?>




            </div>

        </div>
    </section><!-- End Portfolio Section -->



</main><!-- End #main -->