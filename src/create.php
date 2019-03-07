<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Ticket | tickIT</title>
	<link rel="stylesheet" type="text/css" href="./static/css/create.css">
	<script>
		window.onload = function(){
			document.getElementById("logout_button").onclick = function () {window.location.href='./login.php'};
			document.getElementById("submit_ticket_button").onclick = function () {window.location.href='./home.php'};
		}
	</script>
</head>
<body>
	<div id="create_ticket_menu">
		<h1>Create Ticket</h1>
		<form action="email.php" method="post">
			<div id="create_table">
				<table> <!-- parts id, date created, device brand, device serial no -->
					<tr>
						<td><input type="text" name="name" value=""> <br> Customer Name</td>
						<td><input type="text" name="email" value=""> <br> Customer Email</td>
						<td><input type="text" name="description" value=""> <br> Brief Description</td>
					</tr>
					<tr>
						<td><input type="text" name="technician" value=""> <br> Assigned Technician</td>
						<td><input type="range" min="1" max="5" value="3" class="slider" id="priority_range"> <br> Priority</td>
						<td><textarea rows="10" cols="50"></textarea></td>
					</tr>
				</table>
			</div>
		<input type="submit">
		</form>
	</div>
	<div id="create_footer">
		<button id="logout_button">Logout</button>
	</div>
</body>
</html>
