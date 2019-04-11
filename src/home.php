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
			document.getElementById("create_ticket_button").onclick = function () {window.location.href='./create.php';};
			document.getElementById("manage_technician_button").onclick = function () {window.location.href='./manage.php';};
			document.getElementById("settings_button").onclick = function () {window.location.href='./settings.php';};
		}
		function goto_update_ticket(/*$ticketNum*/){
			//$_SESSION["update_ticketNum"] = $ticketNum;
			window.location.href='./edit.php'
		        //header("Location: ./edit.php");
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
		<button id="settings_button">Account Settings</button>
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
				        <th>Date Created</th>
          				<th>Urgency</th>
		<?php
          		require("dbconnect.php");
			//pull info from DB and populate home's table
        		if($_SESSION["user_type"] == "Technician"){
            			echo "</tr>";
				$techName = $_SESSION["username"];
            			$queueQuery = "select ticket_number, issue, date_created, urgency from Tickets where username='$techName';";
            			$Array = mysqli_query($CSDB, $queueQuery);
				while($row = mysqli_fetch_assoc($Array)){
               				echo '<tronclick="goto_update_ticket('.$row["ticket_number"].');">';
               				echo "<td>" . $row["ticket_number"] . "</td><td>" . $row["issue"] . "</td><td>" . $row["date_created"] . "</td><td>" . $row["urgency"] . "</td>";
               				//echo "<td><form method='POST' action='edit.php'><input type='submit' value='Edit'
               				echo "</tr>";
            			}
          		}else if($_SESSION["user_type"] == "Administrator"){
            			echo "<th>Assignee</th></tr>";
             			$queueQuery = "select ticket_number, issue, date_created, urgency, username from Tickets;";
             			$Array = mysqli_query($CSDB, $queueQuery);
				while($row = mysqli_fetch_assoc($Array)){
               				echo '<tr onclick="goto_update_ticket('.$row["ticket_number"].');">';
               				echo "<td>" . $row["ticket_number"] . "</td><td>" . $row["issue"] . "</td><td>" . $row["date_created"] . "</td><td>". $row["urgency"]."</td><td>". $row['username']."</td>";
               				echo "</tr>";
           			}
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
