<?php
session_start();
session_destroy();
 echo "<script> window.location.href='".base_url('login.php')."'</script>";
 ?>