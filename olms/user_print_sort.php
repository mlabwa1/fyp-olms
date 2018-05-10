<?php include ('include/dbcon.php');

?>
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
            <?php include("print_header.php"); ?>
				
<button type="submit" id="print" onclick="printPage()">Print</button>
			<p style = "margin-left:30px; margin-top:50px; font-size:14pt; font-weight:bold;">Attendance Information&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <div align="right">
		<b style="color:blue;">Date Prepared:</b>
		<?php include('currentdate.php'); ?>
        </div>			
		<br/>
						<table class="table table-striped">
						  <thead>
								<tr>
    <?php include('session.php'); ?>
									<th style="width:160px;">Registration No.</th>
									<th style="width:160px;">Member Name</th>
									<th style="width:160px;">Date Log In</th>
								</tr>
						  </thead>   
						  <tbody>
<?php 
include ('include/dbcon.php');
							$result= mysqli_query($dbcon,"select * from user_log 
							LEFT JOIN user ON user_log.user_id = user.user_id 
							where user_log.date_log BETWEEN '".$_SESSION['datefrom']." 00:00:01' and '".$_SESSION['dateto']." 23:59:59' 
							order by user_log.user_log_id DESC ") or die (mysqli_error($dbcon));
							
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['user_log_id'];
							$user_id=$row['user_id'];
							
?>
							<tr>
								<td style="text-align:center;"><?php echo $row['school_number']; ?></td>
								<td style="text-align:center;"><?php echo $row['user_name']; ?></td>
								<td style="text-align:center;"><?php echo date("M d, Y h:i:s a", strtotime($row['date_log'])); ?></td> 
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							
							<?php 
							}			
							?>
							</tr>  
						  </tbody> 
					  </table> 

<br />
<br />
							<?php
								include('include/dbcon.php');
								$user_query=mysqli_query($dbcon,"select * from admin where admin_id='$id_session'")or die(mysqli_error($dbcon));
								$row=mysqli_fetch_array($user_query); {
							?>        <h2><i class="glyphicon glyphicon-user"></i> <?php echo '<span style="color:blue; font-size:15px;">Prepared by:'."<br /><br /> ".$row['firstname']." ".$row['lastname']." ".'</span>';?></h2>
								<?php } ?>


			</div>
	
	
	
	

	</div>
</body>


</html>