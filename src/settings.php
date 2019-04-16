<?php session_start(); require('dbconnect.php');
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
	<title>Account | tickIT</title>
	<link rel="stylesheet" type="text/css" href="./static/css/settings.css">
	<script>
		window.onload = function(){
			document.getElementById("home_button").onclick = function () {window.location.href='./home.php'};
			document.getElementById("edit_account_button").onclick = function () {window.location.href='./edit_account.php'};
		};
	</script>
</head>
<body>
	<div id="settings_banner">
		<h2><?php echo($_SESSION['username']); ?> Account Settings</h2>
	</div>
	<div id="settings_sidebar">
		<button id="home_button">Home</button>
	</div>
	<div id="settings_main">
		<?php
			$username = $_SESSION['username'];
			$queueQuery = "select email, phone_number, department, role, locked from Users where username = '$username'";
			$Array = mysqli_query($CSDB, $queueQuery);
		?>
	<table>
		<th>User<td>Email</td><td>Phone</td><td>Department</td><td>Role</td><td>Locked Status</td><td><input id="edit_account_button" type="submit" value="Edit"/></td></th>
		<?php
			while($row = mysqli_fetch_assoc($Array)){
				echo("<tr><td>" . $username . " " . "</td><td>" . $row["email"] . " " 
				. "</td><td>" . $row["phone_number"] . " " . "</td><td>" . $row["department"] . " " 
				 . "</td><td>" . $row["role"] . " " . "</td><td>" . "Locked: " . $row["locked"] . "</td></tr>");
			}
		?>
	</table>
	</div>
	<div id="home_footer">
		<form id="logout_button" action="logout.php">
			<input type="submit" name="logout" value="logout"/>
		</form>
	</div>
</body>
</html>
