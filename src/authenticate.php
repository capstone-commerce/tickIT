<?php
session_start();
require("dbconnect.php");

if(isset($_POST["username"]) && isset($_POST["password"])){
     require("dbconnect.php");
     $_SESSION["username"] = filter_var($_POST["username"], 515);
     $_SESSION["password"] = filter_var($_POST["password"], 515);

     $sessionUser = filter_var($_POST["username"], 515);
     $sessionPass = filter_var($_POST["password"], 515);
     $sessionID = (int)$sessionUser + time();
     $lastLogin = date('Y-m-d');
     $retval;
 
 
//checks to see if user is in the database

      $sessionSQL = "select * from Users where username = '$sessionUser' and password = '$sessionPass';";
      $retval = mysqli_query($CSDB, $sessionSQL);
      
      
      $rowArray = mysqli_fetch_assoc($retval);

      if($rowArray['role'] == 'Administrator'){
        $_SESSION['user_type'] = 'Administrator';
      }else if ($rowArray['role'] == 'Technician'){
        $_SESSION['user_type'] = 'Technician';
      }
      
      //echo 'login successful';
      //redirect to home
      header("Location: ./home.php");
      exit;
}else{
  echo("You did not enter your credentials properly, redirecting to login...");
  header("refresh: 3; url= ./login.php");
  exit;
}
  
?>
