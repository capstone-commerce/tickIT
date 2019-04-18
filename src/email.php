<?php
	session_start();
	require("dbconnect.php");
	include("authenticate_session.php");
	include("email_config.php");

switch($_SESSION['message_type']){
	case "ticket_created":
		$email = $_SESSION['email'];
		$name = $_SESSION['customer_name'];
		$subject = $_SESSION['subject'];
		$body = "Greetings " . $name . ", " . 
			"<br><br>" . 
			"Our department has received your work order for [" . $subject . 
			"] and is currently working to resolve your issue.<br>" . 
			"Your assigned technician is " . $_SESSION['username'] . "." . 
			"<br><br>Please let us know if we can do anything to further assist you!" . 
			"<br>Best,<br>tickIT Email Bot :)";
		break;
	case "account_edited":
		$username = $_SESSION['username'];
		$email_query = "SELECT email FROM Users WHERE username='$username'";
		$email_retval = mysqli_query($CSDB, $email_query);
		$row = mysqli_fetch_assoc($email_retval);

		$email = $row["email"];
		$name = $_SESSION['username'];
		$subject = "Account Information Changed";
		$body = "Greetings " . $_SESSION['username'] . ", " . 
			"<br><br>" . 
			"Your account information has been updated. If you did not request " . 
			"for your account information to be updated, please inform your department's system administrator." . 
			"<br><br>Best,<br>tickIT Email Bot :)";
		break;
}
$mail->Subject = $subject;
$mail->addAddress($email, $name);
$mail->Body = $body;
$mail->AltBody = 'ERROR: altbody message sent.';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
unset($_SESSION['message_type']);
unset($_SESSION['email']);
unset($_SESSION['customer_name']);
unset($_SESSION['subject']);
if (!$mail->send()) {
	echo "Mailer Error: " . $mail->ErrorInfo;
	//header("refresh: 5; url=./create.php");
} else {
	//echo "Success! Redirecting to home...";
	header("Location: ./home.php");
	exit;
}
?>
