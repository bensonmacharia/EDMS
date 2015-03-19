<?php
include("session.php");
include("connection.php");
if(!(isset($_SESSION['login_user'])&&$_SESSION['login_user']!=""))
{
    header("Location:index.php");
}

$code=$_GET['code'];


$data = mysqli_query($connection,"select * FROM downloads WHERE code='$code'");
while($row = mysqli_fetch_array($data))
 { 
 $email = $row['email'];
 $fname = $row['fname'];
 $filename = $row['title'];
 $link = 'http://localhost/edms/download.php?code='.$code; 
   $y= mysqli_query($connection,"update downloads SET approved = 1 WHERE code='$code'");
    if($y){
           require("PHPMailer-master/PHPMailerAutoload.php"); //or select the proper destination for this file if your page is in some   //other folder
           ini_set("SMTP","ssl://smtp.gmail.com"); 
           ini_set("smtp_port","465"); //No further need to edit your configuration files.
           $mail = new PHPMailer();
           $mail->SMTPAuth = true;
           $mail->Host = "smtp.gmail.com"; // SMTP server
           $mail->SMTPSecure = "ssl";
           $mail->Username = "muchokibenson12@gmail.com"; //account with which you want to send mail. Or use this account. i dont care :-P
		   $mail->From = "muchokibenson12@gmail.com";
           $mail->FromName = "Electronic Documents Management System (EDMS) Administrator";
           $mail->Password = "28624259"; //this account's password.
           $mail->Port = "465";
           $mail->IsSMTP();  // telling the class to use SMTP
           $rec1=$email; //receiver. email addresses to which u want to send the mail.
           $mail->AddAddress($rec1);
           $mail->Subject  = "EDMS: Download Link";
           $mail->Body     = 'Hello '.$fname.','."\r\n".'This is the dowload link for the earlier requested document:'."\r\n".$link."\r\n".'Thanks'."\r\n".'Benson Macharia - Communications Assistant (ICRAF)';
           $mail->WordWrap = 200;
           $mail->SMTPDebug = 4;
              if(!$mail->Send()) {
                  echo 'Message was not sent! Check your network connection and try again.';
                  //echo 'Mailer error: ' . $mail->ErrorInfo;
                           } 
              else {
         echo "<script>alert(\"Document approved!.\");</script>";
	     echo "<script>location.href=\"home.php\";</script>";
            } 
}
}
?>
