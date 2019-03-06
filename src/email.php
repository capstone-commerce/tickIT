<html>
<body>

Email sent to <?php echo $_POST["email"]; ?>

<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
require '../vendor/autoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "iwhitese@kent.edu";
//Password to use for SMTP authentication
$mail->Password = "Mezcal12345";
//Set who the message is to be sent from
$mail->setFrom('iwhitese@kent.edu', 'tickIT');
//Set an alternative reply-to address
$mail->addReplyTo('iwhitese@kent.edu', 'tickIT');
//Set who the message is to be sent to
//$mail->addAddress('iwhitese@kent.edu', 'John Doe');
$mail->addAddress($_POST['email'], $_POST['name']);
//Set the subject line
$mail->Subject = "Your tickIT for" . ' [' . $_POST['description'] . '] ';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
//Replace the plain text body with one created manually
$mail->Body = 'Greetings ' . $_POST['name'] . ',' . "\n" . "\t" . 'A technician has created a tickIT for your issue [' . $_POST['description'] . '].' . "\n" . 'You can expect email updates from this address on the progress of your tickIT.';
$mail->AltBody = 'ERROR: altbody message sent.';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>
</body>
</html
