<!DOCTYPE html>
<html lang="en">
<?php 
include("angularheader.php");
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DMI - Online Library Management System</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">


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

    
    <div class="">

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                <div ng-app="myApp">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <h1>Pass Recover</h1>
                        <div>
                            Please enter your email Address: <br><input type="email" size="50" maxlength="255" class="form-control" name="remail" placeholder="Email Address" autofocus='autofocus' no-special-char ng-model="remail" required /><br>
                        </div>
                        <div>
                                <br><button class="btn btn-primary submit" type="submit" name="submit" value="Get New Password"><i class="fa fa-check"></i> Recover</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                        
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><i class="fa fa-university" style="font-size: 26px;"></i> DMI</h1>

                                <p>© <?php echo date('Y'); ?> <i class="fa fa-book"></i> Online Library Management System</p>
                            </div>
                        </div>
                    </form>
                    </div>
                    <a href="members.php">Member Login</a><br><br>
                    <a href="index.php">Admin Login</a>
<?php
include('include/dbcon.php');
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
//var_dump($email);
$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'mlabwa.dm@gmail.com';          // SMTP username
$mail->Password = 'SUPERboy'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to
//$mail->SMTPDebug = 4; //Display specific errors
//$password = substr(hash('sha256',uniqid(rand(),1)),3,20);

$password = substr(uniqid(rand(),1),3,20);
$pass = hash('sha256',$password);
/*echo $password;
echo "<br>";
echo $pass;*/

//This code runs if the form has been submitted
if(isset($_POST['submit']))
{
    $error = '';

// check for valid email address
$email = $_POST['remail'];
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
     $error = 'Please enter a valid email address';
 }

// checks if the username is in use
$check = mysqli_query($dbcon,"SELECT * FROM admin WHERE email = '$email'")or die(mysqli_error($dbcon));
$check2 = mysqli_num_rows($check);
$row = mysqli_fetch_array($check);

//if the name exists it gives an error
if ($check2 == 0) {
$error = 'Sorry, we cannot find your account details please try another email address.';
}

// if no errors then carry on
if (!$error) {

$query = mysqli_query($dbcon,"SELECT username FROM admin WHERE email = '$email' ")or die (mysqli_error($dbcon));
$to = $row['email'];
$user =  $row['username'];
//var_dump($to);
$r = mysqli_fetch_object($query);

//create a new random password
$password = substr(uniqid(rand(),1),3,20);
$pass = hash('sha256',$password);

//$pass = hash('sha256',$password); //encrypted version for database entry


//update database
$sql = mysqli_query($dbcon,"UPDATE admin SET password='$pass', confirm_password='$pass' WHERE email = '$email'")or die (mysqli_error($dbcon));
//$rsent = true;
$mail->setFrom('mlabwa.dm@gmail.com', 'DMI Library');
$mail->addReplyTo('mlabwa.dm@gmail.com', 'LMS');
$mail->addAddress($to);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>Change password</h1>';
$bodyContent .= '<p>Hi '.$user.', your password has been reset to '.$password.' please login and change your password to something more rememberable.</p>';

$mail->Subject = 'Email from Localhost by LMS';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

}

}// close if form sent






?>