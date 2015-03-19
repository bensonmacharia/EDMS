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
#contactus fieldset
{
   width:472px;
   padding:4px;
   border:1px solid #ccc;
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
-khtml-border-radius: 10px;
border-radius: 10px;   
}

#contactus legend
{
   font-family : Arial, sans-serif;
   font-size: 1.3em;
   font-weight:bold;
   color:#0033cc;
}

#contactus label
{
   font-family : Arial, sans-serif;
   font-size:1.0em;
   font-weight: bold;
}

#contactus input[type="text"],textarea
{
  font-family : Arial, Verdana, sans-serif;
  font-size: 1.0em;
  line-height:140%;
  color : #000; 
  padding : 3px; 
  border : 1px solid #999;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -khtml-border-radius: 5px;
    border-radius: 5px;

}

#contactus input[type="text"]
{
  height:18px;
  width:280px;
  
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
   border-radius: 5px;   
  
}

#contactus input[type="submit"]
{
   width:100px;
   height:30px;
   padding-left:0px;
   
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
   border-radius: 5px;   
}

#contactus textarea
{
  height:120px;
  width:310px;
  -webkit-border-radius: 8px;
  -moz-border-radius: 8px;
   border-radius: 8px;  
   resize: none;
}

#contactus input[type="text"]:focus,textarea:focus
{
  color : #009;
  border : 1px solid #990000;
  background-color : #ffff99;
  font-weight:bold;
}

#contactus .container
{
   margin-top:8px;
   margin-bottom: 10px;
}

#contactus .error
{
   font-family: Verdana, Arial, sans-serif; 
   font-size: 0.7em;
   color: #900;
   background-color : #ffff00;
}

#contactus .short_explanation
{
   font-family : Arial, sans-serif;
   font-size: 0.9em;
   color:#ff0000;
      
}
</style>
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
  <div id="leftMain"> <a href="#"><img src="images/erms1.png" alt="ERMS" border="0" /></a>
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
  <div id="main" style="border:none">
    <?php

$query = "SELECT * FROM users WHERE uid = '$user_id' "; 
$result = mysqli_query($connection,$query);
$row = mysqli_fetch_array($result);
$names = $user_name;
$email = $row['email'];
?>
    <form accept-charset="UTF-8" method="post" name = "contactus"  action="" id="contactus">
      <fieldset>
      <legend>Contact us</legend>
      <div class="short_explanation">* required fields</div>
      <div><span class="error"></span></div>
      <div class="container">
        <label for="name" style="color:#0c6500">Your Full Name*: </label>
        <br>
        <input type="text" maxlength="50" value="<?php echo $names; ?>" id="name" name="name" required>
        <br>
      </div>
      <div class="container">
        <label for="email" style="color:#0c6500">Email Address*:</label>
        <br>
        <input type="text" maxlength="50" value="<?php echo $email; ?>" id="email" name="email" required>
        <br>
      </div>
      <div class="container">
        <label for="message" style="color:#0c6500">Message:</label>
        <br>
        <textarea id="message" name="message" cols="50" rows="10" required></textarea>
      </div>
      <div class="container">
        <input type="submit" value="Submit" name="submit">
      </div>
      </fieldset>
    </form>
    <?php
 if (isset($_POST["submit"])){
 $name = $_POST['name'];
 $email = $_POST['email'];
 $message = $_POST['message'];
   if (!filter_var($email, FILTER_VALIDATE_EMAIL))
   {
    echo "<script>alert(\"Invalid email address! Try again.\");</script>";
	echo "<script>location.href=\"contact.php\";</script>";
    } 
//send message to admin
$y="insert into messages(name,email,message) values('$name','$email','$message')";
if(!mysqli_query($connection,$y))
{
//echo $uid;
die('Error occured:'.mysqli_error());
}
else
{
echo"<script>alert(\"Message Sent. Thank you for contatcing us.\");</script>";
echo"<script>location.href=\"home.php\";</script>";
}
 mysqli_close($connection);
          
  }
?>
    </table>
  </div>
</div>
<div id="footer">
  <p style="float:right">*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p>
</div>
</body>
</html>
