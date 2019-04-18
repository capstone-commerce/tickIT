<?php session_start();
	session_unset();
	session_destroy();
/*
	echo("Items within the session array: ");
	$counter = 0;
	foreach($_SESSION as $item){
		$counter++;
		echo('|[' . $counter . ']' . $item);
	}
	echo('|');
*/
	header("Location: ./login.php");
	exit();
?>
