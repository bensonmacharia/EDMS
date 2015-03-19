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
        <?php include 'topmenu.php';?>
      </div>
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
<h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">View User Details</b></h2><br/>
<form name="display" method="POST">
	<table>
	  <tbody>
              
			  <tr>
                <td><b>Available Users*:</b></td>
                <td colspan="5">
				<select name="field">
                <?php 
                $sql = mysql_query("SELECT * FROM edms_user");
                 while ($row = mysql_fetch_array($sql)){
                ?>
                <option value="<?php echo $row['uid'];?>"><?php echo $row['fname'] ."&nbsp;&nbsp;". $row['sname']; ?></option>
                 <?php
               // close while loop 
                 }
                 ?>
				</td><td>
			<input type="submit" value="DISPLAY" name="display" />
              
              &nbsp;
              
              &nbsp;
              
              &nbsp;
              
              <input type="button" value="CANCEL" onClick="document.location.href='home.php';" />
			</td></tr>
        </tbody></table>
   </form>
   <style>
  th {color:#0033cc}
  
</style>
</center>
<?php
if (isset($_POST['display'])) {
$field = mysql_real_escape_string($_POST['field']);
 // Otherwise we connect to our Database 

$data = mysqli_query($connection,"select * FROM edms_user WHERE uid = '$field'"); 
echo "<table>"; // start a table tag in the HTML
echo "<tr>"; echo "<th>Membership ID </th>";echo "<th>Names: </th>";echo "<th>Email: </th>";echo "<th>Class: </th>";echo "<th>Position: </th>"; echo "<th>Reg.Date/Time: </th>"; echo "</tr>";
 while($row = mysqli_fetch_array($data))
 { 
 echo "<tr><td>" . $row['uid'] . "</td><td>" . $row['fname'] ."&nbsp;&nbsp;". $row['sname']. "</td><td>" . $row['email'] ."</td><td>" . $row['class'] ."</td><td>" . $row['position']."</td><td>". $row['Reg_Date']. "</td></tr>" ;

}
 
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