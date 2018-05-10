S<?php include ('header.php'); ?>
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
					<small>Home / Members</small>
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

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <span class="required" style="color:red;">*</span>&nbspFields marked with asterisk are a must to fill
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Registration No. <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-2">
                                        <input type="number" name="school_number" id="school_number" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">First Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="firstname" id="first_name" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return onlyAlphabets(event,this);" >
                                        <!--<span class="confirmMessage" id="confirmMessage"></span>-->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Middle Name
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="middlename" placeholder="MI / Middle Name....." id="middle_name" class="form-control col-md-7 col-xs-12" onkeypress="return onlyAlphabets(event,this);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Last Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="lastname" placeholder="Last Name....." id="last_name" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return onlyAlphabets(event,this);">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Gender <span class="required" style="color:red;">*</span>
                                    </label>
									<div class="col-md-4">
                                        <select name="gender" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>								

                                <div class="form-group">
									<label class="control-label col-md-4" for="last-name">Programme <span class="required" style="color:red;">*</span>
									</label>
									<div class="col-md-4">
                                        <select name="type" class="select2_single form-control" required="required" tabindex="-1"  id="staff" onchange="showDiv(this)">
                                            <option disabled selected value> -- select an option -- </option>
                                            <option value="Degree">Degree</option>
                                            <option value="Diploma">Diploma</option>
                                            <option value="Staff">Staff</option>
                                        
                                        </select>
                                    </div>
                                    </div>
                                <div id="hidden_for_staff" style="display:none;">

                                <div class="form-group">
									<label class="control-label col-md-4" for="last-name">Year <span class="required" style="color:red;">*</span>
									</label>

									<div class="col-md-4">


                                        <select name="level" class="select2_single form-control" required="required" tabindex="-1">
                                            <option value="First Year">First Year</option>
                                            <option value="Second Year">Second Year</option>
                                            <option value="Third Year">Third Year</option>
                                            <option value="Fourth Year">Fourth Year</option>
                                        </select>

                                </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Department <span class="required" style="color:red;">*</span>
                                    </label>
                                    
                                    <div class="col-md-4">
                                        <select name="section" class="select2_single form-control" required="required" tabindex="-1" >
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
                                    <label class="control-label col-md-4" for="last-name">Contact <span class="required" style="color:red;">*</span></label>
                                    <div class="col-md-3">
                                        <input type="tel" <?php //pattern="[0][0-9]{11}"?> autocomplete="off"  maxlength="13" required="required" name="contact" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Address</label>
                                    <div class="col-md-4">
                                        <input type="text" name="address" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="email">Email <span class="required" style="color:red">*</span></label>
                                    <div class="col-md-4">
                                        <input type="email" name="email" id="email" class="form-control col-md-7 col-xs-12" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="pin">PIN <span class="required" style="color:red">*</span></label>
                                    <div class="col-md-4">
                                        <input type="password" name="pin" id="pin" class="form-control col-md-7 col-xs-12" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="pin">Confirm PIN <span class="required" style="color:red">*</span></label>
                                    <div class="col-md-4">
                                        <input type="password" name="confirm_pin" id="confirm_pin" class="form-control col-md-7 col-xs-12" required onkeyup="checkPin(); return false;">
                                        <span class="confirmMessage" id="confirmMessage"></span>
                                    </div>
                                </div>
                                <!--div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Course <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="section" placeholder="Section" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div-->
                        <!---        <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">User Image <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="file" style="height:44px;" name="image" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>	-->
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="user.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
							
							<?php	
							include ('include/dbcon.php');
                if (isset($_POST['submit'])){
							
		//					if (!isset($_FILES['image']['tmp_name'])) {
		//					echo "";
		//					}else{
		//					$file=$_FILES['image']['tmp_name'];
		//					$image = $_FILES["image"] ["name"];
		//					$image_name= addslashes($_FILES['image']['name']);
		//					$size = $_FILES["image"] ["size"];
		//					$error = $_FILES["image"] ["error"];
		//					
		//					{
		//								if($size > 10000000) //conditions for the file
		//								{
		//								die("Format is not allowed or file size is too big!");
		//								}
		//								
		//							else
		//								{
		//
		//							move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
		//							$profile=$_FILES["image"]["name"];
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
					
					$result=mysqli_query($dbcon,"select * from user WHERE school_number='$school_number' ") or die (mysqli_error($dbcon));
					$row=mysqli_num_rows($result);
					if ($row > 0)
					{
					echo "<script>alert('ID Number already active!'); window.location='user.php'</script>";
					}
                    elseif($pin != $confirm_pin)
                    {
                        echo "<script>alert('Pin do not match!'); window.location='add_user.php'</script>";
                    }
					else
					{		
						mysqli_query($dbcon,"insert into user (school_number, pin, confirm_pin, firstname, middlename, lastname, contact, gender, address, type, level, section, email, status, user_added)
						values ('$school_number','$pin', '$confirm_pin', '$firstname', '$middlename', '$lastname', '$contact', '$gender', '$address', '$type', '$level', '$section', '$email', 'Active', NOW())")or die(mysqli_error($dbcon));
						echo "<script>alert('User successfully added!'); window.location='user.php'</script>";
					}
			//						}
			//						}
							}
								?>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>
<script src="pinvalidate.js" type="text/javascript"></script>
<script src="onlyletters.js" type="text/javascript"></script>
<?php include ('footer.php'); ?>