<?php
	session_start();
	include("authenticate_session.php");
	require('dbconnect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Ticket | tickIT</title>
	<link rel="stylesheet" type="text/css" href="./static/css/create.css">
	<script>
		window.onload = function(){
			document.getElementById("home_button").onclick = function () {window.location.href='./home.php'};
		};

	</script>
</head>
<body>
	<div id="create_ticket_menu">
		<h1>Create Ticket</h1>
		<form action="createTicket.php" method="post">
			<div id="create_table">
				<table>
					<tr>
						<td><?php
							$ticket_number_sql = "SELECT * FROM Tickets ORDER BY ticket_number DESC LIMIT 1";
							$ticket_number_query = mysqliquery($CSDB, $ticket_number_sql);
							?>
							<input type="text" name="name" value=""> <br> Customer Name</td>
						<td><input type="text" name="email" value=""> <br> Customer Email</td>
						<td><input type="text" name="subject" value=""> <br> Issue</td>
					</tr>
					<tr>
						<?php $technician = $_SESSION['username']; $_SESSION['message_type'] = "created_ticket";?>
						<td><input type="hidden" name="technician" value=<?php echo("$technician"); ?>></td>
						<td><input type="range" min="1" max="5" value="3" class="slider" id="priority_range"> <br>
							Urgency: <span id="demo"></span></td>
						<td><br> Comments: <textarea name="notes" rows="10" cols="50" maxlength="150"></textarea></td>
					</tr>
				<script>
				    	var slider = document.getElementById("priority_range");
				    	var output = document.getElementById("demo");
				    	output.innerHTML = slider.value;
				    	slider.oninput = function() {
		        			output.innerHTML = this.value;
					}
				</script>
				</table>
			</div>
			<input type="submit">
		</form>
	</div>
	<div id="home_banner">
	</div>
	<div id="create_footer">
		<button id="home_button">Home</button>
	</div>
</body>
</html>
