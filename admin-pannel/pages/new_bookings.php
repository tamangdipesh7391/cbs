<?php
if(isset($_GET['action'])){
    if($_GET['action'] == 'confirm_new_booking'){
        $dataonly['status'] = 1;
        $dataonly['confirm'] = 1;
       
        $obj->update('tbl_bookings',$dataonly,'id',array($_GET['bid']));
        echo "<script>window.location.href='".base_url('new_bookings.php')."'</script>";
        
    }elseif($_GET['action'] == 'delete'){
        $obj->delete('tbl_bookings','id',array($_GET['id']));
        echo "<script>window.location.href='".base_url('new_bookings.php')."'</script>";
    }

    
}
$all_bookings_data = $obj->Select('tbl_bookings','*','status',array(0),' AND confirm=0');
?>

<div class="row">
    <div class="col-lg-12">

        <h1>
            <i class="fa fa-plus"></i> New bookings
        </h1>
        <hr>
        <?php if($all_bookings_data){ ?>
        <table class="table table-responsive table-bordered table-hover">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Destination</th>
                    <th>Taxi</th>
                    <th>Confirm Status</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>
                <?php foreach($all_bookings_data as $key=>$data) :?>
                <tr <?php if(isset($_GET['action']) &&$_GET['action'] == 'hilight' && $_GET['id'] == $data['id']) { ?>
                    class="hilight_row" <?php } ?>>
                    <td><?=++$key;?></td>
                    <td><?=$data['fullname'];?></td>
                    <td><?=$data['address'];?></td>
                    <td><?=$data['contact'];?></td>
                    <td>

                        <?php  
                        $from = $obj->select('tbl_destination','*','id',array($data['from_destination']));
                        $to = $obj->select('tbl_destination','*','id',array($data['from_destination']));
                        echo $from[0]['title'].'-'.$to[0]['title'];
?>

                    </td>
                    <td><?php
                        $carName = $obj->select('tbl_cars','*','id',array( $data['car_id'])); ?>
                        <a href="<?=base_url('show_taxi.php?action=hilight&id='.$data['car_id']);?>">
                            <?= $carName[0]['car_model']; ?></a>
                    </td>
                    <td><a href="<?=base_url('new_bookings.php?action=confirm_new_booking&bid='.$data['id']);?>"
                            class="btn btn-primary"
                            onclick="return confirm('Are you sure you want to verify this?')">Confirm Booking</a></td>
                    <td>
                        <div class="btn-group">

                            <a onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger"
                                href="<?=base_url('all_bookings.php?action=delete&id='.$data['id']);?>"><i
                                    class="fa fa-trash-o"></i></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php } else{ ?>
        <p style="color:red"><b>No data available.</b></p>
        <?php   }?>

    </div>
</div>