<?php
$dbhost="localhost";
$dbuser="root";
$db="olms";
$dbcon = mysqli_connect($dbhost,$dbuser,'',$db) or die(mysqli_error($dbcon));