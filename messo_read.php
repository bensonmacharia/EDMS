
<?php
include("session.php");
include("connection.php");
if(!(isset($_SESSION['login_user'])&&$_SESSION['login_user']!=""))
{
    header("Location:index.php");
}

$id=$_GET['messo'];


$data = mysqli_query($connection,"select * FROM messages WHERE mess_id='$id'");
while($row = mysqli_fetch_array($data))
 { 
   $y= mysqli_query($connection,"update messages SET isread = 1 WHERE mess_id='$id'");
    if($y){
         echo "<script>alert(\"Message read! Back Home.\");</script>";
	     echo "<script>location.href=\"home.php\";</script>";
          }
}
?>