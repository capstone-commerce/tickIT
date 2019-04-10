<?php //TODO: 1) INSERT $_POST ARRAY DATA INTO DATABASE USERS TABLE
	session_start();
	require('dbconnect.php');
	//checking if user was authenticated by checking if they have a usertype
	if(!isset($_SESSION["user_type"])){
		echo("user_type is NOT set");
		header("Location: ./login.php");
		exit();
	}
	//redirects to home if the user's type is not admin
	if($_SESSION["user_type"] != "Administrator"){
		header("Location: ./home.php");
		exit();
	}

	/*
		INSERT $_POST ARRAY DATA INTO DATABASE USERS TABLE
		REDIRECT BACK TO HOME.php
	*/

?>
