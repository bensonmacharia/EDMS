<?php
include "session.php";
include "connection.php";
//include ("session_expire.php");
if (!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != "")) {
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
if (($type == 'Administrator') || ($type == 'Technician')) {
    include 'topmenu.php';
} else {
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
if (($type == 'Administrator') || ($type == 'Technician')) {
    include 'sidemenu.php';
} else {
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
<center>
<table>
<tr>
<td>
<h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">New to EDMS?</b></h2><br/>
Welcome to the ICRAF Soil_Plant Lab most comprehensive online database for documents management..<br/><br/>

<span style="color:#0033cc; font-weight:bold">ICRAF Documents Management Policy?</span><br/>
This policy applies to ICRAF records and all other information that is in the custody or control of ICRAF.
This policy serves the following purposes: <a href="#">Read more:</a><br/><br/>

<b>To view your profile <a href="profile.php">click here.</a></b><br/><br/>

<span style="color:#0033cc; font-weight:bold">Need to search?</span><br/>
Use the system <a href"edms_search.php">search tool</a> to search for a specific document from the database.<br/>
Note: You must fill in a <strong>Search Term</strong> and select the correct <strong>Search By</strong> option.<br/><br/>

<span style="color:#0033cc; font-weight:bold">Want to Download/ Upload a document?</span><br/>
1) Click on download for selected document.<br/>
2) Check for download link sent in your email and proceed to download.<br/><br/>

<span style="color:#0033cc; font-weight:bold">Contact Us:</span><br/>
Kindly <a href="contact.php">contact us</a> for any further help. <strong>Benvenuto!!</strong><br/><br/>
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
