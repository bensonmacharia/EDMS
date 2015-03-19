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
<center>
<table>
<tr>
<td>
<center><h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">LABORATORY FILES.</b></h2><br/></center>
<span style="color:#0033cc; font-weight:bold">Standard Operating Procedures:</span><br/>
<p>The laboratory uses six types of SOPs and two types of laboratory job aids:</p>

<ol style="color:#0c6500; font-weight:600; padding-left:10px;">
<li><a href="fundamental-sops.php" style="color:#000000; font-weight:500; text-decoration:none;">Fundamental SOPs.</a></li>
<li><a href="receiving_logging_sops.php" style="color:#000000; font-weight:500; text-decoration:none;">SOPs for receiving, logging, processing, archiving and disposal of samples.</a></li>
<li><a href="analytical_methods_sops.php" style="color:#000000; font-weight:500; text-decoration:none;">Analytical methods SOPs.</a></li>
<li><a href="equipment_sops.php" style="color:#000000; font-weight:500; text-decoration:none;">Equipment SOPs.</a></li>
<li><a href="quality_assurance_sops.php" style="color:#000000; font-weight:500; text-decoration:none;">SOPs for Quality assurance.</a></li>
<li><a href="safety-precautions_sops.php" style="color:#000000; font-weight:500; text-decoration:none;">SOPs for Safety precautions.</a></li>
</ol></br>
<img src="images/files.jpg" align="right" />
<span style="color:#0033cc; font-weight:bold">Laboratory Job Aids:</span><br/>
<ol style="color:#0c6500; font-weight:600; padding-left:10px;">
<li><a href="bench_aids.php" style="color:#000000; font-weight:500; text-decoration:none;">Bench aids for equipment.</a></li>
<li><a href="workflows_for_analysis.php" style="color:#000000; font-weight:500; text-decoration:none;">Workflows for analysis.</a></li>
</ol></br>
<a href="others_sop.php" style="color:#0033cc; font-weight:bold; text-decoration:none;">Others:</a><br/>
<!--<ol style="color:#0c6500; font-weight:600; padding-left:10px;">
<li><a href="#" style="color:#000000; font-weight:500; text-decoration:none;">Laboratory manuals (quality, service, safety, training).</li>
<li><a href="#" style="color:#000000; font-weight:500; text-decoration:none;">Policy documents.</li>
<li><a href="#" style="color:#000000; font-weight:500; text-decoration:none;">Forms and work sheets.</li>
<li><a href="#" style="color:#000000; font-weight:500; text-decoration:none;">Annexes.</li>
</ol>-->
</br>
</td></tr>
</table>
</center>
</div>
</div>
<div id="footer"><p style="float:right">*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p></div>
</body>
</html>