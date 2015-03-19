<?php

include("connection.php");
$today = date('Y-m-d');


$result0 = mysqli_query($connection,"select count(1) FROM downloads WHERE email = '$user_check'");
$result1 = mysqli_query($connection,"select count(1) FROM messages WHERE email = '$user_check'");
$row0 = mysqli_fetch_array($result0);
$row1 = mysqli_fetch_array($result1);
$total0 = $row0[0];
$total1 = $row1[0];
echo "You made <a href='check_download_requests.php' style='line-height:20px; font-weight:500'>" .$total0 ." download request(s).</a> Check their status.<br/>";
echo "You sent <a href='check_email_status.php' style='line-height:20px; font-weight:500'>" .$total1 ." email(s)</a> Check their status.<br/>";
mysqli_close($connection);
echo "<br/>";
echo"<a href='profile.php'>View your profile</a>";
echo "<br/><br/>";
?>
