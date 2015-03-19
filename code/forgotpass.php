<?php
include('forget.php'); // Includes Login Script
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
					<td style="font-size: 10px; font-weight: bold;"><a href="http://localhost/edms/help.php" style="text-decoration: none; font-size:10px; background: #01D928; color: #FFF; border: 0px; padding: 3px 7px;">HELP</a>&nbsp;
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
<ul>
<li><a href="http://worldagroforestrycenter.org/landhealth">Land Health Decisions</a></li>
<li><a href="http://worldagroforestrycenter.org/research/land-health/spectral-diagnostics-laboratory">Soil-Plant Laboartory</a></li>
<li><a href="http://africasoils.net/">AfSIS</a></li>
<li><a href="#">FAQs</a></li>
<li><a href="#">Why EDMS?</a></li>
<li><a href="#">User Help</a></li>
</ul>
</div>
<div id="navbarAlt">
<ul>
<li><a href="#">Feedback Form</a></li>
</ul>
</div>
</div>
<div id="main" style="border:none">
<div id="login">
<h2>Password Request</h2><br/>
<form action="" method="post">
<b>Kindly provide your email below to retrive your forgotten password.</b><br/><br/>
<label>Your Email:*&nbsp;</label>
<input id="email" name="email" placeholder="Your Email" type="text">
<br/><br/>
<input name="submit" type="submit" value=" Request ">
<error><?php echo $error; ?></error>
</td>
</form>
<p>Already have an account? <a href="index.php">Login</a></p>
</div>
</div>
</body>
</html>