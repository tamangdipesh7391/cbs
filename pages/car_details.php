<?php 

$carDetails = $obj->select('tbl_cars','*','id',array($_GET['car_id']));
$carDetails = $carDetails[0];
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">


            <h1><i class="icofont-car"></i> Car Details</h1>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row">

                <?php if(isset($carDetails['car_image']) && $carDetails['car_image'] != ''){ ?>
                <div class="col-lg-6">
                    <img src="admin-pannel/backend-assets/cars/<?=$carDetails['car_image'];?>" class="img-fluid" alt="">

                </div>
                <?php  } ?>
                <div class="col-md-1"></div>

                <div class="col-lg-5 portfolio-info">
                    <h3 class="alert-info" style="padding:10px">About <?=$carDetails['car_model'];?></h3>
                    <ul>
                        <?php if(isset($carDetails['car_model']) && $carDetails['car_model'] != ''){ ?><li>
                            <strong>Model</strong> :
                            <?=$carDetails['car_model'];?>
                        </li>
                        <?php } ?>
                        <?php if(isset($carDetails['car_no']) && $carDetails['car_no'] != ''){ ?><li><strong>Car
                                No.</strong> :
                            <?=$carDetails['car_no'];?></li>
                        <?php } ?>
                        <?php if(isset($carDetails['car_seat_limit']) && $carDetails['car_seat_limit'] != ''){ ?><li>
                            <strong>Seat Limit</strong> :
                            <?=$carDetails['car_seat_limit'];?> 2020
                        </li> <?php } ?>
                        <?php if(isset($carDetails['car_rate']) &&  $carDetails['car_rate'] != ''){ ?><li>
                            <strong>Rate/hr</strong> :
                            <?=$carDetails['car_rate'];?>
                        </li>
                        <?php } ?>
                        <?php if(isset($carDetails['car_owner']) && $carDetails['car_owner'] != ''){ ?><li>
                            <strong>Owner</strong> :
                            <?=$carDetails['car_owner'];?>
                        </li>
                        <?php } ?>
                        <?php if(isset($carDetails['car_color']) && $carDetails['car_color'] != ''){ ?><li>
                            <strong>Color</strong> :
                            <?=$carDetails['car_color'];?>
                        </li>
                        <?php } ?>
                        <?php if(isset($carDetails['car_contact']) && $carDetails['car_contact'] != ''){ ?><li>
                            <strong>Contact</strong>
                            :<?=$carDetails['car_contact'];?>
                        </li> <?php } ?>
                    </ul>

                    <?php  if(isset($carDetails['message']) && $carDetails['message'] != ''){ ?>
                    <p><strong>Message from owner : </strong> <?=$carDetails['message'];?></p>
                    <?php } ?>
                    <a href="car_book.php?car_id=<?=$_GET['car_id'];?>" class="btn btn-outline-primary">Book
                        Now</a>
                </div>

            </div>

        </div>
    </section>
    <!-- End Portfolio Details Section -->

</main><!-- End #main -->