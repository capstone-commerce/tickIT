<?php
	session_start();
	require("dbconnect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login | tickIT</title>
	<link rel="stylesheet" type="text/css" href="./static/css/login.css">
</head>
<body>
	<div id="login_banner">
	</div>
	<div id="login_input">
		<div id="login_security_section">
			
		</div>
		<form action="authenticate.php" method="post">
			<!-- Username<input type="text" name="username" value="" id="username"> <br> -->
			<?php
				$login_username = $_POST['username'];
				echo("$login_username" . "<br>");
				echo("<input type='hidden' name='username' value='$login_username'>");
			?>
			Password<input type="password" name="password" value="" id="password"> <br>
			<input type="submit" value="Login">
		</form>
	</div>
</body>
</html>

