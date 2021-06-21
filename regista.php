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
if(document.registrationform.fname.value=="")
 {
  alert("First name should not be empty");
  registrationform.fname.focus();
  return(false);
 }


re = /^[a-zA-Z\-\' ]*$/;
if(!re.test(registrationform.fname.value))
 {
  alert("First name must be characters only");
  registrationform.fname.focus();
   return(false);
  }

if(document.registrationform.sname.value=="")
 {
  alert( "Second name should not be empty");
  registrationform.sname.focus();
  return(false);
 }

re = /^[a-zA-Z\-\' ]*$/;
if(!re.test(registrationform.sname.value))
 {
  alert("Second name must be characters only");
  registrationform.sname.focus();
   return(false);
  }



if(document.registrationform.email.value=="")
  {
  alert("Email  required");
  registrationform.email.focus();
  return(false);
  }

  var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

 if(!re.test(registrationform.email.value))
 {
  alert("Invalid email adress format");
  registrationform.email.focus();
   return(false);
  }



if(document.registrationform.position.value=="")
  {
  alert ("Position required");
  registrationform.position.focus();
  return(false);
  }


if(document.registrationform.password.value=="")
  {
  alert("Please type a password");
  registrationform.password.focus();
  return(false);
  }

  if(document.registrationform.password.value.length < 6) {
  alert("Password must contain at least six characters!");
  registrationform.password.focus();
  return(false);
   }

if(document.registrationform.confam.value=="")
   {
 alert ("Password confirmation required");
  registrationform.confam.focus();
  return(false);
   }
if((document.registrationform.password.value) != (document.registrationform.confam.value))
   {
  alert("Password Must be equal");
  registrationform.password.value = "";
  registrationform.confam.value = "";
  registrationform.confam.focus();
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
var x = new Date()
document.getElementById('ct').innerHTML = x;
tt=display_c();
 }
</script>
<style type="text/css">
input[type=text],input[type=password]
{
  border: 1px solid #ccc;
  border-radius: 3px;
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  width:250px;
  min-height: 5px;
  padding: 4px 20px 4px 8px;
  font-size: 12px;
  -moz-transition: all .2s linear;
  -webkit-transition: all .2s linear;
  transition: all .2s linear;
}
input[type=text]:focus,input[type=password]:focus
{
  width: 400px;
  border-color: #51a7e8;
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1),0 0 5px rgba(81,167,232,0.5);
  outline: none;
}
#description {
    resize: none;
}
</style>
</head>
<body onload=display_ct();>
<div id="inner_header_wrapper">
  <div id="header">
    <div id="logo"><img src="images/banner-lab.png"></div>
    <header id="title">
    &nbsp; &nbsp;
    <div style="width: 783px; height: 52px; background: url(images/bak_top.jpg) no-repeat;">
      <div style="width: 783px; position: absolute; margin: 8px 0px 0px 0px; font-size: 11px; vertical-align: top;">
        <table cellspacing="0" cellpadding="0" border="0" width="100%">
          <tbody>
            <tr>
              <td width="300px"><span id='ct' ></span></td>
              <td width="200px"><table cellspacing="0" cellpadding="0" border="0" width="100%">
                  <tbody>
                    <tr></tr>
                  </tbody>
                </table></td>
              <td width="100px;" style="font-size: 10px;"></td>
              <td style="font-size: 10px; font-weight: bold;"><a href="http://localhost/EDMS/help.php" style="text-decoration: none; font-size:10px; background: #01D928; color: #FFF; border: 0px; padding: 3px 7px;">HELP</a>&nbsp; <a href="http://localhost/edms/new-users.php" style="text-decoration: none; font-size:10px; background: #0033cc; color: #FFF; border: 0px; padding: 3px 7px;">NEW USER</a> </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </header>
</div>
</div>
<div id="container">
  <div id="leftMain"> <a href="index.html"><img src="images/erms1.png" alt="EDMS" border="0" /></a>
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
    <table >
      <tr>
        <td><h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">Create Account.</b></h2>
          <br/>
          <b style="color:#0033cc;line-height:20px">Kindly provide your details to register.</b></br>
          <span style="color:red; font-size:0.9em" align="left">*requied fields.</span>&nbsp;
          <div id="form">
            <form name = "registrationform" method="POST" action="register1.php" onSubmit="return(regvalidate())">
              <table>
                <tr>
                  <td><input type = "text" name="fname" placeholder="First Name*"  />
                    <br/></td>
                </tr>
                <tr>
                  <td><input type = "text" name="sname" placeholder="Second Name*" />
                    <br/></td>
                </tr>
                <tr>
                  <td><input type = "text" name="email" placeholder="Your Email*"/>
                    <br/></td>
                </tr>
                <tr>
                  <td><input type = "password" name="password" placeholder="Password*" />
                    <br/>
                  </td>
                </tr>
                <tr>
                  <td><input type = "password" name="confam" placeholder="Confirm Password*" />
                    <br/>
                  </td>
                </tr>
                <tr>
                  <td><input type = "text" name="position" placeholder="Your Position*" />
                    <br/>
                  </td>
                </tr>
                <tr>
                  <td>&nbsp;&nbsp;&nbsp;</td>
                </tr>
                <tr>
                  <td>User Class:*&nbsp;
                    <select name="class">
                      <option value="Guest" selected="selected">Guest</option>
                      <option value="Technician">Technician</option>
                      <option value="Librarian">Librarian</option>
                    </select>
                  </td>
                </tr>
              </table>
              <input type = "submit" value="Sign Up" />
              <span style="color:red" align="left">*Note: User registration requires administrators confirmation.</span>
            </form>
          </div>
          </center>
          <p>Already have an account? <a href="index.php">Login</a></p>
    </table>
  </div>
</div>
<div id="footer">
  <p style="float:right">*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p>
</div>
</body>
</html>
