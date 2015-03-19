<?php
include("connection.php");
$field = $_GET['field'];  
$sql = "DELETE FROM edms_user WHERE uid = '$field'"; 
$result = mysqli_query($connection,$sql) or die(mysqli_error());

while($row = mysqli_fetch_array($result))
 { 
echo"<script>alert(\"User deleted successfully!Back Home.\");</script>";
echo"<script>location.href=\"home.php\";</script>";
}
 
 ?>