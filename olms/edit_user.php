<?php include ('include/dbcon.php');
$ID=$_GET['user_id'];
 ?>
<?php include ('header.php'); ?>
    <head>
        <script type="text/javascript">
            function showDiv(select){
                if(select.value== "Staff"){
                    document.getElementById('hidden_for_staff').style.display = "none";
                } else{

                    document.getElementById('hidden_for_staff').style.display = "block";
                }
            }

        </script>
    </head>
        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Users /</small> Edit User
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-pencil"></i> Edit User</h2>
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
<?php
  $query=mysqli_query($dbcon,"select * from user where user_id='$ID'")or die(mysqli_error($dbcon));
$row=mysqli_fetch_array($query);
  ?>

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        <!---        <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">User Image <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4">
										<a href=""><?php // if($row['user_image'] != ""): ?>
										<img src="upload/<?php // echo $row['user_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php // else: ?>
										<img src="images/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php // endif; ?>
										</a>
                                        <input type="file" style="height:44px; margin-top:10px;" name="image" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>	-->
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Registration No.
                                    </label>
                                    <div class="col-md-2">
                                        <input type="number" value="<?php echo $row['school_number']; ?>" name="school_number" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">First Name
									</label>
                                    <div class="col-md-3">
                                        <input type="text" value="<?php echo $row['firstname']; ?>" name="firstname" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Middle Name
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="middlename" value="<?php echo $row['middlename']; ?>" placeholder="MI / Middle Name....." id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Last Name
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" value="<?php echo $row['lastname']; ?>" name="lastname" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Gender
                                    </label>
									<div class="col-md-4">
                                        <select name="gender" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>								

                                <div class="form-group">
									<label class="control-label col-md-4" for="last-name">Programme
									</label>
									<div class="col-md-4">
                                        <select name="type" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
                                            <option value="Degree">Degree</option>
                                            <option value="Diploma">Diploma</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <!-- <div id="hidden_for_staff" style="display:none;">-->
                                <div class="form-group">
									<label class="control-label col-md-4" for="last-name">Year
									</label>

									<div class="col-md-4">
                                        <select name="level" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo $row['level']; ?>"><?php echo $row['level']; ?></option>
                                            <option value="First Year">First Year</option>
                                            <option value="Second Year">Second Year</option>
                                            <option value="Third Year">Third Year</option>
                                            <option value="Fourth Year">Fourth Year</option>
                                           
                                        </select>
                                    </div>

                                </div>
                                <!--</div>-->
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Department <span class="required" style="color:red;">*</span>
                                    </label>
                                    
                                    <div class="col-md-4">
                                        <select name="section" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="<?php echo $row['section']; ?>"><?php echo $row['section']; ?></option>
                                            <option value="Civil">Civil Engineering</option>
                                            <option value="CSE">Computer Science Engineering - CSE</option>
                                            <option value="ECE">Electronics and Communication Engineering - ECE</option>
                                            <option value="EEE">Electrical and Electronics Engineering</option>
                                            <option value="Education">Education</option>
                                            <option value="ISNE">Information Systems and Network Engineering - ISNE</option>
                                            <option value="Mechanical Engineering">Mechanical Engineering</option>
                                        </select>
                                </div>
                                    </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="contact">Contact
                                    </label>
                                    <div class="col-md-3">
                                        <input type='tel' value="<?php echo $row['contact']; ?>" autocomplete="off"  maxlength="13" name="contact" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="address">Address
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $row['address']; ?>" name="address" id="address" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="email">Email
                                    </label>
                                    <div class="col-md-3">
                                        <input type="email" value="<?php echo $row['email']; ?>" name="email" id="email" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="pin">PIN <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="password" name="pin" id="pin" class="form-control col-md-7 col-xs-12" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="pin">Confirm PIN <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="password" name="confirm_pin" id="confirm_pin" class="form-control col-md-7 col-xs-12" required onkeyup="checkPin(); return false;">
                                        <span class="confirmMessage" id="confirmMessage"></span>
                                    </div>
                                </div>
                                <!--div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Section
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="section" value="<?php //echo $row['section']; ?>" placeholder="Section....." id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div-->
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="user.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
							
<?php
$id =$_GET['user_id'];
if (isset($_POST['update'])) {
				//				$image = $_FILES["image"] ["name"];
				//			$image_name= addslashes($_FILES['image']['name']);
				//			$size = $_FILES["image"] ["size"];
				//			$error = $_FILES["image"] ["error"];
							


				//			if ($error > 0){
										
// $school_number = $_POST['school_number'];
// $firstname = $_POST['firstname'];
// $middlename = $_POST['middlename'];
// $lastname = $_POST['lastname'];
// $contact = $_POST['contact'];
// $gender = $_POST['gender'];
// $address = $_POST['address'];
// $type = $_POST['type'];
// $level = $_POST['level'];
// $still_profile = $row['user_image'];


// mysql_query(" UPDATE user SET school_number='$school_number', firstname='$firstname', middlename='$middlename', lastname='$lastname', contact='$contact', 
// gender='$gender', address='$address', type='$type', level='$level', user_image='$still_profile' WHERE user_id = '$id' ")or die(mysql_error());
// echo "<script>alert('Successfully Update User Info!'); window.location='user.php'</script>";	
							//		}else{
							//			if($size > 10000000) //conditions for the file
							//			{
							//			die("Format is not allowed or file size is too big!");
							//			}
										

// move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
// $profile=$_FILES["image"]["name"];

$school_number = $_POST['school_number'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$contact = $_POST['contact'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$type = $_POST['type'];
$level = $_POST['level'];
$section = $_POST['section'];
$email = $_POST['email'];
$pin = hash('sha256',$_POST['pin']);
$confirm_pin = hash('sha256',$_POST['confirm_pin']);
    if($pin != $confirm_pin)
    {
        echo "<script>alert('Pin do not match!'); window.location='user.php'</script>";
    }
    else
{
mysqli_query($dbcon," UPDATE user SET school_number='$school_number', pin='$pin', confirm_pin='$confirm_pin', firstname='$firstname', middlename='$middlename', lastname='$lastname', contact='$contact', 
gender='$gender', address='$address', type='$type', level='$level', section='$section', email='$email' WHERE user_id = '$id' ")or die(mysqli_error($dbcon));
echo "<script>alert('Successfully Updated User Info!'); window.location='user.php'</script>";
}

// }
// }
}
?>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>
<script src="pinvalidate.js" type="text/javascript"></script>
<?php include ('footer.php'); ?>