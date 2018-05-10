<?php
include("angularheader.php");
require 'PHPMailer/PHPMailerAutoload.php';
include("assets/php/database.php");
include("assets/php/functions.php");

$show = 'emailForm'; //which form step to show by default
if(!isset($_SESSION['lockout']))
    $_SESSION['lockout'] = false;
if ($_SESSION['lockout'] == true && (mktime() > $_SESSION['lastTime'] + 900))
{
	$_SESSION['lockout'] = false;
	$_SESSION['badCount'] = 0;
}
if (isset($_POST['subStep']) && !isset($_GET['a']) && $_SESSION['lockout'] != true)
{
	switch($_POST['subStep'])
	{
		case 1:
			//we just submitted an email or username for verification
			$result = checkUNEmail($_POST['uname'],$_POST['email']);
			if ($result['status'] == false )
			{
				$error = true;
				$show = 'userNotFound';
			} else {
				$error = false;
				$show = 'securityForm';
				$securityUser = $result['userID'];
			}
			break;
		case 2:
			//we just submitted the security question for verification
			if ($_POST['userID'] != "" && $_POST['answer'] != "")
			{
				$result = checkSecAnswer($_POST['userID'],$_POST['answer']);
				if ($result == true)
				{
					//answer was right
					$error = false;
					$show = 'successPage';
					$passwordMessage = sendPasswordEmail($_POST['userID']);
					$_SESSION['badCount'] = 0;
				
				} else {
					//answer was wrong
					$error = true;
					$show = 'securityForm';
					$securityUser = $_POST['userID'];
					$_SESSION['badCount']++;
				}
			} else {
				$error = true;
				$show = 'securityForm';
			}
			break;
		case 3:
			//we are submitting a new password (only for encrypted)
			if ($_POST['userID'] == '' || $_POST['key'] == '') header("location: index.php");
			if (strcmp($_POST['pw0'],$_POST['pw1']) != 0 || trim($_POST['pw0']) == '')
			{
				$error = true;
				$show = 'recoverForm';
			} else {
				$error = false;
				$show = 'recoverSuccess';
				updateUserPassword($_POST['userID'],$_POST['pw0'],$_POST['key']);
			}
			break;
	}
} elseif (isset($_GET['a']) && $_GET['a'] == 'recover' && $_GET['email'] != "") {
	$show = 'invalidKey';
	$result = checkEmailKey($_GET['email'],urldecode(base64_decode($_GET['u'])));
	if ($result == false)
	{
		$error = true;
		$show = 'invalidKey';
	} elseif ($result['status'] == true) {
		$error = false;
		$show = 'recoverForm';
		$securityUser = $result['userID'];
	}
}
if(!isset($_SESSION['badCount']))
    $_SESSION['badCount'] = false;
if ($_SESSION['badCount'] >= 3)
{
	$show = 'speedLimit';
	$_SESSION['lockout'] = true;
	$_SESSION['lastTime'] = '' ? mktime() : $_SESSION['lastTime'];
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DMI - Online Library Management System</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet" type="text/css">
    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="reset_password_style.css">
        <script type="text/javascript" src="js/jquery.js"></script>


    <script src="js/jquery.min.js"></script>

<style>
.blink_text {
-webkit-animation-name: blinker;
-webkit-animation-duration: 1s;
-webkit-animation-timing-function: linear;
-webkit-animation-iteration-count: infinite;

-moz-animation-name: blinker;
-moz-animation-duration: 1s;
-moz-animation-timing-function: linear;
-moz-animation-iteration-count: infinite;

 animation-name: blinker;
 animation-duration: 1s;
 animation-timing-function: linear;
 animation-iteration-count: infinite;

 color:white;
 font-size:16px;
}

@-moz-keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }

@-webkit-keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }

@keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }
</style>
</head>

