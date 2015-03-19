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
<style type="text/css">
#une,.message{color:#FF0000;}
input[type=password],input[type=text]
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
input[type=password]:focus,input[type=text]:focus
{
  width: 400px;
  border-color: #51a7e8;
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1),0 0 5px rgba(81,167,232,0.5);
  outline: none;
}
</style>  

<SCRIPT type="text/javascript">
function mypasswordmatch()
{
    if((((document.reset.password.value=="") ||(document.reset.password2.value=="")||(document.reset.uid.value=="")||(document.reset.email.value==""))))
    {
        document.getElementById('une').innerHTML = "No value should be null!";
        reset.uid.focus();
        return(false);
    }
    if((document.reset.password.value) != (document.reset.password2.value))
    {
        document.getElementById('une').innerHTML = "password Must be equal!";
        reset.password.value = "";
        reset.password2.value = "";
        reset.password.focus();
        return(false);
    }
    else
    {
        $( "#reset" ).submit();
    }
}
  </script>
  
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
        <?php include 'topmenu.php';?>
      </div>
    </header>
  </div>
</div>
<div id="container">
  <div id="leftMain"> <a href="#"><img src="images/erms1.png" alt="ERMS" border="0" /></a>
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
<p style="color:#0033cc"><b>Reset Password:</b></p>
<p><b>Get your <u>Membership ID</u> from your Email</b>  >>  <a href="forgotpass.php">Resend</a> my Membership ID.</p>    
  <div id="tabs-1">
  <form action="" method="post" id="reset" name="reset" onSubmit="return(mypasswordmatch())">
    <p><input id="uid" name="uid" type="text" placeholder="Enter Membership ID">
	<p><input id="email" name="email" type="text" placeholder="Enter Email">
    <p><input id="password" name="password" type="password" placeholder="Enter new password">
    <p><input id="password2" name="password2" type="password" placeholder="Re-type new password">
	
	 <Div id="une"> </Div>
    <p><input type="submit" value="Reset Password" name="reset" /></p>
  </form>
  <?php
  if(isset($_POST['reset'])) {
      $email=$_POST['email'];
      $password=$_POST['password'];
      $uid=$_POST['uid'];
      $sql = mysqli_query($connection,"SELECT * FROM edms_user WHERE uid = '$uid' AND email = '$email'");
          if($row = mysqli_fetch_array($sql)){
		  echo"<script>alert(\"Test! Back Home.\");</script>";
          echo"<script>location.href=\"resetpass.php\";</script>";
		  }
		  else{
		  echo"<script>alert(\"Error! Back Home.\");</script>";
          echo"<script>location.href=\"resetpass.php\";</script>";
		  }
       
  }
  ?>
  </center>
<p>Proceed to Login? <a href="index.php">Login</a></p>
</tr>
</td>
</table>
  </div>
</div>
</body></html>