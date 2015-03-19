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
<table >
<tr>
<td>
<center>
<h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">Approve Users</b></h2><br/>
</center>

<?php
$email=$_GET['email'];
$data = mysqli_query($connection,"select * FROM users where email='$email'");
while($row = mysqli_fetch_array($data))
 { 
echo "<b style='color:#0c6500'>USER PROFILE</b><br/>";
echo "<span style='color:#0033cc;line-height:20px'>User ID:</span>" ."&nbsp;&nbsp;". $row['uid']."<br/>";
echo "<span style='color:#0033cc;line-height:20px'>First Name:</span>" ."&nbsp;&nbsp;". $row['fname']."<br/>";
echo "<span style='color:#0033cc;line-height:20px'>Second Name:</span>" ."&nbsp;&nbsp;". $row['sname']."<br/>";
echo "<span style='color:#0033cc;line-height:20px'>Email:</span>" ."&nbsp;&nbsp;". $email."<br/>";
echo "<span style='color:#0033cc;line-height:20px'>Class:</span>" ."&nbsp;&nbsp;". $row['class']."<br/>";
echo "<span style='color:#0033cc;line-height:20px'>Sign Up Date:</span>" ."&nbsp;&nbsp;". $row['Reg_Date']."<br/><br/>";
echo "<a href='edms_usersapproval.php'><img src='images/back.png'>Go Back</a>"."&nbsp;&nbsp;"."<a href='edms_approveuser.php?email=$email'><img src='images/approved.png'>Approve</a>"."&nbsp;&nbsp;"."<a href='JavaScript:void(0);' onclick='display()'><img src='images/edit.jpg'>Edit User Profile</a><br/><br/>";
?>
<script type="text/javascript">
function display() {

      document.location.href = 'edms_updateuser.php';
    }
</script>
<?php
} 

mysqli_close(); //Make sure to close out the database connection
?>
<br/>
</td></tr>
</table>
</center>

</div>
</div>
<div id="footer"><p style="float:right">*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p></div>
</body>
</html>