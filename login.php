<?php
session_start(); // Starting Session
include("connection.php");
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) 
    {
       if (empty($_POST['email']) || empty($_POST['password'])) 
	     {
        $error = "Email or Password must NOT be empty";
         }
       else
         {
// Define $email and $password
$email=$_POST['email'];
$password=$_POST['password'];
// To protect MySQL injection for Security purpose
$email= stripslashes($email);
$password = stripslashes($password);
$email = mysql_real_escape_string($email);
$password = mysql_real_escape_string($password);

// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($connection,"select * from users WHERE confirmed='1' AND email='$email' AND password=md5('$password')");
$rows = mysqli_num_rows($query);
$row=mysqli_fetch_array($query);
if ($rows == 1) {
      $_SESSION['login_user']= $email; // Initializing Session
 $type=$row['class'];
	  //Monitor user Activity
	  date_default_timezone_set('Africa/Nairobi');
	  $last_seen = date('Y-m-d H:i:s');
      $query = "UPDATE users SET last_login = '" . $last_seen . "' WHERE email = '" . $email . "'";
	      if(mysqli_query($query))
             {
			   switch ($type) {
               case 'Administrator':
               header('Location:home.php'); // Redirecting To Other Page
               continue;
               case 'Technician':
               header('Location:home.php'); // Redirecting To Other Page
               continue;
			   case 'Librarian':
               header('Location:home.php'); // Redirecting To Other Page
               continue;
			   case 'Guest':
               header('Location:home.php'); // Redirecting To Other Page
               break;
                  }
	       
	          }
     }   
else {
      echo "<script>alert(\"Email or Password is invalid! Try again.\");</script>";
	  echo "<script>location.href=\"index.php\";</script>";
//$error = "Email or Password is invalid or account not yet activated!";
}
mysqli_close($connection); // Closing Connection
}
}
?>
