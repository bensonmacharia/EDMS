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
              <h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">Frequently asked Questions (FAQs)</b></h2>
              <br/>
            </center></td>
        </tr>
		<tr><td>
		<b style="color:#0033cc">About EDMS</b></br>
		<p style="line-height:25px; color:#000">An EDMS provides an e-business technology that manages
the creation, storage and control of documents electronically. Such a system brings together
several technologies working together to provide a comprehensive solution for managing the
<strong>creation, capture, indexing, storage, retrieval, and disposition</strong> of records and information assets
of the organization.</p>
<b style="color:#0033cc">EDMS supports</b></br>
<p><ul>
    <li>Reviewing and approving documents prior to release</li>
    <li>Reviews and approvals</li>
    <li>Ensuring changes and revisions are clearly identified</li>
    <li>Ensuring that relevant versions of applicable documents are available at their “points of use”</li>
    <li>Ensuring that documents remain legible and identifiable</li>
    <li>Ensuring that external documents like customer supplied documents or supplier manuals are identified and controlled</li>
    <li>Preventing “unintended” use of obsolete documents</li>
</ul></p>

		
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
