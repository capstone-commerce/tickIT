<?php
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

	if(! get_magic_quotes_gpc() ) {
		$username = addslashes ($_POST['username']);
		$password = addslashes ($_POST['password']);
		$email = addslashes ($_POST['email']);
		$phone = addslashes ($_POST['phone_number']);
	} else {
		$username = ($_POST['username']);
		$password = ($_POST['password']);
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
		header("refresh: 2; url=./home.php");
	}
	mysqli_close($CSDB);
?>
