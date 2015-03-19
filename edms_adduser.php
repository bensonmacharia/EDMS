<?php
include("session.php");
include ("connection.php");
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
<SCRIPT type="text/javascript">
function regvalidate()
{
if((document.registrationform.fname.value=="")
 {
  document.getElementById('une').innerHTML = "First name should not be empty";
  registrationform.fname.focus();
  return(false);
 }
 
 if(document.registrationform.sname.value=="")
 {
  document.getElementById('une').innerHTML = "Second name should not be empty";
  registrationform.sname.focus();
  return(false);
 }

if(document.registrationform.email.value=="")
  {
  document.getElementById('une').innerHTML = "Email id required";
  registrationform.email.focus();
  return(false);
  }

if(document.registrationform.password.value=="")
   {
  document.getElementById('une').innerHTML = "Please type a password";
  registrationform.password.focus();
  return(false);
   }
else
   {
   return(true);
   }
}
</SCRIPT>
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
<div id="leftMain"> 
<a href="#"><img src="images/erms1.png" alt="ERMS" border="0" /></a>
<div id="navbar">
<?php include 'sidemenu.php';?>
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
<h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">Add a new user.</b></h2><br/>
<b style="color:#0033cc;line-height:20px">Kindly provide user details to register.</b></br>
<span style="color:red; font-size:0.9em" align="left">*requied fields.</span>&nbsp;
<div id="form">
<form name = "registrationform" method="POST" action="register.php" onSubmit="return(regvalidate())">
<table>
<tr>
<td>First Name:* </td> <td><input type = "text" name="fname" placeholder="First Name"  /><br/> </td>
</tr>
<tr>
<td>Second Name:* </td> <td> <input type = "text" name="sname" placeholder="Second Name" /><br/></td>
</tr>
<tr>
<td>Email Address:* </td> <td> <input type = "text" name="email" placeholder="Your Email"/><br/></td>
</tr>
<tr>
<td> Password:* </td> <td> <input type = "password" name="password" placeholder="Password" /> <br/> </td>
</tr>
<tr><td>Position:* </td> <td><input type = "text" name="position" placeholder="Your Position*" /> <br/> </td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;</td></tr>
<tr>
<td>User Class:*</td><td> <select name="class">
<option value="Administrator" selected="selected">Admin</option>
<option value="Technician">Technician</option>
<option value="Librarian">Librarian</option>
<option value="Guest">Guest</option>
</select>
</td>
</tr>
</tr>
</table>
<font color='red'> <DIV id="une"> </DIV> </font>
<input type = "submit" value="Add User" />

</form>
</div>
</center>

</table>
</div>
</div>
<div id="footer"><p style="float:right">*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p></div>
</body>
</html>
