
<?php
include("session.php");
include("connection.php");
if(!(isset($_SESSION['login_user'])&&$_SESSION['login_user']!="")){
    header("Location:index.php");
	}
$uid = rand();
$fname =$_POST['fname'];
$sname =$_POST['sname'];
$email =$_POST['email'];
$password =md5($_POST['password']);
$position =$_POST['position'];
$class =$_POST['class'];
$y="insert into users(uid,fname,sname,email,password,position,class) values('$uid','$fname','$sname','$email','$password','$position','$class')";
if(!mysqli_query($connection,$y))
{
//echo $uid;
die('Error occured:'.mysqli_error());
}
else
{
echo"<script>alert(\"User Added Successfully!. Go Back\");</script>";
echo"<script>location.href=\"edms_admin.php\";</script>";
}
 mysqli_close($connection);
?>

