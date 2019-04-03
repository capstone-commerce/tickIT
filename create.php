<?php session_start();

	//checking if user was authenticated by checking if they have a usertype
	if(!isset($_SESSION["user_type"])){
		echo("user_type is NOT set");
		header("Location: ./login.php");
		exit();
	}

?>
<?php
	require('dbconnect.php');
		if(isset($_POST['add'])) {
            
            if(! get_magic_quotes_gpc() ) {
               $c_name = addslashes ($_POST['c_name']);
               $t_name = addslashes ($_POST['t_name']);
            } else {
               $c_name_name = $_POST['c_name'];
               $t_dept = $_POST['t_name'];
            }

            $c_email = $_POST['c_email'];
            $description = $_POST['description'];
			
			// sql query to add the info to Tickets table
			// figure this out
			// does not work
            $sql = "INSERT INTO Create Tickets". 
               "(ID,name, dept_name, salary) "."VALUES ".
               "('$i_ID','$i_name','$i_dept', '$i_salary')";
            
			//mysqli_select_db($conn,'university');
            $retval = mysqli_query($conn, $sql);
         
            if(! $retval ) {
               die('Could not enter data: ' . mysqli_error($conn));
            }
         
            echo "Entered data successfully\n";
			
			
            mysqli_close($conn);
         }  
		 else {



?>


<!DOCTYPE html>
<html>
<head>
	<title>Create Ticket | tickIT</title>
	<link rel="stylesheet" type="text/css" href="./static/css/create.css">
	<script>
		window.onload = function(){
			document.getElementById("home_button").onclick = function () {window.location.href='./home.php'};
		};
	</script>
</head>
<body>
	<div id="create_ticket_menu">
		<h1>Create Ticket</h1>
		<form action="email.php" method="post">
			<div id="create_table">
				<table>
					<tr>
						<td><input type="text" name="name" value=""> <br> Customer Name</td>
						<td><input type="text" name="email" value=""> <br> Customer Email</td>
						<td><input type="text" name="description" value=""> <br> Brief Description</td>
					</tr>
					<tr>
						<td><input type="text" name="technician" value=""> <br> Assigned Technician</td>
						<td><input type="range" min="1" max="5" value="3" class="slider" id="priority_range"> <br> Priority</td>
						<td><textarea name="notes" rows="10" cols="50"></textarea></td>
					</tr>
				</table>
			</div>
		<input type="submit">
		</form>
	</div>
	<div id="create_footer">
		<button id="home_button">Home</button>
	</div>
</body>

<?php
}
?>

</html>
