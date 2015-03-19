<?php
include('login.php'); // Includes Login Script
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
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
var x = new Date()
document.getElementById('ct').innerHTML = x;
tt=display_c();
 }
</script>
</head>
<body onload=display_ct();>
<div id="inner_header_wrapper">
<div id="header">
   <div id="logo"><img src="images/banner-lab.png"></div>
   <header id="title">&nbsp; &nbsp;
<div style="width: 783px; height: 52px; background: url(images/bak_top.jpg) no-repeat;">
       <div style="width: 783px; position: absolute; margin: 8px 0px 0px 0px; font-size: 11px; vertical-align: top;">
               <table cellspacing="0" cellpadding="0" border="0" width="100%">
                	<tbody>
					<tr>
                	<td width="300px"><span id='ct' ></span></td>
					<td width="200px">
				    <table cellspacing="0" cellpadding="0" border="0" width="100%">
				    <tbody><tr></tr>
				    </tbody></table>
				     </td>
					 <td width="100px;" style="font-size: 10px;">
					 
				       </td>
					<td style="font-size: 10px; font-weight: bold;"><a href="http://localhost/edms/contact.php" style="text-decoration: none; font-size:10px; background: #01D928; color: #FFF; border: 0px; padding: 3px 7px;">HELP</a>&nbsp;
					 <a href="http://localhost/edms/new-users.php" style="text-decoration: none; font-size:10px; background: #0033cc; color: #FFF; border: 0px; padding: 3px 7px;">NEW USER</a>												                			</td>
                		</tr>
                	</tbody>
					</table>
              </div>
            </div>
</div>
   </header>
</div></div>
<div id="container">
<div id="leftMain"> 
<a href="#"><img src="images/erms1.png" alt="ERMS" border="0" /></a>
<div id="navbar">
<!--Quick Links-->
<ul style="line-height:20px">
<li><a href="faqs.php">FAQs</a></li>
<li><a href="about.php">About EDMS</a></li>
<li><a href="http://worldagroforestrycenter.org/research/land-health/spectral-diagnostics-laboratory">Soil-Plant Laboartory</a></li>
<li><a href="http://worldagroforestrycenter.org/landhealth">Land Health Decisions</a></li>
<li><a href="http://worldagroforestrycenter.org">World Agroforestry Center</a></li>
</ul>
</div>
<div id="navbarAlt">
<ul>
<li><a href="contact.php">Contact Us</a></li>
</ul>
</div>
</div>
<div id="main" style="border:none">
<div id="login">
<img src="images/login.png" align="left">&nbsp;&nbsp;&nbsp;<h2>User Login</h2><br/>
<form action="" name="login" method="post" onSubmit="return(regvalidate())">
<label>Your Email:*&nbsp;</label>
<input id="email" name="email" placeholder="email" type="text">
<br/><br/>
<label>Password:*&nbsp;</label>
<input id="password" name="password" placeholder="password" type="password">
<input name="submit" type="submit" value=" Login ">
<error><?php echo $error; ?></error>
<p align="left">Remember Me <input type="checkbox" name="rememberme"></p>
<p align="left"><a href="http://www.edms.host22.com/forgotpass.php">Forgot Password?</a></p>
<p align="left">Need a Username and Password?</p>
<!--<p align="left"><a href="mailto:muchokibenson12@gmail.com">Email us</a></p>-->
<p align="left"><a href="regista.php">Register</a> or <a href="mailto:muchokibenson12@gmail.com">Email us</a></p>
<!--<p style="color:red">*Note: Check your email for notification on sign up.</p>-->
</td>
</form>
  </div>
</div>
<div id="footer"><p style="float:left">*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p></div>
</body>
</html>