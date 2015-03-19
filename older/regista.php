<!DOCTYPE html>
<html>
<head>
<title>New users | ERMS</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
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
   
if(document.registrationform.confam.value=="")
   {
  document.getElementById('une').innerHTML = "Password confirmation required";
  registrationform.confam.focus();
  return(false);
   }

if((document.registrationform.password.value) != (document.registrationform.confam.value))
   {
  document.getElementById('une').innerHTML = "Password Must be equal";
  registrationform.password.value = "";
  registrationform.confam.value = "";
  registrationform.password.focus();
  return(false);
  }
else
   {
   return(true);
   }
}
</SCRIPT>
</head>
<body>
<div id="inner_header_wrapper">
<div id="header">
   <div id="logo"><img src="images/banner-lab.png"></div>
   <header id="title"><h2>Electronic Records Management System (ERMS)</h2>&nbsp; &nbsp;
   <!-- <div id="topmenu">
		<ul>
			<li class="active"><a href="index.php"><span>Home</span></a></li>
			<li class=""><a href="files.php"><span>Files</span></a></li>
			<li class=""><a href="tools.php"><span>Tools</span></a></li>
			<li class=""><a href="management.php"><span>Management</span></a></li>
			<li class="last"><a href="help.php"><span>Help</span></a></li>
		</ul>
</div> -->
<div style="width: 783px; height: 52px; background: url(images/bak_top.jpg) no-repeat;">
       <div style="width: 500px; position: absolute; margin: 8px 0px 0px 285px; font-size: 11px; vertical-align: top;">
               <table cellspacing="0" cellpadding="0" border="0" width="100%">
                	<tbody>
					<tr>
                	<td width="135px"></td>
					<td width="100px">
				    <table cellspacing="0" cellpadding="0" border="0" width="100%">
				    <tbody><tr></tr>
				    </tbody></table>
				     </td>
					 <td align="center" width="60px;" style="font-size: 10px;">
				      
				       </td>
					<td style="font-size: 10px; font-weight: bold;"><a href="regista.html" style="text-decoration: none; font-size:10px; background: #01D928; color: #FFF; border: 0px; padding: 3px 7px;">SIGN UP</a>&nbsp;
					 <a href="new-users.html" style="text-decoration: none; font-size:10px; background: #0033cc; color: #FFF; border: 0px; padding: 3px 7px;">NEW USER</a>												                			</td>
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
<a href="index.html"><img src="images/erms1.png" alt="ERMS" border="0" /></a>
<div id="navbar">
<ul>
<li><a href="index.html">Home</a></li>
<li><a href="about.html">About</a></li>
<li><a href="files.html">Document Files</a></li>
<li><a href="login.html">User Login</a></li>
<li><a href="maintenance.html">Maintenance</a></li>
<li><a href="help.html">User Help</a></li>
</ul>
</div>
<div id="navbarAlt">
<ul>
<li><a href="contact.html">Email Contact Form</a></li>
</ul>
</div>
</div>
<div id="main">
<center>
<table border="1" >
<tr>
<td>
<p style="color:#0033cc"><b>Register: New user</b></p>
<b>Kindly provide your details to register.</b>
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
<tr>
<td> Confirm:* </td> <td> <input type = "password" name="confam" placeholder="Confirm Password" /> <br/> </td>
</tr>
</tr>
</table>
<font color='red'> <DIV id="une"> </DIV> </font>
<input type = "submit" value="Register Now" />
<p style="color:red" align="right">*Note: User registration requires administrators confirmation.</p>
</form>
</div>
</center>
<p>Already have an account? <a href="index.php">Login</a></p>
</table>
</div>
<div id="sidebar-right">
</div>
<div id="footer"> </div>

</body></html>