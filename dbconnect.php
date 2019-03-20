<?php
//Azure database parameters
 $servername = "tickitdb.database.windows.net";  // if you run on local server the name is "localhost:3306". If you run on cs server, use only "localhost"
$username = "tickITAdmin";
$password = "tickitpassword_1";
$dbname = "tickIT DB";

// Create connection to Azure database
$AzureDB = new mysqli($servername, $username, $password, $dbname);
    
//Test to see if connection was successful	
 if(! $AzureDB ){
    die('Could not connect: ' . mysqli_error($AzureDB));
  }
  
//Localhost database parameters
 $servername2 = "localhost:3306";
 $username2 = "root";
 $password2 = "root";
 $dbname2 = "tickIT_db";
 
 $LocalDB = new mysqli($servername2, $username2, $password2, $dbname2);
 
 //test to see if connection was successful
 if(! $LocalDB){
	 die('Could not connectL ' . mysqli_error($LocalDB)
 }
 
 //initialize buffer for Azure connection failure
 $SqlBuffer = array();
 $SqlBufferIndex = 0;
?>