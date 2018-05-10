<?php 

include('include/dbcon.php');

$get_id=$_GET['user_id'];

mysqli_query($dbcon,"delete from user where user_id = '$get_id' ")or die(mysqli_error($dbcon));

header('location:user.php');
?>