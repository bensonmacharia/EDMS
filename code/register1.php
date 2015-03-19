
<?php
include("connection.php");
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
die('Error occured:'.mysqli_error());
}
else
{
//header("location:home.php");
echo"<script>alert(\"Account created successfully!Kindly check your email for confirmation.\");</script>";
echo"<script>location.href=\"index.php\";</script>";
}
 mysqli_close($connection);
?>

