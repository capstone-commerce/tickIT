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

		<h1>Description of Ticket</h1>

		<div id="ticket_info">
    <?php
      require("dbconnect.php");
      $ticket_number = $_POST["ticketNum"];
      $infoQuery = "select * from Tickets where ticket_number='$ticket_number';";
      $ticketInfo = mysqli_query($CSDB, $infoQuery);
      $updateArray = mysqli_fetch_assoc($ticketInfo);
			echo "<b>ticket info</b>";
      echo "<table id = 'ticket info table' width='1000'>";
        echo "<tr>";
          echo "<th>Ticket Number</th>";
          echo "<th>Date Created</th>";
        echo "</tr>";
        echo "<tr>";
          echo "<td>".$updateArray["ticket_number"]."</td>";
          echo "<td>".$updateArray["date_created"]."</td>";
        echo "</tr>";
        echo "<tr>";
          echo "<th>Customer Name</th>";
          echo "<th>Customer Email</th>";
        echo "</tr>";
        echo "<tr>";
          echo "<td>".$updateArray["customer_name"]."</td>";
          echo "<td>".$updateArray["customer_email"]."</td>";
        echo "</tr>";
      echo "</table>";
      mysli_close($CSDB);
     ?>

		</div>

		<div id="table_of_updates">

			<b>table of updates</b>
   
		</div>

	</div>

	<div id="edit_footer">

		<form id="logout_button" action="logout.php">

			<input type="submit" name="logout" value="logout"/>

		</form>

	</div>

</body>

</html>
