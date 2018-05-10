<?php include ('include/dbcon.php');
$ID=$_GET['admin_id'];
?>
<?php include ('header.php'); ?>
    <head>
        <link rel="stylesheet" type="text/css" href="password_style.css">
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <div class="page-title">
        <div class="title_left">
            <h3>
                <small>Home / Admin Profile /</small> Edit Admin
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-pencil"></i> Edit Admin</h2>
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
                    $query=mysqli_query($dbcon,"select * from admin where admin_id='$ID'")or die(mysqli_error($dbcon));
                    $row=mysqli_fetch_array($query);
                    ?>

                    <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-4" for="last-name">Admin Image
                            </label>
                            <div class="col-md-4">
                                <a href=""><?php if($row['admin_image'] != ""): ?>
                                        <img src="upload/<?php echo $row['admin_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                    <?php else: ?>
                                        <img src="images/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                    <?php endif; ?>
                                </a>
                                <input type="file" style="height:44px; margin-top:10px;" name="image" id="last-name2" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="first-name">First Name <span class="required" style="color:red;">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" value="<?php echo $row['firstname']; ?>" name="firstname" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="middle-name">Middle Name
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="middlename" value="<?php echo $row['middlename']; ?>" placeholder="MI / Middle Name....." id="first-name2" class="form-control col-md-7 col-xs-12">
                            </div><span style="color:red;">Optional</span>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="last-name">Last Name <span class="required" style="color:red;">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" value="<?php echo $row['lastname']; ?>" name="lastname" id="last-name2" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="user-name">User Name <span class="required" style="color:red;">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" value="<?php echo $row['username']; ?>" name="username" id="last-name2" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="email">Email <span class="required" style="color:red;">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="email" value="<?php echo $row['email']; ?>" name="email" id="email" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="password">Password <span class="required" style="color:red;">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="password" value="" name="password" id="password" required="required" class="form-control col-md-7 col-xs-12">
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
                                <input type="password" value="<?php //echo $row['confirm_password']; ?>" name="confirm_password" id=confirm_password required="required" class="form-control col-md-7 col-xs-12" onkeyup="checkPass(); return false;" >
                                <span class="confirmMessage" id="confirmMessage"></span>
                            </div>
                        </div>
                        <!---        <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Admin Type <span class="required">*</span>
                                    </label>
									<div class="col-md-4">
                                        <select name="admin_type" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="<?php // echo $row['admin_type']; ?>"><?php // echo $row['admin_type']; ?></option>
											<option>Admin</option>
											<option>Encoder</option>
                                        </select>
                                    </div>
                                </div>	-->
                        <div class="ln_solid"></div>
                        <?php  ?>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <a href="admin.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                <button type="submit" name="update" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                            </div>
                        </div>
                    </form>

                    <?php
                    $id =$_GET['admin_id'];
                    if (isset($_POST['update'])) {
                        $image = $_FILES["image"] ["name"];
                        $image_name= addslashes($_FILES['image']['name']);
                        $size = $_FILES["image"] ["size"];
                        $error = $_FILES["image"] ["error"];



                        if ($error > 0){

                            $firstname = $_POST['firstname'];
                            $middlename = $_POST['middlename'];
                            $lastname = $_POST['lastname'];
                            $username = $_POST['username'];
                            $email = $_POST['email'];
                            $password = hash('sha256',$_POST['password']);
                            $confirm_password = hash('sha256',$_POST['confirm_password']);
// $admin_type = $_POST['admin_type'];
                            $still_profile = $row['admin_image'];

                            $result=mysqli_query($dbcon,"select * from admin") or die (mysqli_error($dbcon));
                            $row=mysqli_num_rows($result);

                            if($password != $confirm_password)
                            {
                                echo "<script>alert('Password do not match!');
window.location='admin.php'</script>";
                            }else
                            {
                                mysqli_query($dbcon," UPDATE admin SET firstname='$firstname', middlename='$middlename', lastname='$lastname', username='$username', email='$email', password='$password', 
confirm_password='$confirm_password', admin_image='$still_profile' WHERE admin_id = '$id' ")or die(mysqli_error($dbcon));
                                echo "<script>alert('Successfully Update Admin Info!'); window.location='admin.php'</script>";
                            }
                        }else{
                            if($size > 10000000) //conditions for the file
                            {
                                die("Format is not allowed or file size is too big!");
                            }


                            move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);
                            $profile=$_FILES["image"]["name"];

                            $firstname = $_POST['firstname'];
                            $middlename = $_POST['middlename'];
                            $lastname = $_POST['lastname'];
                            $username = $_POST['username'];
                            ;$email = $_POST['email'];
                            $password = $_POST['password'];
                            $confirm_password = $_POST['confirm_password'];
// $admin_type = $_POST['admin_type'];

                            $result=mysqli_query($dbcon,"select * from admin") or die (mysqli_error($dbcon));
                            $row=mysqli_num_rows($result);

                            if($password != $confirm_password)
                            {
                                echo "<script>alert('Password do not match!'); window.location='admin.php'</script>";
                            }else

                            {
                                mysqli_query($dbcon," UPDATE admin SET firstname='$firstname', middlename='$middlename', lastname='$lastname', username='$username', email='$email', password='$password', 
confirm_password='$confirm_password', admin_image='$profile' WHERE admin_id = '$id' ")or die(mysqli_error($dbcon));
                                echo "<script>alert('Successfully Updated Admin Info!'); window.location='admin.php'</script>";
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
<?php include ('footer.php'); ?>