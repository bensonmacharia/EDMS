
<?php
include("connection.php");

$today = date('Y-m-d');


$result = mysqli_query($connection,"select count(1) FROM documents WHERE evaluate_before >= DATE(now()) AND evaluate_before <= DATE_ADD(DATE(now()), INTERVAL 1 MONTH)");
$result1 = mysqli_query($connection,"select count(1) FROM documents WHERE approved = '0'");
$result2 = mysqli_query($connection,"select count(1) FROM documents WHERE review = '1'");
$result3 = mysqli_query($connection,"select count(1) FROM users WHERE confirmed = '0'");
$result4 = mysqli_query($connection,"select count(1) FROM downloads WHERE approved = '0'");
$result5 = mysqli_query($connection,"select count(1) FROM documents WHERE evaluate_before <= DATE(now())");
$result6 = mysqli_query($connection,"select count(1) FROM messages WHERE isread = '0'");
$row = mysqli_fetch_array($result);
$row1 = mysqli_fetch_array($result1);
$row2 = mysqli_fetch_array($result2);
$row3 = mysqli_fetch_array($result3);
$row4 = mysqli_fetch_array($result4);
$row5 = mysqli_fetch_array($result4);
$row6 = mysqli_fetch_array($result6);
$total = $row[0];
$total1 = $row1[0];
$total2 = $row2[0];
$total3 = $row3[0];
$total4 = $row4[0];
$total5 = $row5[0];
$total6 = $row6[0];
echo"<span style='color:#0033cc; font-weight:600; line-height:18px; padding: 25px 50px 75px'>A. Messages</span><br/>";
echo "You have<a href='messages.php' style='line-height:20px; font-weight:500; padding: 2px 0px 5px 5px;'>" .$total6 ." unread message(s)</a>.<br/><br/>";
echo"<span style='color:#0033cc; font-weight:600; line-height:18px; padding: 25px 50px 75px'>B. Documents</span><br/>";
echo "<a href='documents_expire.php' style='line-height:20px; font-weight:500; padding: 2px 0px 5px 5px;'>" .$total ." document(s)</a> to expire in one month.<br/>";
echo "<a href='edms_forapproval.php' style='line-height:20px; font-weight:500; padding: 2px 0px 5px 5px;'>" .$total1 ." document(s)</a> needs to be approved.<br/>";
echo "<a href='edms_allrevisions.php' style='line-height:20px; font-weight:500; padding: 2px 0px 5px 5px;'>" .$total2 ." document(s)</a> sent for revision.<br/>";
echo "<a href='expired_archived.php' style='line-height:20px; font-weight:500; padding: 2px 0px 5px 5px;'>" .$total5 ." document(s)</a> expired and archived.<br/><br/>";
echo"<span style='color:#0033cc; font-weight:600; line-height:18px; padding: 25px 50px 75px'>C. Users</span><br/>";
echo "<a href='edms_usersapproval.php' style='line-height:20px; font-weight:500; padding: 2px 0px 5px 5px;'>" .$total3 ." users(s)</a> need approval.<br/><br/>";
echo"<span style='color:#0033cc; font-weight:600; line-height:18px; padding: 25px 50px 75px'>D. Downloads</span><br/>";
echo "<a href='downloads_approval.php' style='line-height:20px; font-weight:500; padding: 2px 0px 5px 5px;'>" .$total4 ." Download request(s)</a> waiting your approval.<br/><br/>";

mysqli_close($connection);
?>

