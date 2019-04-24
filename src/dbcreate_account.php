<?php
	session_start();
	include("authenticate_session.php");
	require('dbconnect.php');
	if($_POST['new_account'] == 'true'){	//if a new account
		if(! get_magic_quotes_gpc() ) {
			$username = addslashes ($_POST['username']);
			$password = addslashes ($_POST['password']);
      $password = password_hash($password, PASSWORD_DEFAULT);
			$email = addslashes ($_POST['email']);
			$phone = addslashes ($_POST['phone_number']);
		} else {
			$username = ($_POST['username']);
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$email = ($_POST['email']);
			$phone = ($_POST['phone_number']);
		}
		$sql = "INSERT INTO Users ". 
			"(username,password,email,phone_number,department,role,locked) "."VALUES ".
			"('$username','$password','$email','$phone','Comp. Sci','Technician','False')";
		$retval = mysqli_query($CSDB, $sql);
		if(! $retval ) {
			die('Could not enter data: ' . mysqli_error($CSDB));
		} else {
			echo "Account Created! Redirecting to home...";
			header("refresh: 1; url=./home.php");
		}
	} else if($_POST['new_account'] == 'false'){	//if updating an existing account
		$username = ($_SESSION['username']);
		switch($_POST['update_account_type']){
			case "password":$password 	= password_hash($_POST['password'], PASSWORD_DEFAULT);
					$sql = "UPDATE Users SET password='$password' WHERE username='$username'";
					break;
			case "email":	$email 		= ($_POST['email']);
					$sql = "UPDATE Users SET email='$email' WHERE username='$username'";
					break;
			case "phone":	$phone		= ($_POST['phone_number']);
					$sql = "UPDATE Users SET phone_number='$phone' WHERE username='$username'";
					break;
			case "time_out":$time_out	= ($_POST['time_out']);
					$sql = "UPDATE Users SET time_out='$time_out' WHERE username='$username'";
					break;
		}
		$retval = mysqli_query($CSDB, $sql);
		if(! $retval ) {
			die('Could not enter data: ' . mysqli_error($CSDB));
		} else {
			echo "Account Edited! Redirecting to home...";
			$_SESSION['message_type'] = "account_edited";
			header("refresh: 1; url=./email.php");
		}
	}
	mysqli_close($CSDB);
?>
