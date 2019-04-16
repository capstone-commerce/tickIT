<?php session_start(); require('dbconnect.php');
	//checking if user was authenticated by checking if they have a usertype
	if(!isset($_SESSION["user_type"])){
		echo("user_type is NOT set");
		header("Location: ./login.php");
		exit();
	}
	//redirects to home if the user's type is not admin
	if($_SESSION["user_type"] != "Administrator"){
		header("Location: ./home.php");
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Technicians | tickIT</title>
	<link rel="stylesheet" type="text/css" href="./static/css/manage.css">
	<script>
		window.onload = function(){
			document.getElementById("home_button").onclick = function () {window.location.href='./home.php'};
			document.getElementById("create_tech_button").onclick = function () {window.location.href='./create_account.php'};
		};
	</script>
</head>
<body>
	<div id="manage_banner">
		<h2>Manage Technicians</h2>
		<button id="home_button">Home</button>
		<button id="create_tech_button">Create Account</button>
	</div>
	<div id="manage_main">
		<table id="tech_table">
			<tr><td><h3>Users</h3></td><td><h3>Role</h3></td></tr>
			<?php
				$queueQuery = "select username, role from Users where role='Administrator'";
				$Array = mysqli_query($CSDB, $queueQuery);
				while($row = mysqli_fetch_assoc($Array)){
					echo("<tr><td>" . $row["username"] . "</td><td>" . $row["role"] . "</td></tr>");
				}
			?>
			<?php
				$queueQuery = "select username, role from Users where role='Technician'";
				$Array = mysqli_query($CSDB, $queueQuery);
				while($row = mysqli_fetch_assoc($Array)){
					echo("<form action='managetech.php' method='post' <tr><td>" 
					. $row["username"] . "</td><td>" . $row["role"] . "</td><td>"
					. "<input type='hidden' value=" . $row["username"] . " name='username'/>"
					. "<input type='submit' id='manage_tech_button' value='Manage'/></td></tr> </form>");
				}
			?>
		</table>
	</div>
	<div id="manage_footer">
		<form id="logout_button" action="logout.php">
			<button id="logout_button">Logout</button>
		</form>
	</div>
</body>
</html>
