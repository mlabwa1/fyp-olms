	<?php include ('include/dbcon.php');
	
	mysqli_query ($dbcon,"UPDATE user SET status = 'Active' ")or die(mysqli_error($dbcpn));
	
	echo "<script> window.location='user.php' </script>";
	
	?>			