<body style="background:#F7F7F7;">
<div id="wrapper">
<div id="login" class="animate form">
                <section class="login_content">
		<?php switch($show) {
	case 'emailForm': ?>
	<h1>Password Recovery</h1>
    <p>You can use this form to recover your password if you have forgotten it. Because your password is securely encrypted in our database, it is impossible to actually recover your password, but we will email you a link that will enable you to reset it securely. Enter either your username or your email address below to get started.</p>
    <?php if ($error == true) { ?><span class="error">You must enter either a username or password to continue.</span><?php } ?>
    
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="fieldGroup"><label for="uname">Username</label><div class="field"><input type="text" class="form-control" name="uname" id="uname" value="" maxlength="20"></div></div>
        <div class="fieldGroup"><label>- OR -</label></div>
        <div class="fieldGroup"><label for="email">Email</label><div class="field"><input type="text" class="form-control" name="email" id="email" value="" maxlength="255"></div></div>
        <input type="hidden" name="subStep" value="1" />
        <div class="fieldGroup"><button type="submit" class="btn btn-primary btn-sm" value="Submit" aria-hidden="true">Submit</button></div>
        <div class="clear"></div>
    </form>
    <?php break; case 'securityForm': ?>
    <h1>Password Recovery</h1>
    <p>Please answer the security question below:</p>
    <?php if ($error == true) { ?><span class="error">You must answer the security question correctly to reset your lost password.</span><?php } ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="fieldGroup"><label>Question</label><div class="field"><?php echo getSecurityQuestion($securityUser); ?></div></div>
        <div class="fieldGroup"><label for="answer">Answer</label><div class="field"><input type="text" class="form-control input-sm" name="answer" id="answer" value="" maxlength="255"></div></div>
        <input type="hidden" name="subStep" value="2" />
        <input type="hidden" name="userID" value="<?php echo $securityUser; ?>" />
        <div class="fieldGroup"><button type="submit" class="btn btn-primary btb-sm" value="Submit" aria-hidden="true">Submit</button></div>
        <div class="clear"></div>
    </form>

	 <?php break; case 'userNotFound': ?>
    <h1>Password Recovery</h1>
    <p>The username or email you entered was not found in our database.<br /><br /><a href="?">Click here</a> to try again.</p>
    <?php break; case 'successPage': ?>
    <h1>Password Recovery</h1>
    <p>An email has been sent to you with instructions on how to reset your password. <br /><a href="index.php">Return</a> to the login page. </p>
    <?php break; case 'recoverForm': ?>
    <h1>Password Recovery</h1>
    <p>Welcome back, <?php echo getUserName($securityUser=='' ? $_POST['userID'] : $securityUser); ?>.</p>
    <p>In the fields below, enter your new password.</p>
    <?php if ($error == true) { ?><span class="error">The new passwords must match and must not be empty.</span><?php } ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-horizontal form-label-left">
        <div class="form-group">
            <label class="control-label col-md-4" for="pw0">Password <span class="required" style="color:red;">*</span>
            </label>
            <div class="col-md-4">
                <input type="password" name="pw0" id="pw0" value="" maxlength="20" class="form-control col-md-7 col-xs-12">
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
                <input type="password" name="pw1" id="pw1" value="" maxlength="20" class="form-control col-md-7 col-xs-12" onkeyup="checkPass(); return false;">
                <span class="confirmMessage" id="confirmMessage"></span>
            </div>
        </div>
        <input type="hidden" name="subStep" value="3" />
        <input type="hidden" name="userID" value="<?php echo $securityUser=='' ? $_POST['userID'] : $securityUser; ?>" />
        <input type="hidden" name="key" value="<?php echo $_GET['email']=='' ? $_POST['key'] : $_GET['email']; ?>" />
        <div class="fieldGroup"><button type="submit" class="btn btn-primary btn-sm" value="Submit" aria-hidden="true">Submit</button></div>
        <div class="clear"></div>



    </form>

    <?php break; case 'invalidKey': ?>
    <h1>Invalid Key</h1>
    <p>The key that you entered was invalid. Either you did not copy the entire key from the email, you are trying to use the key after it has expired (3 days after request), or you have already used the key in which case it is deactivated.<br /><br /><a href="index.php">Return</a> to the login page. </p>
    <?php break; case 'recoverSuccess': ?>
    <h1>Password Reset</h1>
    <p>Congratulations! your password has been reset successfully.</p><br />
    <p>You can now login using your new password</p><br />
                <br /><a href="index.php">Return</a> to the login page. </p>
    <?php break; case 'speedLimit': ?>
    <h1>Warning</h1>
    <p>You have answered the security question wrong too many times. You will be locked out for 15 minutes, after which you can try again.</p><br /><br /><a href="index.php">Return</a> to the login page. </p>
    <?php break; }
		ob_flush();
		$mySQL->close();
		?>
        <div class="clearfix"></div>
        <div class="separator">

            <div class="clearfix"></div>
            <br />
            <div>
                <a href="http://localhost/olms/index.php" style="text-decoration:none">
                    <h1><i class="fa fa-university" style="font-size: 26px;"></i> DMI</h1>
                </a>
                <p>© <?php echo date('Y'); ?> <i class="fa fa-book"></i> Online Library Management System</p>
            </div>
	</div>
</div>

</body>
<script src="validateresetpass.js" type="text/javascript"></script>
<script src="resetpasswordstrength.js" type="text/javascript"></script>
</html>