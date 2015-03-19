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
        
    <header id="title"> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; <span id='ct' style=" float: left;"></span>
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
      </div>
    </header>
  </div>
</div>
<div id="container">
  <div id="main1">
    <center>
      <table>
        <tr>
          <td><center>
              <br/>
              <h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">Information and Records Management Policy</b></h2>
              <br/>
            </center></td>
        </tr>
        <tr>
          <td><b style="color:#0033cc">Policy Summary</b></br>
            <p style="line-height:25px; color:#000">Soil-Plant Lab's authoritative documents - whether electronic or paper - are subject to control in a manner reflecting the risks associated with improper management of the information to ensure they are accurate, current, appropriately available, and approved by authorized individuals.</p>
              
              <p style="line-height:25px; color:#000">Authoritative documents include, for example, institutional documents that specify Laboratory policies and their supporting and implementing processes and procedures. Authoritative documents further include those that establish or document design specifications, and generally those for which an error in document control could reasonably be expected to substantially diminish the ability of the institution to meet mission requirements, or to protect safety, health, environment, or property.</p>
            <b style="color:#0033cc">Who Should Read This Policy</b></br>
            <p>
            <ul style="line-height:20px; color:#000">
              <li>Persons who develop, review, approve, and maintain authoritative documents must follow this policy.</li>
              <li>Users of authoritative documents should at least be familiar with this policy.</li>
            </ul>
            </p>
			<b style="color:#0033cc">To Read the Full Policy, Go To:</b></br>
			<p><a href="#">Read More</a></p>
          </td>
        </tr>
      </table>
    </center>
  </div>
</div>
<div id="footer">
  <p style="float:right">*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p>
</div>
</body>
</html>
