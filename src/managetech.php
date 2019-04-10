<?php session_start();
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
	<title><?php echo("[TECHNICIAN ACCOUNT NAME]"); ?> | tickIT</title>
	<link rel="stylesheet" type="text/css" href="./static/css/managetech.css">
	<script>
		window.onload = function(){
			document.getElementById("home_button").onclick = function () {window.location.href='./home.php'};
		};
	</script>
</head>
<body>
	<div id="managetech_banner">
		<h2>Manage Technicians</h2>
		<button id="home_button">Home</button>
	</div>
	<div id="managetech_main">
		<table id="tech_table">
			<tr id="tech_table_header"><td><h3><?php echo("TECHNICIAN"); ?></h3></td></tr>

		</table>
	</div>
	<div id="managetech_footer">
		<form id="logout_button" action="logout.php">
			<button id="logout_button">Logout</button>
		</form>
	</div>
</body>
</html>
