<?php 
  session_start();
  require("dbconnect.php");
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
  
    mysqli_close($CSDB);
    header("Location: ./home.php");
    exit;
  }

?>
  