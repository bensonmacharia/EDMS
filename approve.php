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
<div id="main1">
<center>
<table >
<tr>
<td>
<center>
<h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">Approve Document</b></h2><br/>
</center>

<?php
if(!(isset($_SESSION['login_user'])&&$_SESSION['login_user']!="")){
    header("Location:index.php");
	}


$code=$_GET['code'];
$data = mysqli_query($connection,"select * FROM documents where code='$code'");
while($row = mysqli_fetch_array($data))
 { 
$filename=$row['title'];
echo "<b style='color:#0c6500'>DOCUMENT DETAILS</b><br/>";
echo "<span style='color:#0033cc'>Document Index:</span>" ."&nbsp;&nbsp;". $row['doc_id']."<br/>";
echo "<span style='color:#0033cc'>Document Code:</span>" ."&nbsp;&nbsp;". $row['code']."<br/>";
echo "<span style='color:#0033cc'>File Name:</span>" ."&nbsp;&nbsp;". $row['title']."<br/>";
echo "<span style='color:#0033cc'>Category:</span>" ."&nbsp;&nbsp;". $row['record']."<br/>";
echo "<span style='color:#0033cc'>Authors:</span>" ."&nbsp;&nbsp;". $row['authors']."<br/>";
echo "<span style='color:#0033cc'>Version:</span>" ."&nbsp;&nbsp;". $row['version']."<br/>";
echo "<span style='color:#0033cc'>Size:</span>" ."&nbsp;&nbsp;". $row['size']."Kbs"."<br/>"; 
echo "<span style='color:#0033cc'>Effective Per:</span>" ."&nbsp;&nbsp;". $row['effective_per']."<br/>"; 
echo "<span style='color:#0033cc'>Evaluate Before:</span>" ."&nbsp;&nbsp;". $row['evaluate_before']."<br/>";  
echo "<span style='color:#0033cc'>Distributed To:</span>" ."&nbsp;&nbsp;". $row['distributed_to']."<br/>"; 
echo "<span style='color:#0033cc'>Remarks:</span>" ."&nbsp;&nbsp;". $row['remarks']."<br/>";
echo "<span style='color:#0033cc'>Date Uploaded:</span>" ."&nbsp;&nbsp;". $row['date_upload']."<br/><br/>"; 
echo "<a href='edms_forapproval.php'><img src='images/back.png'>Go Back</a>"."&nbsp;&nbsp;"."<a href='download.php?filename=$filename'><img src='images/download.jpg'>Download</a>" ."&nbsp;&nbsp;". "<a href='edms_revision.php?code=$code'><img src='images/revision.png'>Revision</a>"."&nbsp;&nbsp;"."<a href='edms_approve.php?code=$code'><img src='images/approved.png'>Approve</a>"."<br/><br/>"; 
} 


mysqli_close(); //Make sure to close out the database connection
?>

</td></tr>
</table>
</center>
<p>*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p>
</div>
</div>
</body>
</html>