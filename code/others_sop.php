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
<table>
<tr>
<td>
<center><h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">LABORATORY FILES.</b></h2><br/></center>
<span style="color:#0033cc; font-weight:bold; line-height:30px">Others:</span><br/>
<span>The documents in this category include:</span></br></br>
<style>
th {
    background-color: green;
    color: white;
}
</style>
<?php
$query = mysqli_query($connection,"select * FROM documents WHERE code LIKE'%OT%'");
echo "<table border='1px solid green'>"; // start a table tag in the HTML
echo "<tr>"; echo "<th>SOP Title</th>";echo "<th>Code </th>";echo "<th>Authors </th>"; echo "</tr>";
while($row = mysqli_fetch_array($query)){;
$filename= $row['title'];
echo "<tr><td><a href='document_details.php?filename=$filename'>" . $row['title'] . "</a></td><td>" .$row['code'] . "</td><td>" . $row['authors']."</td></tr>";
}
echo "</table>"; //Close the table in HTML
//
//echo "<span style='color:#0033cc; line-height:20px'>SOP Title:</span>"."&nbsp;&nbsp;<b>".$row['title']."</b><br/>";
//echo "<span style='color:#0033cc; line-height:20px'>SOP Code:</span>" ."&nbsp;&nbsp;".$row['code']."<br/>";
//echo "<span style='color:#0033cc; line-height:20px'>Authors:</span>"."&nbsp;&nbsp;".$row['authors']."<br/>";
//echo "<a href='download.php?filename=$filename'><img src='images/download.jpg'><span style='color:#0c6500; font-weight:normal'>Download</a>"."&nbsp;&nbsp;"."<a href='document-details.php?filename=$filename'><span style='color:#0c6500; font-weight:normal'>More Details</span></a>"."<br/><br/>";
?>
<ol style="color:#0c6500; font-weight:600; padding-left:10px;">
<li><a href="#" style="color:#000000; font-weight:500; text-decoration:none;">Laboratory manuals (quality, service, safety, training).</li>
<li><a href="#" style="color:#000000; font-weight:500; text-decoration:none;">Policy documents.</li>
<li><a href="#" style="color:#000000; font-weight:500; text-decoration:none;">Forms and work sheets.</li>
<li><a href="#" style="color:#000000; font-weight:500; text-decoration:none;">Annexes.</li>
</ol>
</td></tr>
</table>
</center>
</div>
</div>
<div id="footer"><p style="float:right">*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p></div>
</body>
</html>