<?php
  session_start();
  require("dbconnect.php");
  
  if(isset($_POST["TransactionSubmit")){
    if(!isset($_POST["amount"]) || $_POST["amount"] == "" || !isset($_POST["charges"]) || $_POST["charges"] == "" || !isset($_POST["pay_method"]) || $_POST["pay_method"] == ""){
      header("Location: ./transaction.php");
      exit;
    }else{
      $amount = filter_var($_POST["amount"], 515);
      $charges = filter_var($_POST["charges"], 515);
      $payMethod = filter_var($_POST["pay_method"], 515);
      $Notes = filter_var($_POST["additionalNotes"], 515);
      
      
      $ticket_info = "select * from Tickets where ticket_number = '$_SESSION['ticketNum']';";
      $retval = mysqli_query($CSDB, $ticket_info);
      $infoArray = mysqli_fetch_assoc($retval);
      
      $TransactionQuery = "update Transaction_History set amount='$amount', charges='$charges', payment_method='$payMethod', notes='$Notes', status = 'Paid' where transactionID = '$inforArray['transactionID']';";
      
      $retval= mysqli_query($CSDB, $TransactionQuery);
      
      $datePaid = date("Y-m-d");
      
      $ArchivedData = "insert into Archived values($infoArray['ticket_number'], '$infoArray['customer_name']', '$infoArray['customer_email']', '$infoArray['issue']', $infoArray['urgency'], '$infoArray['comments']', '$infoArray['username'], 'Closed', '$datePaid', '$infoArray['device_brand']', '$infoArray['device_serialNumber']', $infoArray['transactionID']);";
      
      $retval = mysqli_query($CSDB, $ArchivedData);
      
      $deleteTicket = "delete from Tickets where ticket_number='$infoArray['ticket_number']';";
      
      $retval = mysqli_query($CSDB, $deleteTicket);
      
      header("Location: ./home.php");
      exit;
    }
}

      