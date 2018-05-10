<?php include ('include/dbcon.php'); ?>
<?php
include('include/dbcon.php');
include('session.php');
$user_query=mysqli_query($dbcon,"select * from admin where admin_id='$id_session'")or die(mysqli_error($dbcon));
$row=mysqli_fetch_array($user_query); {
    ?>
							<?php $code = $_GET['code'];
							$result1= mysqli_query($dbcon,"select * from user where school_number = '$code' ") or die (mysqli_error($dbcon));
							$row1=(mysqli_fetch_array($result1));
							$code1=$row1['school_number'];
							$code2=$row1['firstname']." ".$row1['middlename']." ".$row1['lastname'];
							$code3=$row1['level'];
							?><h2><i class="glyphicon glyphicon-user"></i> <?php echo '<span style="color:blue; font-size:15px;">Prepared by:'."<br /><br /> ".$row['firstname']." ".$row['lastname']." ".'</span>';?></h2>
								<?php //} ?>

<html>

<head>
		<title>Online Library Management System</title>
		
		<style>
		
		
.container {
	width:100%;
	margin:auto;
}
		
.table {
    width: 100%;
    margin-bottom: 20px;
}	

.table-striped tbody > tr:nth-child(odd) > td,
.table-striped tbody > tr:nth-child(odd) > th {
    background-color: #f9f9f9;
}

@media print{
#print {
display:none;
}
}

#print {
	width: 90px;
    height: 30px;
    font-size: 18px;
    background: white;
    border-radius: 4px;
	margin-left:28px;
	cursor:hand;
}
		
		</style>
<script>
function printPage() {
    window.print();
}
</script>
		
</head>


<body>
	<div class = "container">
		<div id = "header">
		<br/>
								<img src = "images/dmi.png" style = " margin-top:-17px; float:left; margin-left:115px; margin-bottom:-6px; width:100px; height:100px;">
				<img src = "images/dmi.png" style = " margin-top:-17px; float:right; margin-right:115px; width:100px; height:100px;" >
				<center><h5 style = "font-style:Calibri"></h5>&nbsp; &nbsp;&nbsp; St. Joseph University Tanzania &nbsp;	&nbsp; </center>
				<center><h5 style = "font-style:Calibri; margin-top:-14px;"></h5> &nbsp; &nbsp; Online Library Management System</center>
				<center><h5 style = "font-style:Calibri; margin-top:-14px;"></h5> St. Joseph College of engineering and technology </center>
			
<button type="submit" id="print" onclick="printPage()">Print</button>	
			<p style = "margin-left:3px; margin-top:50px; font-size:14pt; font-weight:bold;">Member Barcode Individual&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <div align="right">
		<b style="color:blue;">Date Prepared:</b>
		<?php include('currentdate.php'); ?>
        </div>			
		<br/>
		<br/>
		<div>
			<?php echo "<img src = 'BCG/html/image.php?filetype=PNG&dpi=72&scale=1&rotation=0&font_family=Arial.ttf&font_size=10&text=".$code1."&thickness=50&start=NULL&code=BCGcode128' />";?>
			<h3><?php echo $code2; ?></h3>
			<h3><?php echo $code3; ?></h3>
		</div>
<br />
<br />



			</div>
	
	
	
	

	</div>
</body>


</html>
<?php } ?>