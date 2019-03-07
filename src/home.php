<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home | tickIT</title>
	<link rel="stylesheet" type="text/css" href="./static/css/home.css">
	<script>
		window.onload = function(){
			document.getElementById("logout_button").onclick = function () {window.location.href='./login.php'};
			document.getElementById("create_ticket_button").onclick = function () {window.location.href='./create.php'};
		}
		function goto_update_ticket(){
			window.location.href='./edit.html'
		}
	</script>
</head>
<body>
	<div id="home_banner">
		<?php
			echo("Greetings " . $_SESSION["username"]);
		?>
	</div>
	<div id="home_sidebar">
		<button id="create_ticket_button">Create Ticket</button>
		<?php
			if($_SESSION["user_type"] == "admin"){
				echo("<button id='manage_technician_button'>Manage Technicians</button>");
			}
		?>
	</div>
	<div id="home_main">
		<table id="attribute_table">
			<tr><td><input type="checkbox" name="archived_tickets" value="Archived Tickets"> Archived Tickets<br></td></tr>
			<tr><td><input type="checkbox" name="range_search" value="Priority"> Priority<br></td></tr>
			<tr><td><input type="range" min="1" max="5" value="3" class="slider" id="priority_range"></td></tr>
			<tr><td><input type="text" name="ticket_table_search" value=""></td></tr>
			<tr><td><input type="submit" name="ticket_table_search_submit" value="Search"></td></tr>
		</table>
		<div id="ticket_table_div">
			<table id="ticket_table">
				<tr>
					<th>Ticket ID</th>
					<th>Description</th>
				</tr>
				<?php
					$tableValue = "<tr><td>TICKIT ID HERE</td><td>TICKIT ISSUE DESCRIPTION HERE</td></tr>";
					$spoofArray = array_fill(0, 20, $tableValue);
				?>
				<?php
					foreach($spoofArray as $item){
						echo($item);
					}
				?>
			</table>
		</div>
	</div>
	<div id="home_footer">
		<button id="logout_button">Logout</button>
	</div>
</body>
</html>
