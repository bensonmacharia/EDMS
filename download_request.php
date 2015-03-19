<?php
include("session.php");
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
  width: 350px;
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
  <table >
    <tr>
      <td><h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">Request to Download.</b></h2>
        <br/>
        <b style="color:#0033cc;line-height:20px">Kindly confirm your details below.</b></br>
        <span style="color:red; font-size:0.9em" align="left">* required fields</span>&nbsp;
        <?php
		  $file = $_GET['filename'];
		  $connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
          mysql_select_db('edms') or die(mysql_error()); 
		  $sql0 = mysql_query("SELECT * FROM documents WHERE title='$file'");
		  $row0 = mysql_fetch_array($sql0);
		  
		  $sql = mysql_query("SELECT * FROM users WHERE uid='$user_id'");
            while ($row = mysql_fetch_array($sql))
			{

		  ?>
        <form name = "downloadform" method="POST" action="down.php">
          <table>
            <tr>
              <td><span style="color:#0c6500;">Membership ID*:</span>&nbsp;
                <input type = "text" name="uid" value="<?php echo $row['uid'];?>"required/>
                <br/>
              </td>
            </tr>
            <tr>
              <td><span style="color:#0c6500;">First Name*:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type = "text" name="fname" value="<?php echo $row['fname'];?>"required/>
                <br/></td>
            </tr>
            <tr>
              <td><span style="color:#0c6500;">Second Name*</span>:&nbsp;&nbsp;
                <input type = "text" name="sname" value="<?php echo $row['sname'];?>"required/>
                <br/></td>
            </tr>
            <tr>
              <td><span style="color:#0c6500;">Email*:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type = "text" name="email" value="<?php echo $row['email'];?>"required/>
                <br/></td>
            </tr>
            <tr>
              <td><span style="color:#0c6500;">My Position*:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type = "text" name="position" value="<?php echo $row['position'];?>"required/>
                <br/></td>
            </tr>
            <tr>
              <td><span style="color:#0c6500;">User Class*:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type = "text" name="class" value="<?php echo $row['class'];?>"required/>
                <br/></td>
            </tr>
            <tr>
              <td><span style="color:#0c6500;">Document Code*:</span>&nbsp;
                <input type = "text" name="code" value="<?php echo $row0['code'];?>"required/>
                <br/></td>
            </tr>
            <tr>
              <td><span style="color:#0c6500;">Document Title*:</span>&nbsp;
                <input type = "text" name="title" value="<?php echo $file;?>"required/>
                <br/></td>
            </tr>
          </table>
          <input type = "submit" value="Request" />
          <br/>
          <span style="color:#0033cc" align="left">*Note: Request requires administrators confirmation. Check your email.</span>
        </form>
        <?php
			} //close while loop
			?>
    </div>
    
    </center>
    
  </table>
</div>
<div id="footer">
  <p style="float:right">*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p>
</div>
</body>
</html>
