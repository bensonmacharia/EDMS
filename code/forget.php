<?php
session_start(); // Starting Session
include("connection.php");
$error=''; // Variable To Store Error Message
 if (isset($_POST['submit'])) {
    if (empty($_POST['email'])) {
      $error = "Email must NOT be empty";
      }
   else
      {
        // Define $email
        $email=$_POST['email'];
        //To protect MySQL injection for Security purpose
        $email= stripslashes($email);
        $email = mysql_real_escape_string($email);
        // Establishing Connection with Server by passing server_name, user_id and password as a parameter

        // SQL query to fetch information of registerd users and finds user match.
        $query = mysqli_query($connection,"select * from users where email='$email'", $connection);
		$result = mysqli_fetch_array($query);
		  
		  if(count($result)>=1)
		     {
			   //$encrypt = md5(1290*3+results ['id']);
			   // Please specify your Mail Server - Example: mail.example.com.
               ini_set("SMTP","smtp.gmail.com");
              // Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
               ini_set("smtp_port","465");
               // Please specify the return address to use
               ini_set('sendmail_from', 'muchokibenson12@gmail.com');
			   
			   $message = "Your password reset link send to your email address.";
			   $to = $email;
			   $subject = "Forget password";
			   $from = 'muchokibenson12@gmail.com';
			   $body = 'Hi, your password is: ';
			   $headers = "From: " .strip_tags($from) . "\r\n";
			   $headers .= "Reply-To: " .strip_tags($from) . "\r\n";
			   $headers .= "MIME-Version: 1.0\r\n";
			   $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			   
			   mail($to,$subject,$body,$headers);
			   //ini_set(mail);
              }
        else {
               $error = "Account not found, please sign up.";
              }
    mysqli_close($connection);// Closing Connection
   }
 }
?>