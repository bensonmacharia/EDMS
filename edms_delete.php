<?php
include("session.php");
include ("connection.php");
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
<td>
<center>
<h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">Delete Document</b></h2><br/>
</center>

<?php
$code=$_GET['code'];

$data = mysqli_query("select * from documents where code  = '$code'");
$row = mysqli_fetch_array($connection,$data);
echo "<b style='color:red'>This document is to be deleted!:</b><br/><br/>";
echo "<span style='color:#0033cc;line-height:20px'>Document Title:</span>" ."&nbsp;&nbsp;". $row['title']."<br/>";
echo "<span style='color:#0033cc;line-height:20px'>Document Code:</span>" ."&nbsp;&nbsp;". $row['code']."<br/>";
echo "<span style='color:#0033cc;line-height:20px'>Authors:</span>" ."&nbsp;&nbsp;". $row['authors']."<br/><br/>";
echo "<b>Reason:</b><br/>";
echo"<form action='' method='post'>";
echo "<textarea rows='5' cols='50' name='description' id='description' placeholder='Explain the reason deleting this file.'></textarea><br/>";
echo "<a href='document_details.php?code=$code'><img src='images/back.png'>Go Back</a>&nbsp;&nbsp;&nbsp;&nbsp;
<input type='submit' name='delete' value='DELETE'>&nbsp;&nbsp;";
?>
<input type="button" value="CANCEL" onClick="document.location.href='files.php';" />
<br/><br/>
<?php
echo"</form>";
$code=$row['title'];
$filename=$row['title'];
$category=$row['record'];
$authors=$row['authors'];
$deleter=$user_name;
$size = $row['size'];

if (isset($_POST['delete'])) {

$reason = mysqli_real_escape_string($_POST['description']);

$y = "insert into delete(code, title, category, authors, deleter, size, reason) values('$filename','$category','$authors','$deleter','$size','$reason')"; 
      if(mysqli_query($connection,$y))
       {
         $data = "DELETE FROM documents WHERE code  = '$code'"; 
             if(mysqli_query($connection,$data))
               { 
                echo "<script>alert(\"File Deleted! Check on other files.\");</script>";
	            echo "<script>location.href=\"files.php\";</script>";
                   
				}
				else{
				echo "<script>alert(\"Error! Check on other files.\");</script>";
	            echo "<script>location.href=\"files.php\";</script>";
				}
				
	    
        }
 }


?>

</td></tr>
</table>
</center>
  </div>
</div>
<div id="footer">
  <p style="float:right">*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p>
</div>
</body>
</html>
