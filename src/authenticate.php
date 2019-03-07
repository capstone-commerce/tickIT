<?php session_start(); ?>
<?php
	$_SESSION["username"] = $_POST["username"];
	$_SESSION["password"] = $_POST["password"];

	//compare username and password to DB
	//apply proper user_type from DB
	//if match, redirect to home and create _SESSION["ID"]

	//spoof login info below until DB is implemented
	$spoofAdminUsername = "admin";
	$spoofAdminPassword = "password";
	$spoofAdminUsertype = "admin";

	$spoofTechUsername = "tech";
	$spoofTechPassword = "password";
	$spoofTechUsertype = "tech";

	if((($_SESSION["username"] == $spoofAdminUsername) and ($_SESSION["password"] == $spoofAdminPassword)) or 
	(($_SESSION["username"] == $spoofTechUsername)) and ($_SESSION["password"] == $spoofTechPassword)){
		switch($_SESSION["username"]){
			case "admin":	$_SESSION["user_type"] = $spoofAdminUsertype; break;
			case "tech":	$_SESSION["user_type"] = $spoofTechUsertype; break;
		}
		header("Location: ./home.php");
		exit();	//good practice to exit() after redirect, to ensure below code does not execute
	} else {
		echo("Failed to authenticate, redirecting to login...");
		header("refresh: 3; url= ./login.php");
		exit();
	}
?>
