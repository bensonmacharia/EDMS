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
              <h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">Document Options</b></h2>
              <br/>
            </center>
            <?php
$code=$_GET['code'];
$data = mysqli_query($connection,"select * FROM documents WHERE code='$code'");
while($row = mysqli_fetch_array($data))
 { 
$filename=$row['title'];
$code=$row['code'];
echo "<b style='color:#0c6500'>DOCUMENT DETAILS</b><br/>";
echo "<span style='color:#0033cc;line-height:20px'>Document Code:</span>" ."&nbsp;&nbsp;". $code."<br/>";
echo "<span style='color:#0033cc;line-height:20px'>File/ Category:</span>" ."&nbsp;&nbsp;". $row['record']."<br/>";
echo "<span style='color:#0033cc;line-height:20px'>Document Title:</span>" ."&nbsp;&nbsp;". $filename."<br/>";
echo "<span style='color:#0033cc;line-height:20px'>Version:</span>" ."&nbsp;&nbsp;". $row['version']."<br/>";
echo "<span style='color:#0033cc;line-height:20px'>Authors:</span>" ."&nbsp;&nbsp;" . $row['authors']."<br/>";
echo "<span style='color:#0033cc;line-height:20px'>Verifiers:</span>" ."&nbsp;&nbsp;" . $row['verifiers']."<br/>";
echo "<span style='color:#0033cc;line-height:20px'>Authorizers:</span>" ."&nbsp;&nbsp;" . $row['authorizers']."<br/>";
echo "<span style='color:#0033cc;line-height:20px'>Distributed to:</span>" ."&nbsp;&nbsp;". $row['distributed_to']."<br/>";
echo "<span style='color:#0033cc;line-height:20px'>Size:</span>" ."&nbsp;&nbsp;". $row['size']."&nbsp;Kbs"."<br/>"; 
echo "<span style='color:#0033cc;line-height:20px'>Evaluate Before:</span>" ."&nbsp;&nbsp;". $row['evaluate_before']."<br/>"; 
echo "<span style='color:#0033cc;line-height:20px'>Effective Per:</span>" ."&nbsp;&nbsp;". $row['effective_per']."<br/>";
echo "<span style='color:#0033cc;line-height:20px'>Continued Per:</span>" ."&nbsp;&nbsp;". $row['continued_per']."<br/><br/>";
	 if($type=='Administrator') 
      {
echo "<form name='delete' method='POST'><a href='files.php'><img src='images/back.png'>Go Back</a>"."&nbsp;&nbsp;"."<a href='download_request.php?filename=$filename'><img src='images/download.jpg'>Download</a>" ."&nbsp;&nbsp;". "<a href='edms_revision.php?code=$code'><img src='images/revision.png'>Revision</a>"."&nbsp;&nbsp;"."<img src='images/delete.png'><input type='submit' value='Delete' name='delete' /></form>"."<br/><br/>"; 
      }
	  else
	  {
echo "<a href='files.php'><img src='images/back.png'>Go Back</a>"."&nbsp;&nbsp;"."<a href='download_request.php?filename=$filename'><img src='images/download.jpg'>Download</a>" ."&nbsp;&nbsp;"."<br/><br/>"; 
      }

} 

if (isset($_POST['delete'])) {
echo "<script>var r=confirm(\"Are you sure you want to delete this document.\");</script>";
echo "<script>if(r==true){location.href=\"edms_delete.php?code=$code\";}else{location.href=\"document_details.php?code=$code\";}</script>";	   

}

mysqli_close(); //Make sure to close out the database connection
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
