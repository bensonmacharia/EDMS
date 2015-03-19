<?php
include("session.php");
include("connection.php");
//include ("session_expire.php");
if(!(isset($_SESSION['login_user'])&&$_SESSION['login_user']!="")){
    header("Location:index.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>| EDMS</title>
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
   <div style="width: 783px; height: 52px; background: url(images/bak_top.jpg) no-repeat;">
       <?php 
		if(($type=='Administrator')|| ($type=='Technician'))
      {
	   include 'topmenu.php'; 
      }
	  else
	  {
       include 'topmenu1.php';
      }
      ?>
   
   </header>
</div>
</div>
<div id="container">
<div id="leftMain"> 
<a href="#"><img src="images/erms1.png" alt="ERMS" border="0" /></a>
<div id="navbar">
       <?php 
	  if(($type=='Administrator')|| ($type=='Technician'))
      {
	   include 'sidemenu.php'; 
      }
	  else
	  {
       include 'sidemenu1.php';
      }
      ?>
</div>
<div id="navbarAlt">
<ul>
<li><a href="contact.php">Ask for Help</a></li>
</ul>
</div>
</div>
<div id="main">
<table>
<tr>
<td>
<center>
<h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">My Profile</b></h2><br/>
</center>
<style>
label{color:#0033cc; font-size:13px;}
detail{color:#000000; font-size:13px;}
</style>
<?php

$user= $_SESSION['login_user'];
$query = mysqli_query($connection,"select * FROM users WHERE email = '$user'");
while($row = mysqli_fetch_array($query))
 { 
date_default_timezone_set('Africa/Nairobi');
$date= $row['Reg_Date'];
$reg=new DateTime($date);
$today=new DateTime();
$interval=$reg->diff($today);
$user=$row['uid'];
$email=$row['email'];
echo "<b style='color:#0c6500'>PERSONAL DETAILS:</b><br/><br/>";
echo"<img src='images/profile.png' align='left' width='100' height='100' />&nbsp;&nbsp;";
echo "<label>Names:</label>&nbsp;&nbsp;<detail>".$user_name."</detail>"."<br/>&nbsp;&nbsp;";
echo "<label>Membership ID:</label>&nbsp;&nbsp;<detail>".$row['uid']."</detail><br/>&nbsp;&nbsp;";
echo "<label>Registered Email:</label>&nbsp;&nbsp;<detail><a href='mailto:".$email."'>".$email."</a></detail><br/>&nbsp;&nbsp;";
echo "<label>User Category:</label>&nbsp;&nbsp;<detail>".$row['class']."</detail><br/>&nbsp;&nbsp;";
echo "<label>Member for:</label>&nbsp;&nbsp;<detail>".$interval->format('%y years -%m months -%d days')."</detail><br/><br/><br/>";
echo "<a href='resetpass.php?uid=$user'>Request to Change Password</a><br/>";
echo "<br/><br/>";
}
$sql = mysqli_query($connection,"SELECT * FROM downloads");
$row = mysqli_fetch_array($sql);
$result= mysqli_query($connection,"select count(1) FROM documents WHERE uploaded_by = '$user_name'");
$result1= mysqli_query($connection,"select count(1) FROM downloads WHERE full_name = '$user_name'");
$result2= mysqli_query($connection,"select count(1) FROM downloads WHERE full_name = '$user_name'");
$row = mysqli_fetch_array($result);
$row1 = mysqli_fetch_array($result1);
$row2 = mysqli_fetch_array($result2);
$total= $row[0];
$total1= $row1[0];
$total2= $row2[0];
echo "<b style='color:#0c6500'>ACTIVITY:</b><br/><br/>";
echo "<label>Total Documents Uploaded:</label>&nbsp;&nbsp;<detail>".$total."</detail>"."<br/>";
echo "<label>Total Documents Downloaded:</label>&nbsp;&nbsp;<detail>".$total1."</detail>"."<br/>";
echo "<label>Total Documents Requested:</label>&nbsp;&nbsp;<detail>".$total2."</detail>"."<br/>";
echo "<br/><br/><br/>";

?>

</td></tr>
</table>
    </center>
  </div>
</div>
<div id="footer">
  <p style="float:right">*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p>
</div>
</body>
</html>


