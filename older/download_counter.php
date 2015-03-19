<?php
include("session.php");
// grab the requested file's name
$file = $_GET['filename'];

$x=mysqli_connect('127.0.0.1','root','','edms');
$m=mysql_query("select downloads from uploads WHERE filename = '$file'");
$row = mysql_fetch_array($m);
$value=$row['downloads'];
//echo $value;
$new= $value + 1;
//echo $new;
$y="update uploads SET downloads ='$new' WHERE filename = '$file'";
if(mysqli_query($x,$y))
{
//echo "success";
}


?>