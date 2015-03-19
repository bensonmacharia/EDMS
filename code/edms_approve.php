
<?php
include("session.php");
include ("connection.php");
if(!(isset($_SESSION['login_user'])&&$_SESSION['login_user']!=""))
{
    header("Location:index.php");
}

$code=$_GET['code'];


$data = mysqli_query($connection,"select * FROM downloads WHERE code='$code'");
while($row = mysqli_fetch_array($data))
 { 
   $y= mysqli_query("update downloads SET approved = 1 WHERE code='$code'");
    if($connection,$y){
         echo "<script>alert(\"Document approved! Check on other files.\");</script>";
	     echo "<script>location.href=\"edms_forapproval.php\";</script>";
          }
	else{
	     echo "<script>alert(\"Approval was unsuccessful! Try again.\");</script>";
	     echo "<script>location.href=\"edms_approve.php\";</script>";
        } 
}
?>
