
<?php
include ("connection.php");
$uid = $_POST['uid'];
$fname =$_POST['fname'];
$sname =$_POST['sname'];
$email =$_POST['email'];
$position =$_POST['position'];
$class =$_POST['class'];
$code =$_POST['code'];
$title =$_POST['title'];
$full_name = $fname."-".$sname;
$y="insert into downloads(uid,fname,sname,full_name,email,position,class,code,title) values('$uid','$fname','$sname','$full_name','$email','$position','$class','$code','$title')";
if(!mysqli_query($connection,$y))
{
die('Error occured:'.mysqli_error());
}
else
{

echo"<script>alert(\"Download request made!Kindly check your email for confirmation.\");</script>";
echo"<script>location.href=\"home.php\";</script>";
}
 mysqli_close($connection);
?>

