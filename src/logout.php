<?php session_start();
	/*
	//checking if user was authenticated by checking if they have a usertype
	if(!isset($_SESSION["user_type"])){
		echo("user_type is NOT set");
		header("Location: ./login.php");
		exit();
	}
	*/
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
	unset($_SESSION["username"]);
	unset($_SESSION["password"]);
	unset($_SESSION["user_type"]);

	echo("Items within the session array: ");
	$counter = 0;
	foreach($_SESSION as $item){
		$counter++;
		echo('|[' . $counter . ']' . $item);
	}
	echo('|');

	header("Location: ./login.php");
	exit();
?>
</body>
<html>
