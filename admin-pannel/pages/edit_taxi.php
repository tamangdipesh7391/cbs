<?php 
if(isset($_GET['action']) && $_GET['action'] == 'edit'){
$singleCarData = $obj->Select('tbl_cars','*','id',array($_GET['id']));
$singleCarData = $singleCarData[0];
}

if(isset($_POST['submit']) && $_POST['submit'] == 'update'){
    unset($_POST['submit']);
    if($_FILES['image']['name'] != ''){
        $oldImg = $singleCarData['car_image'];
        $unlinkPath = 'backend-assets/cars/'.$oldImg;
        unlink($unlinkPath);

        $filename = $_FILES['image']['name'];
        $ext = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
        $imgName = md5(microtime()).'.'.$ext;
        $_POST['car_image'] = $imgName;
        $imgPath = 'backend-assets/cars/'.$imgName;
        $tmpName = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmpName,$imgPath);

        if($obj->update('tbl_cars',$_POST,'id',array($_GET['id']))){
            $_SESSION['success'] = "Data updated successfully!";
            echo "<script>window.location.href='".base_url('show_taxi.php')."'</script>";
            
        }else{
            $_SESSION['error'] = "Failed to update data. Please try again!";
        }

    }else{
        if($obj->update('tbl_cars',$_POST,'id',array($_GET['id']))){
            $_SESSION['success'] = "Data updated successfully!";
            echo "<script>window.location.href='".base_url('show_taxi.php')."'</script>";
            
        }else{
            $_SESSION['error'] = "Failed to update data. Please try again!";
        }
    }
}
?>

<h1><i class="fa fa-edit"></i> Edit taxi details</h1>
<hr>
<div class="col-md-12">
    <div class="col-md-8">
        <div class="panel-body">
            <div class="form">
                <form class="form-validate form-horizontal " id="register_form" method="post" action=""
                    enctype="multipart/form-data">

                    <div class="form-group ">
                        <label for="fullname">Car's Model <span class="required">*</span></label>

                        <input class=" form-control" id="fullname" name="car_model" type="text"
                            value="<?=$singleCarData['car_model'];?>" />

                    </div>
                    <div class="form-group ">
                        <label for="address">Seat Limit <span class="required">*</span></label>

                        <input class=" form-control" id="seat_limit" name="car_seat_limit" type="number"
                            value="<?=$singleCarData['car_seat_limit'];?>" />

                    </div>
                    <div class="form-group ">
                        <label for="username">Car No. <span class="required">*</span></label>

                        <input class="form-control " id="car_no" name="car_no" type="text"
                            value="<?=$singleCarData['car_no'];?>" />

                    </div>


                    <div class="form-group ">
                        <label for="username">Car Owner <span class="required">*</span></label>

                        <input class="form-control " id="car_owner" name="car_owner" type="text"
                            value="<?=$singleCarData['car_owner'];?>" />

                    </div>
                    <div class="form-group ">
                        <label for="username">Owner's Phone </label>

                        <input class="form-control " id="car_contact" name="car_contact" type="text"
                            value="<?=$singleCarData['car_contact'];?>" />

                    </div>
                    <div class="form-group ">
                        <label for="username">Car Color <span class="required">*</span></label>

                        <input class="form-control " id="car_color" name="car_color" type="text"
                            value="<?=$singleCarData['car_color'];?>" />

                    </div>
                    <div class="form-group ">
                        <label for="username">Rate/hr ($) </label>

                        <input class="form-control " id="car_rate" name="car_rate" type="number"
                            value="<?=$singleCarData['car_rate'];?>" />

                    </div>
                    <div class="form-group ">
                        <label for="username">Car's Image <span class="required">*</span></label>

                        <input class="form-control " name="image" type="file" />

                    </div>
                    <div class="form-group ">
                        <label for="username">Message <span class="required">*</span></label>

                        <textarea class="form-control " id="message" rows="6" name="message" type="text"
                            <?=$singleCarData['message'];?>></textarea>

                    </div>

                    <div class="form-group">

                        <button class="btn btn-primary" type="submit" name="submit" value="update">Update</button>

                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <a href="backend-assets/cars/<?=$singleCarData['car_image'];?>">
            <img style="margin-top:30px" src="backend-assets/cars/<?=$singleCarData['car_image'];?>"
                class="img-responsive img-thumbnail" alt="<?=$singleCarData['car_model'];?>">
        </a>
    </div>
</div>