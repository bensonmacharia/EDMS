<?php
include("session.php");
if(!(isset($_SESSION['login_user'])&&$_SESSION['login_user']!="")){
    header("Location:index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> | EDMS</title>
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
<center>
<h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">Documents to expire this month</b></h2><br/>
</center>
<style>
th {
    background-color: green;
    color: white;
}
</style>
<?php
$con = mysql_connect("localhost","root","");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}
$today = date('Y-m-d');
mysql_select_db("edms", $con);

$result = mysql_query("select * FROM documents WHERE evaluate_before >= DATE(now()) AND evaluate_before <= DATE_ADD(DATE(now()), INTERVAL 1 MONTH)");
if($row = mysql_fetch_array($result))
{
$expiry_date=$row['evaluate_before'];
$datediff = strtotime($expiry_date) - strtotime($today);
$days_to_expire =  floor($datediff/(60*60*24));
$week = 30;
echo $days_to_expire."<br/>";
$query = mysql_query("select count(1) FROM documents WHERE evaluate_before >= DATE(now()) AND evaluate_before <= DATE_ADD(DATE(now()), INTERVAL 1 MONTH)");
$row1 = mysql_fetch_array($query);
$total1 = $row1[0];
echo "<a href='edms_forapproval.php' style='line-height:20px; font-weight:500'>" .$total1 ." document(s)</a> needs review in two weeks time.<br/>";

}

?>
</td></tr>
</table>
</center>
</div>
</div>
<div id="footer"><p style="float:right">*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p></div>
</body>
</html>

<?php
//8 days interval
SELECT
    *
FROM
    products
WHERE
    products.expiry_date >= DATE(now())
AND
    products.expiry_date <= DATE_ADD(DATE(now()), INTERVAL 8 DAY)
	
//2 weeks interval
SELECT
    *
FROM
    products
WHERE
    products.expiry_date >= DATE(now())
AND
    products.expiry_date <= DATE_ADD(DATE(now()), INTERVAL 2 WEEK)
	
	