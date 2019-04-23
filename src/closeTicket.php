<?php
  session_start();
  include("authenticate_session.php");
  require("dbconnect.php");
  
    if($_POST["amount"] == "" || $_POST["charges"] == "" || $_POST["pay_method"] == ""){
      $_SESSION["transactionMSG"] = "Please fill out required fields (*)";
      header("Location: ./transaction.php");
      exit();
    }else{
    
      $amount = filter_var($_POST["amount"], 515);
      $charges = filter_var($_POST["charges"], 515);
      $payMethod = filter_var($_POST["pay_method"], 515);
      $Notes = filter_var($_POST["additionalNotes"], 515);
      
      $ticket_info = "select * from Tickets where ticket_number = ".$_SESSION["ticket_number"].";";
      $retval = mysqli_query($CSDB, $ticket_info);
        
      $infoArray = mysqli_fetch_assoc($retval);
      $ticket_Number = $infoArray["ticket_number"];
      $customer_name = $infoArray["customer_name"];
      $customer_email = $infoArray["customer_email"];
      $issue = $infoArray["issue"];
      $urgency = $infoArray["urgency"];
      $comments = $infoArray["comments"];
      $username = $infoArray["username"];
      $device_brand = $infoArray["device_brand"];
      $device_serial = $infoArray["device_serialNumber"];
      $transactionID = $infoArray["transactionID"];
      
      $datePaid = date("Y-m-d");
      //echo $datePaid;
      
      
      $TransactionQuery = "update Transaction_History set amount='$amount', charges='$charges', payment_method='$payMethod', notes='$Notes', status = 'Paid', date_of_payment = '$datePaid' where transactionID = ".$infoArray['transactionID'].";";
      
      $retval= mysqli_query($CSDB, $TransactionQuery);
      
      $ArchivedData = "INSERT INTO Archived". "(ticket_number, customer_name, customer_email, issue, urgency, comments, username, status, date_finished, device_brand, device_serialNumber, transactionID) VALUES ". "($ticket_Number, '$customer_name', '$customer_email', '$issue', $urgency, '$comments', '$username', 'Closed', '$datePaid', '$device_brand', '$device_serial', $transactionID);";
      
      
      $retval = mysqli_query($CSDB, $ArchivedData);
      
      
      
      $deleteTicket = "delete from Tickets where ticket_number=".$infoArray['ticket_number'].";";
      
      $retval = mysqli_query($CSDB, $deleteTicket);
      
      header("Location: ./home.php");
      exit;
      mysqli_close($CSDB);
  }
  
  
    
 

      
