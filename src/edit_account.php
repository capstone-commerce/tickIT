<?php
	session_start();
	include("authenticate_session.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Account | tickIT</title>
	<link rel="stylesheet" type="text/css" href="./static/css/edit_account.css">
	<script>
		window.onload = function(){
			document.getElementById("home_button").onclick = function () {window.location.href='./home.php'};
		};
	</script>
</head>
<body>
	<div id="edit_account_banner">
		<h2>Edit Account</h2>
		<button id="home_button">Home</button>
	</div>
	<div id="edit_account_main">
		<form action="dbcreate_account.php" method="post">
			<table id="info_table">
				<tr>
					<td>Password<input type="text" name="password" value=""></td>
					<td>Email<input type="text" name="email" value=""></td>
					<td>Phone<input type="text" name="phone_number" value=""></td>
				</tr>
			</table>
			<input type="hidden" name="new_account" value="false">
			<input type="submit">
		</form>
	</div>
	<div id="edit_account_footer">
		<form id="logout_button" action="logout.php">
			<button id="logout_button">Logout</button>
		</form>
	</div>
</body>
</html>
