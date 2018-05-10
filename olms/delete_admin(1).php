<?php 

include('include/dbcon.php');

$get_id=$_GET['admin_id'];

mysqli_query($dbcon,"delete from admin where admin_id = '$get_id' ")or die(mysqli_error($dbcon));

header('location:admin.php');
?>