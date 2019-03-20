
<?php session_start();
   require('dbconnect.php');?>
<?php

 $_SESSION["username"] = $_POST["username"];
 $_SESSION["password"] = $_POST["password"];

 $sessionUser = filter_var($_POST["username"], FILTER_SANATIZE_STRING);
 $sessionPass = filter_var($_POST["password"], FILTER_SANATIZE_STRING);
 $sessionID = (int)$sessionUser + time();
 $lastLogin = date('Y-m-d');
 $retval;
 
//checks to see if user is in the database
 if($AzureDB){
    $sessionSQL = 'select * from Users where username = ' . $sessionUser . ' and password = ' . $sessionPass . ';';
    $retval = mysqli_query($AzureDB, $sessionSQL);
}else if($LocalDB){
    $sessionSQL = 'select * from Users where username = ' . $sessionUser . ' and password = ' . $sessionPass . ';';
    $retval = mysqli_query($AzureDB, $sessionSQL);  
}else{
    die('Critical Error, Contact System administrator').mysqli_error($AzureDB);
    die('Critical Error, Contact System administrator').mysqli_error($LocalDB);
}
//if a query was received
//query to insert into session table
$SessionInsert = 'insert into Session values(‘$sessionID’, ‘$sessionUser’, ‘$lastLogin’);';

if($retval){
    //if connected to both DBs
    if($AzureDB && $LocalDB){
        $retval2 = mysqli_query($AzureDB, $SessionInsert);
        $retval3 = mysqli_query($LocalDB, $SessionInsert);
    //if only connection to Azure is dropped, add query to buffer
    }else if( ! $AzureDB && $LocalDB){
                $retval2 = mysqli_query($LocalDB, $SessionInsert);
        $SqlBuffer[$SqlBufferIndex++] = $SessionInsert;
    }else{
        die('Critical Error, contact system administrator').mysqli_error($AzureDB);
        die('Critical Error, contact system administrator').mysqli_error($LocalDB);
    }


    if($retval['role'] == 'Administrator'){
        $_SESSION['user_type'] = 'Administrator';
    }else if ($retval['role'] == 'Technician'){
        $_SESSION['user_type'] = 'Technician';
    }
    
    header("Location: ./home.php");
exit();
}else{
    echo("Failed to authenticate, redirecting to login...");
      //header("refresh: 3; url= ./login.php");
      exit();
}

/*
 //spoof login info below until DB is implemented
 $spoofAdminUsername = "admin";
 $spoofAdminPassword = "password";
 $spoofAdminUsertype = "admin";
 $spoofTechUsername = "tech";
 $spoofTechPassword = "password";
 $spoofTechUsertype = "tech";
 if((($_SESSION["username"] == $spoofAdminUsername) and ($_SESSION["password"] == $spoofAdminPassword)) or
 (($_SESSION["username"] == $spoofTechUsername)) and ($_SESSION["password"] == $spoofTechPassword)){
  switch($_SESSION["username"]){
   case "admin": $_SESSION["user_type"] = $spoofAdminUsertype; break;
   case "tech": $_SESSION["user_type"] = $spoofTechUsertype; break;
  }
  header("Location: ./home.php");
  exit(); //good practice to exit() after redirect, to ensure below code does not execute
 } else {
  echo("Failed to authenticate, redirecting to login...");
  header("refresh: 3; url= ./login.php");
  exit();
 }
*/
?>
