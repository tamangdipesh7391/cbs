<?php 
if(isset($_POST['submit']) && $_POST['submit'] == 'add')
{
    unset($_POST['submit']);
    if($_FILES['car_image']['name'] != '')
    {
        $fileName = $_FILES['car_image']['name'];
        $imageFileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
        if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg'){
            $_SESSION['error'] = "Only JPG, PNG and JPEG file are supported";
            
        }else{
            $tmp_name = $_FILES['car_image']['tmp_name'];
            $img = md5(microtime()).'.'.$imageFileType;
            $uploadPath = 'backend-assets/cars/'.$img;
            move_uploaded_file($tmp_name,$uploadPath);
           
            $_POST['car_image'] = $img;

            if($obj->insert('tbl_cars',$_POST)){
                $_SESSION['success'] = "Car has been added successfuly!";
                // echo "<script>window.location.href='".base_url('add_taxi.php')."'</script>";
            }else{
                $_SESSION['error'] = "Data couldn't inserted !";
            }
        }
    }else{
        if($obj->insert('tbl_cars',$_POST)){
            $_SESSION['success'] = "Car has been added successfuly!";
            
            // echo "<script>window.location.href='".base_url('add_taxi.php')."'</script>";
        }else{
            $_SESSION['error'] = "Data couldn't inserted !";
        }
    }
    
}

?>


<div class="container-fluid">

    <h1><i class="fa fa-car"></i> &nbsp; Add New Car </h1>
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
    <hr>
    <div class="panel-body">
        <div class="form">
            <form class="form-validate form-horizontal " id="register_form" method="post" action=""
                enctype="multipart/form-data">
                <div class="col-md-5">
                    <div class="form-group ">
                        <label for="fullname">Car's Model <span class="required">*</span></label>

                        <input class=" form-control" id="fullname" name="car_model" type="text" />

                    </div>
                    <div class="form-group ">
                        <label for="address">Seat Limit <span class="required">*</span></label>

                        <input class=" form-control" id="seat_limit" name="car_seat_limit" type="number" />

                    </div>
                    <div class="form-group ">
                        <label for="username">Car No. <span class="required">*</span></label>

                        <input class="form-control " id="car_no" name="car_no" type="text" />

                    </div>
                    <div class="form-group ">
                        <label for="username">Owner's Phone <span class="required">*</span></label>

                        <input class="form-control " id="car_contact" name="car_contact" type="text" />

                    </div>
                    <div class="form-group ">
                        <label for="username">Message to your customer <span class="required">*</span></label>

                        <textarea class="form-control " rows="10" id="message" name="message" type="text"></textarea>

                    </div>
                    <div class="form-group">

                        <button class="btn btn-primary" type="submit" name="submit" value="add">Save</button>
                        <button class="btn btn-danger" type="reset">Reset</button>

                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="form-group ">
                        <label for="username">Car Color</span></label>

                        <input class="form-control " id="car_color" name="car_color" type="text" />

                    </div>
                    <div class="form-group ">
                        <label for="username">Car Owner <span class="required">*</span></label>

                        <input class="form-control " id="car_owner" name="car_owner" type="text" />

                    </div>
                    <div class="form-group ">
                        <label for="username">Rate/hr ($) </label>

                        <input class="form-control " id="car_rate" name="car_rate" type="number" />

                    </div>
                    <div class="form-group ">
                        <label for="username">Car's Image <span class="required">*</span></label>

                        <input class="form-control " id="car_image " name="car_image" type="file" />

                    </div>
                </div>


            </form>
        </div>
    </div>

</div>