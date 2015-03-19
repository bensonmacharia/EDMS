
<?php
$x=mysqli_connect('127.0.0.1','root','','edms');
if(mysqli_connect_error())
{
echo"failed to connect:".mysqli_connect_error();
}
//$field = $_GET['field'];
$uid = mysql_real_escape_string($_POST['uid']);
$fname = mysql_real_escape_string($_POST['fname']);
$sname = mysql_real_escape_string($_POST['sname']);
$email = mysql_real_escape_string($_POST['email']);
$position = mysql_real_escape_string($_POST['position']);
$class =mysql_real_escape_string($_POST['class']);
$y="update users SET fname ='$fname',sname='$sname',email='$email',position='$position',class='$class' WHERE uid = '$uid'";
if(!mysqli_query($x,$y))
{
die('Error occured:'.mysqli_error());
}
else
{
echo"<script>alert(\"User updated successfully!Back Home.\");</script>";
echo"<script>location.href=\"home.php\";</script>";

}
 mysqli_close($x);
?>

