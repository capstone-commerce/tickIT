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
	<title>Account | tickIT</title>
	<link rel="stylesheet" type="text/css" href="./static/css/settings.css">
	<script>
		window.onload = function(){
			document.getElementById("home_button").onclick = function () {window.location.href='./home.php'};
		};
	</script>
</head>
<body>
	<div id="settings_banner">
	</div>
	<div id="settings_sidebar">
		<button id="home_button">Home</button>
	</div>
	<div id="settings_main">
		<ul>
			<li>TODO:</li>
			<li>Change password</li>
			<li>Change email</li>
			<li>Change Phone</li>
		</ul>
	</div>
	<div id="home_footer">
		<form id="logout_button" action="logout.php">
			<input type="submit" name="logout" value="logout"/>
		</form>
	</div>
</body>
</html>
