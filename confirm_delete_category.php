<?php
include("connection.php");
$field = $_GET['field']; 
$sql = "DELETE FROM categories WHERE cat_id = '$field'"; 
$result = mysqli_query($connection,$sql) or die(mysqli_error());

while($row = mysqli_fetch_array($result))
 { 
echo"<script>alert(\"Category deleted successfully!Back Home.\");</script>";
echo"<script>location.href=\"home.php\";</script>";
}
 
 ?>