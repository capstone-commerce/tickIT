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
	<title>Create Ticket | tickIT</title>
	<link rel="stylesheet" type="text/css" href="./static/css/manage.css">
	<script>
		window.onload = function(){
			document.getElementById("home_button").onclick = function () {window.location.href='./home.php'};
		};
	</script>
</head>
<body>
	<div id="manage_main">
		<p>this is the super cool manage page for admins</p>
		<p>needs:
		<ul>
			<li>technician account creation</li>
			<li>technician account deletion</li>
			<li>transfering administrator privleges (keep in mind:only ONE admin at a time)</li>
		</ul>
		</p>
	</div>
	<div id="manage_footer">
		<button id="home_button">Home</button>
	</div>
</body>
</html>
