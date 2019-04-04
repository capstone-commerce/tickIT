<?php 
session_start();
require("dbconnect.php");

  if(isset($_POST["username"]) && isset($_POST["password"])){
     $_SESSION["username"] = $_POST["username"];
     $_SESSION["password"] = $_POST["password"];

     $sessionUser = $_POST["username"];//filter_var($_POST["username"], 515);
     $sessionPass = $_POST["password"];//filter_var($_POST["password"], 515);
     $sessionID = (int)$sessionUser + time();
     $lastLogin = date('Y-m-d');
     $retval;
 
     $query = "select * from users where username = '$sessionUser' and password = '$sessionPass';";
 
//checks to see if user is in the database

    if($CSDB){
      $sessionSQL = 'select * from Users where username = $sessionUser and password = $sessionPass;';
      $retval = mysql_query($CSDB, $sessionSQL);
    }else if($LocalDB){
      $sessionSQL = 'select * from Users where username = $sessionUser and password = $sessionPass;';
      $retval = mysql_query($CSDB, $sessionSQL);  
    }else{
      die('Critical Error, Contact System administrator').mysqli_error($CSDB);
      die('Critical Error, Contact System administrator').mysqli_error($LocalDB);
    }
//if a query was received
//query to insert into session table
    $SessionInsert = 'insert into Session values(‘$sessionID’, ‘$sessionUser’, ‘$lastLogin’);';
    $SessionInsert2 = 'insert into session values(‘$sessionID’, ‘$sessionUser’, ‘$lastLogin’);';

    if($retval){
    //if connected to both DBs
      if($CSDB && $LocalDB){
        $retval2 = mysql_query($CSDB, $SessionInsert);
        $retval3 = mysql_query($LocalDB, $SessionInsert2);
    //if only connection to Azure is dropped, add query to buffer
      }else if( ! $CSDB && $LocalDB){
        $retval2 = mysql_query($LocalDB, $SessionInsert2);
        $SqlBuffer[$SqlBufferIndex++] = $SessionInsert;
      }else{
        die('Critical Error, contact system administrator').mysqli_error($CSDB);
        die('Critical Error, contact system administrator').mysqli_error($LocalDB);
      }
  
	    $rowArray = mysqli_fetch_assoc($retval);

      if($rowArray['role'] == 'Administrator'){
        $_SESSION['user_type'] = 'Administrator';
      }else if ($rowArray['role'] == 'Technician'){
        $_SESSION['user_type'] = 'Technician';
      }
    
      header("Location: ./home.php");
      exit();
    }else{
      echo("Failed to authenticate, redirecting to login...");
      //header("refresh: 3; url= ./login.php");
      exit();
}else{
  echo("You did not enter your credentials properly, redirecting to login...");
  header("refresh: 3; url= ./login.php");
  exit();
}

  mysqli_close($CSDB);
  mysqli_close($LocalDB);
?>
