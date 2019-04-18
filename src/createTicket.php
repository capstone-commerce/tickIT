<?php
	session_start();
	include("authenticate_session.php");
	require('dbconnect.php');

	/*
	store ticket_number, customer_name, customer_email, issue, urgency, comments, username, status, date_created
	email user about ticket
	redirect to home
	*/

	header("Location: ./home.php");

	mysqli_close($CSDB);
?>
