
<?php
include("session.php");
include ("connection.php");
if(!(isset($_SESSION['login_user'])&&$_SESSION['login_user']!=""))
{
    header("Location:index.php");
}

$email=$_GET['email'];

$data = mysqli_query("select * FROM users WHERE email='$email'");
while($row = mysqli_fetch_array($connection,$data))
 { 
   $y= mysqli_query("update users SET confirmed = 1 WHERE email='$email'");
    if($connection,$y){
         echo "<script>alert(\"User approved! Back Home.\");</script>";
	     echo "<script>location.href=\"home.php\";</script>";
          }
	else{
	     echo "<script>alert(\"Approval was unsuccessful! Try again.\");</script>";
	     echo "<script>location.href=\"home.php\";</script>";
        } 
}
?>