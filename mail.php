<?php

require("PHPMailer-master/PHPMailerAutoload.php"); //or select the proper destination for this file if your page is in some   //other folder
ini_set("SMTP","ssl://smtp.gmail.com"); 
ini_set("smtp_port","465"); //No further need to edit your configuration files.
$mail = new PHPMailer();
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com"; // SMTP server
$mail->SMTPSecure = "ssl";
$mail->Username = "XXXXXX"; //account with which you want to send mail. Or use this account. i dont care :-P
$mail->Password = "XXXXXX"; //this account's password.
$mail->Port = "465";
$mail->IsSMTP();  // telling the class to use SMTP
$rec1="XXXXXX"; //receiver. email addresses to which u want to send the mail.
$mail->AddAddress($rec1);
$mail->Subject  = "Eventbook";
$mail->Body     = "Hello hi, testing";
$mail->WordWrap = 200;
$mail->SMTPDebug = 4;
if(!$mail->Send()) {
echo 'Message was not sent!.';
echo 'Mailer error: ' . $mail->ErrorInfo;
//phpinfo();
} else {
echo  //Fill in the document.location thing
'<script type="text/javascript">
   if(confirm("Your mail has been sent"))
   document.location = "/";
 </script>';
}
?>
