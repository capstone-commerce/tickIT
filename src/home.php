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
	<title>Home | tickIT</title>
	<link rel="stylesheet" type="text/css" href="./static/css/home.css">
	<script>
		window.onload = function(){
			document.getElementById("create_ticket_button").onclick = function () {window.location.href='./create.php'};
			document.getElementById("manage_technician_button").onclick = function () {window.location.href='./manage.php'};
		}
		function goto_update_ticket(){
			window.location.href='./edit.php'
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
			if($_SESSION["user_type"] == "Administrator"){
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

					//pull info from DB and populate home's table

					$spoofTicketID = 000000001;
					$spoofTicketDesc = "Install adware";
					$spoofTicketPatron = "Jim";
					$spoofTicketDate = "MAR-14-2019";
					//spoof array for tickets on home.php
					$spoofArray = array(
//					"<tr onclick='goto_update_ticket();'><td>".$spoofTicketID."</td><td>".$spoofTicketDesc."</td></tr>","
					"<tr onclick='goto_update_ticket();'><td>000000002</td><td>I lost my dog</td></tr>",
					"<tr onclick='goto_update_ticket();'><td>000000003</td><td>Broken Laptop</td></tr>");

					foreach($spoofArray as $item){
						echo($item);
					}
				?>
			</table>
		</div>
	</div>
	<div id="home_footer">
		<form id="logout_button" action="logout.php">
			<input type="submit" name="logout" value="logout"/>
		</form>
	</div>
</body>
</html>
