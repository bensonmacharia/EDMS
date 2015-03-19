<?php
include("connection.php");
$email=$_POST['email'];
$password=$_POST['password'];
$uid=$_POST['uid'];
if(count($_POST)>0) {
$result = mysqli_query($connection,"SELECT *from edms_user WHERE uid='$uid' AND email='$email'");
$row=mysqli_fetch_array($result);
if($_POST["uid"] == $row["uid"]) {
$pass=md5('$password');
mysqli_query($connection,"UPDATE login set password= md5('" .$_POST["password"] . "') WHERE uid='" . $_POST["uid"] . "'");
$message = "Password changed successfully!";

} else $message = "Email wrong or Membership ID!";
}
?>