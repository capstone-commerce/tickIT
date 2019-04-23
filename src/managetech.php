<?php
	session_start();
	require('dbconnect.php');
	include("authenticate_session.php");
	//redirects to home if the user's type is not admin
	if($_SESSION["user_type"] != "Administrator"){
		header("Location: ./home.php");
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo($_POST['username']); ?> | tickIT</title>
	<link rel="stylesheet" type="text/css" href="./static/css/managetech.css">
	<script>
		window.onload = function(){
			document.getElementById("home_button").onclick = function () {window.location.href='./home.php'};
		};
	</script>
</head>
<body>
	<?php
		$username = $_POST['username'];
		$queueQuery = "select email, phone_number, department, role, locked, last_login from Users where username = '$username'";
		$Array = mysqli_query($CSDB, $queueQuery);
	?>
	<div id="managetech_banner">
		<h2><?php echo($_POST['username']); ?></h2>
		<button id="home_button">Home</button>
		<?php
			echo("<form action='delete_user.php' method='post'>" . 
				"<input type='hidden' name='username_to_del' value=" . $username . ">" . 
				"<input type='submit' value='Delete User'>" . 
			"</form>");
		?>
	</div>
	<div id="managetech_main">
		<table id="tech_table">
			<th>User<td>Email</td><td>Phone</td><td>Department</td><td>Role</td><td>Locked Status</td><td>Last Login</td></th>
			<?php
				while($row = mysqli_fetch_assoc($Array)){
					echo("<tr><td>" . $username . " " . "</td><td>" . $row["email"] . " " 
					. "</td><td>" . $row["phone_number"] . " " . "</td><td>" . $row["department"] . " " 
					. "</td><td>" . $row["role"] . " " . "</td><td>" . "Locked: " . $row["locked"] . " " 
					. "</td><td>" . $row["last_login"] . "</td></tr>");
				}
			?>
		</table>
		<br><br>
		<table id="ticket_table">
			<th>THIS WILL BE THE TICKET HISTORY TABLE FOR <?php echo($username); ?></th>
			<tr><td>ticket 1</td></tr>
		</table>
	</div>
	<div id="managetech_footer">
		<form id="logout_button" action="logout.php">
			<button id="logout_button">Logout</button>
		</form>
	</div>
</body>
</html>
