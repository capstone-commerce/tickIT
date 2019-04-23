<?php
	session_start();
	include("authenticate_session.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Ticket | tickIT</title>
	<link rel="stylesheet" type="text/css" href="./static/css/edit.css">
	<script>
		window.onload = function(){
		      document.getElementById("home_button").onclick = function () {window.location.href='./home.php'};
			document.getElementById("submit_ticket_button").onclick = function () {window.location.href='./transaction.php'};
		}
	</script>
</head>
<body>
	<div id="home_banner">
	</div>
 <div id="settings_sidebar">
		<button id="home_button">Home</button>
    <button id="submit_ticket_button">Close Ticket</button>
	</div>
	<div id="edit_main">

		<h1>Description of Ticket</h1>

		<div id="ticket_info">
    <?php
      require("dbconnect.php");
      $ticket_number = $_POST["ticketNum"];
      $_SESSION["ticketNum"] = $_POST["ticketNum"];
      $infoQuery = "select * from Tickets where ticket_number='$ticket_number';";
      $ticketInfo = mysqli_query($CSDB, $infoQuery);
      $updateArray = mysqli_fetch_assoc($ticketInfo);
			echo "<b>| Ticket info |</b>";
      echo "<table id = 'ticket info table' width='800'>";
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
        echo "<tr>";
          echo "<th>Issue</th>";
          echo "<th>Urgency</th>";
        echo "</tr>";
        echo "<tr>";
          echo "<td>".$updateArray["issue"]."</td>";
          echo "<td>".$updateArray["urgency"]."</td>";
        echo "</tr>";
        echo "<tr>";
          echo "<th>Status</th>";
          echo "<th>Device Brand</th>";
        echo "</tr>";
        echo "<tr>";
          echo "<td>".$updateArray["status"]."</td>";
          echo "<td>".$updateArray["device_brand"]."</td>";
        echo "</tr>";
        echo "<tr>";
          echo "<th>Device Serial #</th>";
          if($_SESSION["user_type"] == "Administrator"){
            echo "<th>Assignee</th>";
          }
        echo "</tr>";
        echo "<tr>";
          echo "<td>".$updateArray["device_serialNumber"]."</td>";
          if($_SESSION["user_type"] == "Administrator"){
            echo "<td>".$updateArray["username"]."</td>";
          }
        echo "</tr>";
        echo "<tr>";
          echo "<th>Notes</th>";
        echo "</tr>";
        echo "<tr>";
          echo "<td>".$updateArray["comments"]."</td>";
        echo "</tr>";
      echo "</table>";
     mysqli_close($CSDB);
    ?>
		</div>

		<div id="ticket_info">
    <?php
			echo "<b>| Table of updates |</b>";
      echo "<form method='post' action='update.php'>";
      echo "<table width='800'>";
        echo "<tr>";
          echo "<th>Edit Issue</th>";
          echo "<th>Change Urgency level</th>";
        echo "</tr>";
        echo "<tr>";
          echo "<td><textarea rows='5' cols='40' name='editIssue'></textarea></td>";
          echo "<td><input type='range' min='1' max='9' value=".$updateArray["urgency"]." id='priority_range' name='editUrgency'>";
               echo "<br>Priority <span id = 'demo'></span></td>";
        echo "</tr>";
        echo "<tr>";
          echo "<th>Notes</th>";
          if($_SESSION["user_type"] == "Administrator"){
            echo "<th>Change Assignee</th>";
          }
        echo "</tr>";
        echo "<tr>";
          echo "<td><textarea rows='5' cols='40' name='editNotes'></textarea></td>";
          if($_SESSION["user_type"] == "Administrator"){
            echo "<td><input type='text' name='editAssignee'></td>";
          }
        echo "</tr>";
        echo "<tr>";
          echo "<td><input type ='checkbox' value='Yes' name='email_customer'>Email Customer This Update?</td>";
		$_SESSION['ticket_number'] = $updateArray["ticket_number"];
          echo "<td><input type ='submit' value='Update' name='submitEdit'></td>";
        echo "</tr>";
      echo "</table></form>";
      
    ?>
		</div>
   <script>
	    			var slider = document.getElementById("priority_range");
	    			var output = document.getElementById("demo");
	    			output.innerHTML = slider.value;
	    			slider.oninput = function() {
	        			output.innerHTML = this.value;
	    			}
    			</script>
	</div>
</body>
</html>
