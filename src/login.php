<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login | tickIT</title>
	<link rel="stylesheet" type="text/css" href="./static/css/login.css">
	<script>
		//window.onload = function(){
		//	document.getElementById("login_button").onclick = function () {window.location.href='./home.php'};
		//}
	</script>
</head>
<body>
	<div id="login_banner">
		<h1>tickIT</h1>
		<p>Smarter Ticketing</p>
	</div>
	<div id="login_input">
		<form action="authenticate.php" method="post">
			Username<input type="text" name="username" value=""> <br>
			Password<input type="text" name="password" value=""> <br>
			<input type="submit">
		</form>
	</div>
</body>
</html>