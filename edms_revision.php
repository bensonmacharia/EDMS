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
  <div id="main">
    <center>
      <table>
        <tr>
          <td><center>
              <h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">Request Revision</b></h2>
              <br/>
            </center>
            <?php
$code=$_GET['code'];

$data = mysqli_query($connection,"select * FROM documents WHERE code  = '$code'"); 
$row = mysqli_fetch_array($data);

echo "<b>This document is to be sent back for review:</b><br/><br/>";
echo "<span style='color:#0033cc; line-height:20px'>Document Code:</span>" ."&nbsp;&nbsp;". $code."<br/>";
echo "<span style='color:#0033cc; line-height:20px'>Document Title:</span>" ."&nbsp;&nbsp;". $row['title']."<br/>";
echo "<span style='color:#0033cc; line-height:20px'>Authors:</span>" ."&nbsp;&nbsp;". $row['authors']."<br/><br/>";
echo "<b>Reason:</b><br/>";
echo"<form action='' method='post'>";
echo "<textarea rows='5' cols='50' name='description' id='description' placeholder='Explain the reason for revision and suggest editing.'></textarea><br/>";
echo "<a href='home.php'><img src='images/back.png'>Back Home</a>&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='submit' value='Send'><br/><br/>";
echo"</form>";
echo "*Note: An email will be sent to "."<span style='color:#0033cc'>".$row['authors']."</span>"." to request for document revision.<br/><br/>";

//$code =$row['code'];
$filename=$row['title'];
$size = $row['size'];
$sender=$user_name;
$author= $row['authors'];

if (isset($_POST['submit'])) {
$reason = $_POST['description'];

	 $y = mysqli_query($connection,"select * FROM users WHERE full_name LIKE'%$author%'"); 
	 
	 while($row1 = mysqli_fetch_array($y))
	 {
	   $email = $row1['email'];
	   $fname = $row1['fname'];
	   $code = $row['code'];
	   //send mail
	    require("PHPMailer-master/PHPMailerAutoload.php"); //or select the proper destination for this file if your page is in some   //other folder
           ini_set("SMTP","ssl://smtp.gmail.com"); 
           ini_set("smtp_port","465"); //No further need to edit your configuration files.
           $mail = new PHPMailer();
           $mail->SMTPAuth = true;
           $mail->Host = "smtp.gmail.com"; // SMTP server
           $mail->SMTPSecure = "ssl";
           $mail->Username = "muchokibenson12@gmail.com"; //account with which you want to send mail. Or use this account. i dont care :-P
		   $mail->From = "muchokibenson12@gmail.com";
           $mail->FromName = "Electronic Documents Management System (EDMS) Administrator";
           $mail->Password = "28624259"; //this account's password.
           $mail->Port = "465";
           $mail->IsSMTP();  // telling the class to use SMTP
           $rec1=$email; //receiver. email addresses to which u want to send the mail.
           $mail->AddAddress($rec1);
           $mail->Subject  = "EDMS: Request for Document Revision";
           $mail->Body     = 'Hello '.$fname .'The following document was sent for your revision: '.$code.'Title: '.$filename.'Reason: '.$reason.'Sender: '.$user_name;
           $mail->WordWrap = 100;
           $mail->SMTPDebug = 4;
              if(!$mail->Send()) {
                  echo 'Message was not sent! Check your network connection and try again.';
                  //echo 'Mailer error: ' . $mail->ErrorInfo;
                           } 
              else {
			      $y="update documents SET review = 1 WHERE code = '$code'";
                  if(!mysqli_query($connection,$y)){die('Error occured:'.mysqli_error());}
		 
                  echo "<script>alert(\"Message sent!.\");</script>";
	              echo "<script>location.href=\"home.php\";</script>";
            } 
	   
	   
	 } 
	 
	 
	 }
      

?>
          </td>
        </tr>
      </table>
    </center>
  </div>
</div>
<div id="footer">
  <p style="float:right">*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p>
</div>
</body>
</html>
