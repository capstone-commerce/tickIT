<?php session_start();
	//checking if user was authenticated by checking if they have a usertype
	if(!isset($_SESSION["user_type"])){
		echo("user_type is NOT set");
		header("Location: ./login.php");
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Ticket | tickIT</title>
	<link rel="stylesheet" type="text/css" href="./static/css/edit.css">
	<script>
		window.onload = function(){
			document.getElementById("logout_button").onclick = function () {window.location.href='./login.php'};
			document.getElementById("submit_ticket_button").onclick = function () {window.location.href='./home.php'};
		}
	</script>
</head>
<body>
	<div id="edit_main">
		<h1>[Description of Ticket]</h1>
		<div id="ticket_info">
			ticket info
		</div>
		<div id="table_of_updates">
			table of updates
		</div>
	</div>
	<div id="edit_footer">
		<form id="logout_button" action="logout.php">
			<input type="submit" name="logout" value="logout"/>
		</form>
	</div>
</body>
</html>
