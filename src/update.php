<?php 
  session_start();
  require("dbconnect.php");
  include("authenticate_session.php");
  $issueEdit;
  $editQuery;
  $Update;
  $notesEdit;
  $assigneeEdit;
  
  $ticket_number = $_SESSION["ticketNum"];
  
  if(isset($_POST["submitEdit"])){
    if(isset($_POST["editIssue"]) && $_POST["editIssue"] != ""){
      $issueEdit = filter_var($_POST["editIssue"], 515);
      $editQuery = "update Tickets set issue = '$issueEdit' where ticket_number = '$ticket_number';";
      $Update = mysqli_query($CSDB, $editQuery);
    }
  
    if(isset($_POST["editNotes"]) && $_POST["editNotes"] != ""){
      $notesEdit = filter_var($_POST["editIssue"], 515);
      $editQuery = "update Tickets set comments = '$notesEdit' where ticket_number = '$ticket_number';";
      $Update = mysqli_query($CSDB, $editQuery);
    }
  
    if(isset($_POST["editAssignee"]) && $_POST["editAssignee"] != ""){
       $assigneeEdit = filter_var($_POST["editAssignee"], 515);
       $editQuery = "update Tickets set username = '$assigneeEdit' where ticket_number = '$ticket_number';";
       $Update = mysqli_query($CSDB, $editQuery);
    }
  
    $priorityEdit = $_POST["editUrgency"];
    $editQuery = "update Tickets set urgency = '$priorityEdit' where ticket_number = '$ticket_number';";
    $Update = mysqli_query($CSDB, $editQuery);

  if(isset($_POST["email_customer"]) && ($_POST["email_customer"] == 'Yes')){
	$update_query = "SELECT * FROM Tickets WHERE ticket_number='$ticket_number'";
	$update_sql = mysqli_query($CSDB, $update_query);
	$update_row = mysqli_fetch_assoc($update_sql);
	$_SESSION['edit_assignee'] 	= $update_row['username'];
	$_SESSION['edit_notes'] 	= $update_row['comments'];
	$_SESSION['edit_issue'] 	= $update_row['issue'];
	$_SESSION['message_type']	= "ticket_updated";
	mysqli_close($CSDB);
	header("Location: ./email.php");
	exit;
  } else {
    mysqli_close($CSDB);
    header("Location: ./home.php");
    exit;
  }
  }

?>
  
