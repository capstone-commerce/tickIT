<?php session_start(); ?>
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
		</div>
		<div id="table_of_updates">
		</div>
	</div>
	<div id="edit_footer">
		<button id="logout_button">Logout</button>
	</div>
</body>
</html>
