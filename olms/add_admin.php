<?php include ('header.php'); ?>
<head>
    <link rel="stylesheet" type="text/css" href="password_style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
</head>
        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Admin Profile /</small> Add Admin
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-plus"></i> Add Admin</h2>
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
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">First Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="firstname" id="first-name2" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return onlyAlphabets(event,this);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Middle Name
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="middlename" placeholder="MI / Middle Name....." id="first-name2" class="form-control col-md-7 col-xs-12" onkeypress="return onlyAlphabets(event,this);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Last Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="lastname" id="last-name2" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return onlyAlphabets(event,this);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">User Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="username" id="last-name2" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return onlyAlphabets(event,this);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="email"> Email: <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="email" name="email" id="email" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="password">Password <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="password" name="password" id="password" required="required" class="form-control col-md-7 col-xs-12" >

                                    </div>
                                    <div class="col-md-4">
                                        <div id="meter_wrapper">
                                            <div id="meter">
                                            </div>
                                        </div>
                                        <span id="pass_type"></span>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="confirm_password">Confirm Password <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="password" name="confirm_password" id="confirm_password" required="required" class="form-control col-md-7 col-xs-12" onkeyup="checkPass(); return false;" >
                                        <span class="confirmMessage" id="confirmMessage"></span>
                                    </div>
                                </div>
								<div class="form-group">
                                <label class="control-label col-md-4" for="Qsn">Security Question</label>
								<div class="col-md-4">
                                <select name="Qsn" id="Qsn" class="form-control" required>

                                    <option disabled="disabled" <?php if($secQ == -1) {?>selected="selected"<?php }?> value="-1">Security Question</option>
                                    <option <?php if($secQ == 0) {?>selected="selected"<?php }?> value="0">What is your mother's maiden name?</option>
                                    <option <?php if($secQ == 1) {?>selected="selected"<?php }?> value="1">What city were you born in?</option>
                                    <option <?php if($secQ == 2) {?>selected="selected"<?php }?> value="2">What is your favorite color?</option>
                                    <option <?php if($secQ == 3) {?>selected="selected"<?php }?> value="3">What year did you graduate from High School?</option>
                                    <option <?php if($secQ == 4) {?>selected="selected"<?php }?> value="4">What was the name of your first boyfriend/girlfriend?</option>
                                    <option <?php if($secQ == 5) {?>selected="selected"<?php }?> value="5">What is your favorite model of car?</option>

                                </select>
								</div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="Ans">Answer</label>
								<div class="col-md-4">
                                <input type="text" name="Ans" id="Ans" class="form-control"  placeholder="Answer" required value="<?php echo $secA; ?>"/>
                            </div>
							</div>

                        <!---        <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Admin Type <span class="required">*</span>
                                    </label>
									<div class="col-md-4">
                                        <select name="admin_type" class="select2_single form-control" required="required" tabindex="-1" >
											<option>Admin</option>
											<option>Encoder</option>
                                        </select>
                                    </div>
                                </div>	-->
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Admin Image
                                    </label>
                                    <div class="col-md-4">
                                        <input type="file" style="height:44px;" name="image" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="admin.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
							
							<?php	
							include ('include/dbcon.php');
							if (!isset($_FILES['image']['tmp_name'])) {
							echo "";
							}else{
							$file=$_FILES['image']['tmp_name'];
							$image = $_FILES["image"] ["name"];
							$image_name= addslashes($_FILES['image']['name']);
							$size = $_FILES["image"] ["size"];
							$error = $_FILES["image"] ["error"];
							{
										if($size > 10000000) //conditions for the file
										{
										die("Format is not allowed or file size is too big!");
										}
										
									else
										{

									move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
									$profile=$_FILES["image"]["name"];
									$firstname = $_POST['firstname'];
									$middlename = $_POST['middlename'];
									$lastname = $_POST['lastname'];
									$username = $_POST['username'];
									$pass = $_POST['password'];
                                    $password=hash('sha256', $pass);
									$confirm_password = hash('sha256',$_POST['confirm_password']);
									$email = $_POST['email'];
									$Qsn = $_POST['Qsn'];
									$Ans = $_POST['Ans'];
							//		$admin_type = $_POST['admin_type'];
					
					$result=mysqli_query($dbcon,"select * from admin WHERE username='$username' ") or die (mysqli_error($dbcon));
					$row=mysqli_num_rows($result);
					if ($row > 0)
					{
					echo "<script>alert('Username already taken!'); window.location='add_admin.php'</script>";
					}
					elseif($password != $confirm_password)
					{
					echo "<script>alert('Password do not match!'); window.location='add_admin.php'</script>";
					}else
					{		
						mysqli_query($dbcon,"insert into admin (firstname, middlename, lastname, username, password, confirm_password, email, admin_image, admin_type, admin_added, secQ, secA)
						values ('$firstname', '$middlename', '$lastname', '$username', '$password', '$confirm_password', '$email', '$profile', 'Admin', NOW(),'$Qsn','$Ans')")or die(mysqli_error($dbcon));
						echo "<script>alert('Account successfully added!'); window.location='admin.php'</script>";
					}
									}
									}
							}
								?>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>
    <script src="passtest.js" type="text/javascript"></script>
    <script src="passwordstrength.js" type="text/javascript"></script>
    <script src="onlyletters.js" type="text/javascript"></script>
<?php include ('footer.php'); ?>