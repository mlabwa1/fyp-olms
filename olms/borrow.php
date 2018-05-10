<?php include ('include/dbcon.php');
if (isset($_POST['submit'])) {
    $school_number = $_POST['school_number'];
    $pin= hash('sha256', $_POST['pin']);
    $sql = mysqli_query($dbcon,"SELECT * FROM user WHERE school_number = '$school_number' AND pin='$pin'") or die(mysqli_error($dbcon));
    $count = mysqli_num_rows($sql);
    $row = mysqli_fetch_array($sql);

    if($count <= 0){
        ?>
        <div class="alert alert-danger"><h3 class="blink_text"></h3>No PIN match for the Registration Number</div>

        <?php
    }else{
        $school_number = $_POST['school_number'];
        header('location: borrow_book.php?school_number='.$school_number);
    }
}
?>

<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Borrow
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <!-- If needed 
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a></li>
                                    <li><a href="#">Settings 2</a></li>
                                </ul>
                            </li>
						-->
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

<div class="container-fluid">
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
	
						<form method="post" action="">
                                        <select name="school_number" class="select2_single form-control" required="required" tabindex="-1" >
										<option value="0">Select Registration Number</option>
										<?php
										$result= mysqli_query($dbcon,"select * from user where status = 'Active' ") or die (mysqli_error($dbcon));
										while ($row= mysqli_fetch_array ($result) ){
										$id=$row['user_id'];
										?>
                                            <option value="<?php echo $row['school_number']; ?>"><?php echo $row['school_number']; ?> - <?php echo $row['firstname']." ".$row['lastname']; ?></option>
										<?php } ?>
                                        </select>
                                        <input type="password" class="form-control" name="pin" placeholder="Enter PIN" autofocus='autofocus' no-special-char ng-model="usernames" required />

				<br />
				<br />
						<button name="submit" type="submit" class="btn btn-primary" style="margin-left:110px;"><i class="glyphicon glyphicon-log-in"></i> Submit</button>
						</form>


	</div>
	<div class="col-md-4"></div>
</div>
</div>			
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>