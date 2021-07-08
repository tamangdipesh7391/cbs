<?php 

if(isset($_SESSION['admin_id'])){
    $admin_id = $_SESSION['admin_id'];
    $adminData = $obj->select('tbl_users','*','id',array($admin_id));
    $adminData = $adminData[0];
}
else{
    $admin_id = 2;
    $adminData = $obj->select('tbl_users','*','id',array($admin_id));
    $adminData = $adminData[0];
}

if(isset($_POST['submit']) && $_POST['submit'] == 'update'){
    unset($_POST['submit']);
    if($_FILES['image']['name'] != ''){
        if($adminData['profile'] != ''){
            $oldImg = $adminData['profile'];
            $unlinkPath = 'backend-assets/profile/'.$oldImg;
            unlink($unlinkPath);
        }
       

        $filename = $_FILES['image']['name'];
        $ext = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
        $imgName = md5(microtime()).'.'.$ext;
        $_POST['profile'] = $imgName;
        $imgPath = 'backend-assets/profile/'.$imgName;
        $tmpName = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmpName,$imgPath);

        if($obj->update('tbl_users',$_POST,'id',array($admin_id))){
            $_SESSION['success'] = "Data updated successfully!";
            echo "<script>window.location.href='".base_url()."'</script>";
            
        }else{
            $_SESSION['error'] = "Failed to update data. Please try again!";
        }

    }else{
        if($obj->update('tbl_users',$_POST,'id',array($admin_id))){
            $_SESSION['success'] = "Data updated successfully!";
            echo "<script>window.location.href='".base_url()."'</script>";
            
        }else{
            $_SESSION['error'] = "Failed to update data. Please try again!";
        }
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><i class="fa fa-user-circle"></i> Edit Your Profile</h1>
            <hr>
            <div class="col-md-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="Name">Name *</label>
                        <input type="text" name="name" class="form-control" required value="<?=$adminData['name'];?>">
                    </div>
                    <div class="form-group">
                        <label for="Name">Username *</label>
                        <input type="email" name="username" class="form-control" required
                            value="<?=$adminData['username'];?>">
                    </div>
                    <div class="form-group">
                        <label for="Name">Profile</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" value="update" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <?php if(isset($adminData['profile']) && $adminData['profile'] !=''){ ?>
                <img src="backend-assets/profile/<?=$adminData['profile'];?>"
                    class="img-responsive img-thumbnail img-grow img-rounded" alt="">
                <?php   }else{ ?>
                <h1> <i class="fa fa-user-circle fa-5x"></i></h1>

                <?php } ?>
            </div>
        </div>
    </div>
</div>