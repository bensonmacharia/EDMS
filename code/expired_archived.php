<?php
include("session.php");
include("connection.php");
if(!(isset($_SESSION['login_user'])&&$_SESSION['login_user']!="")){
    header("Location:index.php");
	}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> | EDMS</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<!--[if IE ]> <link href="css/ie.css" rel="stylesheet" type="text/css" /> <![endif]-->
<script type="text/javascript"> 
function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}

function display_ct() {
var strcount
var x = new Date();
x.toString('dddd, MMMM, yyyy');
document.getElementById('ct').innerHTML = x;
tt=display_c();
 }
</script>

</head>
<body onload=display_ct();>
<div id="inner_header_wrapper">
<div id="header">
<div id="logo"><img src="images/banner-lab.png"><b id="welcome">Welcome: <a href="profile.php"><?php echo $login_session; ?></a></b></div>
   <div id="profile"><b id="logout"><a href="logout.php">Log Out</a></b></div>
   &nbsp; &nbsp;&nbsp; 
   <header id="title">
   &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
   <span id='ct' style=" float: left;"></span>
   <div style="width: 783px; height: 52px; background: url(images/bak_top.jpg) no-repeat;"><?php include 'topmenu.php';?></div>
   
   </header>
</div>
</div>
<div id="container">
<div id="main1">
<center>
<table>
<tr>
<td>
<center>
<h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">Expired and Archived</b></h2><br/>
</center>
<style>
th {
    background-color: green;
    color: white;
}
</style>
<?php
 
$data = mysqli_query($connection,"select * FROM documents WHERE evaluate_before <= DATE(now())");
echo "<table border='1px solid green'>"; // start a table tag in the HTML
echo "<tr>"; echo "<th>Code </th>";echo "<th>Title </th>";echo "<th>Size </th>";echo "<th>Authors </th>"; echo "<th>Date Expired</th>"; echo "<th>Days Expired </th>"; echo "</tr>";
 while($row = mysqli_fetch_array($data))
 { 
 $today = date('Y-m-d');
 $code=$row['code'];
 $expiry_date=$row['evaluate_before'];
 $datediff = strtotime($today) - strtotime($expiry_date);
 $days_expired =  floor($datediff/(60*60*24));
 echo "<tr><td>"."<a href='edms_delete.php?code=$code'>" . $row['code'] . "</a></td><td>" .$row['title'] . "</td><td>" . $row['size'] ."Kbs"."</td><td>" . $row['authors']. "</td><td>". $row['evaluate_before'] . "</td><td>" . $days_expired ."</td></tr>";
 
 }
 
?>

</td></tr>
</table>
</center>
<p>*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p>
</div>
</div>
</body>
</html>