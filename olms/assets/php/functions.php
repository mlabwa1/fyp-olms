<?php
define('PW_SALT','(+3%_');

function checkUNEmail($username,$email)
{
	global $mySQL;
	$error = array('status'=>false,'userID'=>0);
	if (isset($email) && trim($email) != '') {
		//email was entered
		if ($SQL = $mySQL->prepare("SELECT `admin_id` FROM `admin` WHERE `email` = ? LIMIT 1"))
		{
			$SQL->bind_param('s',trim($email));
			$SQL->execute();
			$SQL->store_result();
			$numRows = $SQL->num_rows();
			$SQL->bind_result($userID);
			$SQL->fetch();
			$SQL->close();
			if ($numRows >= 1) return array('status'=>true,'userID'=>$userID);
		} else { return $error; }
	} elseif (isset($username) && trim($username) != '') {
		//username was entered
		if ($SQL = $mySQL->prepare("SELECT `admin_id` FROM `admin` WHERE username = ? LIMIT 1"))
		{
			$SQL->bind_param('s',trim($username));
			$SQL->execute();
			$SQL->store_result();
			$numRows = $SQL->num_rows();
			$SQL->bind_result($userID);
			$SQL->fetch();
			$SQL->close();
			if ($numRows >= 1) return array('status'=>true,'userID'=>$userID);
		} else { return $error; }
	} else {
		//nothing was entered;
		return $error;
	}
}
function getSecurityQuestion($userID)
{
	global $mySQL;
	$questions = array();
	$questions[0] = "What is your mother's maiden name?";
	$questions[1] = "What city were you born in?";
	$questions[2] = "What is your favorite color?";
	$questions[3] = "What year did you graduate from High School?";
	$questions[4] = "What was the name of your first boyfriend/girlfriend?";
	$questions[5] = "What is your favorite model of car?";
	if ($SQL = $mySQL->prepare("SELECT `secQ` FROM `admin` WHERE `admin_id` = ? LIMIT 1"))
	{
		$SQL->bind_param('i',$userID);
		$SQL->execute();
		$SQL->store_result();
		$SQL->bind_result($secQ);
		$SQL->fetch();
		$SQL->close();
		return $questions[$secQ];
	} else {
		return false;
	}
}

function checkSecAnswer($userID,$answer)
{
	global $mySQL;
	if ($SQL = $mySQL->prepare("SELECT `username` FROM `admin` WHERE `admin_id` = ? AND LOWER(`secA`) = ? LIMIT 1"))
	{
		$answer = strtolower($answer);
		$SQL->bind_param('is',$userID,$answer);
		$SQL->execute();
		$SQL->store_result();
		$numRows = $SQL->num_rows();
		$SQL->close();
		if ($numRows >= 1) { return true; }
	} else {
		return false;
	}
}

function sendPasswordEmail($userID)
{
	global $mySQL;
	if ($SQL = $mySQL->prepare("SELECT `username`,`email`,`password` FROM `admin` WHERE `admin_id` = ? LIMIT 1"))
	{
		$SQL->bind_param('i',$userID);
		$SQL->execute();
		$SQL->store_result();
		$SQL->bind_result($username,$email,$pword);
		$SQL->fetch();
		$SQL->close();
		$expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+3, date("Y"));
		$expDate = date("Y-m-d H:i:s",$expFormat);
		$key = md5($username . '_' . $email . rand(0,10000) .$expDate . PW_SALT);
		if ($SQL = $mySQL->prepare("INSERT INTO `recoveryemails_enc` (`UserID`,`Key`,`expDate`) VALUES (?,?,?)"))
		{
			$SQL->bind_param('iss',$userID,$key,$expDate);
			$SQL->execute();
			$SQL->close();
			$passwordLink = "http://localhost/olms/forgotPass.php?a=recover&email=" . $key . "&u=" . urlencode(base64_encode($userID));
			$message = "Dear $username,\r\n";
			$message .= "Please visit the following link to reset your password:\r\n";
			$message .= "-----------------------\r\n";
			$message .= "$passwordLink\r\n";
			$message .= "-----------------------\r\n";
			$message .= "Please be sure to copy the entire link into your browser. The link will expire after 3 days for security reasons.\r\n\r\n";
			$message .= "If you did not request this forgotten password email, no action is needed, your password will not be reset as long as the link above is not visited. However, you may want to log into your account and change your security password and answer, as someone may have guessed it.\r\n\r\n";
			$message .= "Thanks,\r\n";
			$message .= "-- Our site team";
			$headers .= "From: Our Site <webmaster@oursite.com> \n";
			$headers .= "To-Sender: \n";
			$headers .= "X-Mailer: PHP\n"; // mailer
			$headers .= "Reply-To: webmaster@oursite.com\n"; // Reply address
			$headers .= "Return-Path: webmaster@oursite.com\n"; //Return Path for errors
			$headers .= "Content-Type: text/html; charset=iso-8859-1"; //Enc-type
			$subject = "Your Lost Password";
			@mail($email,$subject,$message,$headers);
			
			$mail = new PHPMailer;
			//var_dump($email);
			$mail->isSMTP();                            // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                     // Enable SMTP authentication
			$mail->Username = 'mlabwa.dm@gmail.com';          // SMTP username
			$mail->Password = 'SUPERboy'; // SMTP password
			$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                          // TCP port to connect to
			
			$to = $email;
					
			$mail->setFrom('mlabwa.dm@gmail.com', 'DMI Library');
			$mail->addReplyTo('mlabwa.dm@gmail.com', 'LMS');
			$mail->addAddress($to);   // Add a recipient
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			//$mail->isHTML(true);  // Set email format to HTML

			$bodyContent = $message;
			$mail->Subject = 'Your Lost Password';
			$mail->Body    = $bodyContent;

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			}		
			
		}
	}
}

function checkEmailKey($key,$userID)
{
	global $mySQL;
	$curDate = date("Y-m-d H:i:s");
	if ($SQL = $mySQL->prepare("SELECT `UserID` FROM `recoveryemails_enc` WHERE `Key` = ? AND `UserID` = ? AND `expDate` >= ?"))
	{
		$SQL->bind_param('sis',$key,$userID,$curDate);
		$SQL->execute();
		$SQL->execute();
		$SQL->store_result();
		$numRows = $SQL->num_rows();
		$SQL->bind_result($userID);
		$SQL->fetch();
		$SQL->close();
		if ($numRows > 0 && $userID != '')
		{
			return array('status'=>true,'userID'=>$userID);
		}
	}
	return false;
}

function updateUserPassword($userID,$password,$key)
{
	global $mySQL;
	if (checkEmailKey($key,$userID) === false) return false;
	if ($SQL = $mySQL->prepare("UPDATE `admin` SET `password` = ? WHERE `admin_id` = ?"))
	{
		$password = hash('sha256', $password);
		$SQL->bind_param('si',$password,$userID);
		$SQL->execute();
		$SQL->close();
		$SQL = $mySQL->prepare("DELETE FROM `recoveryemails_enc` WHERE `Key` = ?");
		$SQL->bind_param('s',$key);
		$SQL->execute();
	}
}

function getUserName($userID)
{
	global $mySQL;
	if ($SQL = $mySQL->prepare("SELECT `username` FROM `admin` WHERE `admin_id` = ?"))
	{
		$SQL->bind_param('i',$userID);
		$SQL->execute();
		$SQL->store_result();
		$SQL->bind_result($username);
		$SQL->fetch();
		$SQL->close();
	}
	return $username;
}
