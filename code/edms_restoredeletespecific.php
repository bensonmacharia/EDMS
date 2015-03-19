<?php
include("session.php");
include ("connection.php");
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
var x = new Date()
document.getElementById('ct').innerHTML = x;
tt=display_c();
 }
</script>
</head>
<body onload=display_ct();>
<div id="inner_header_wrapper">
<div id="header">
   <div id="logo"><img src="images/banner-lab.png"><b id="welcome">Logged in as: <a href="#"><?php echo $login_session; ?></a></b></div>
   <div id="profile">
<b id="logout"><a href="logout.php">Log Out</a></b>
</div>
   <header id="title"><h2>Electronic Documents Management System (EDMS)</h2>&nbsp; &nbsp;
   <!-- <div id="topmenu">
		<ul>
			<li class="active"><a href="index.php"><span>Home</span></a></li>
			<li class=""><a href="files.php"><span>Files</span></a></li>
			<li class=""><a href="tools.php"><span>Tools</span></a></li>
			<li class=""><a href="management.php"><span>Management</span></a></li>
			<li class="last"><a href="help.php"><span>Help</span></a></li>
		</ul>
</div> -->
<div style="width: 783px; height: 52px; background: url(images/bak_top.jpg) no-repeat;">
       <div style="width: 783px; position: absolute; margin: 8px 0px 0px 0px; font-size: 11px; vertical-align: top;">
               <table cellspacing="0" cellpadding="0" border="0" width="100%" >
                	<tbody>
					<tr>
                	<td width="300px"><span id='ct' ></span></td>
					<td width="200px">
				    <table cellspacing="0" cellpadding="0" border="0" width="100%" >
				    <tbody><tr></tr>
				    </tbody></table>
				     </td>
					 <td width="100px;" style="font-size: 10px;">
					 
				       </td>
					<td style="font-size: 10px; font-weight: bold;"><a href="http://localhost/edms/home.php" style="text-decoration: none; font-size:10px; background: #01D928; color: #FFF; border: 0px; padding: 3px 7px;">HOME</a>&nbsp;
					 <a href="http://localhost/edms/new-users.php" style="text-decoration: none; font-size:10px; background: #0033cc; color: #FFF; border: 0px; padding: 3px 7px;">NEW USER</a>												                			</td>
                		</tr>
                	</tbody>
					</table>
              </div>
            </div>
</div>
   </header>
</div></div>


<div id="container">
<div id="main1">
<center>
<table>
<tr>
<td>
<center>
<h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">Delete & Restore Options</b></h2><br/>
</center>

<?php
if(!(isset($_SESSION['login_user'])&&$_SESSION['login_user']!="")){
    header("Location:index.php");
	}

$id=$_GET['id'];

$data = mysqli_query($connection,"select * FROM edms_delete where del_id='$id'");
while($row = mysqli_fetch_array($data))
 { 
$filename=$row['filename'];
echo "<b style='color:#0c6500'>DOCUMENT DETAILS</b><br/>";
echo "<span style='color:#0033cc'>Document Index:</span>" ."&nbsp;&nbsp;". $row['del_id']."<br/>";
echo "<span style='color:#0033cc'>File Name:</span>" ."&nbsp;&nbsp;". $row['filename']."<br/>";
echo "<span style='color:#0033cc'>Category:</span>" ."&nbsp;&nbsp;". $row['category']."<br/>";
echo "<span style='color:#0033cc'>Owner:</span>" ."&nbsp;&nbsp;". $row['auth_name']."<br/>";
echo "<span style='color:#0033cc'>Deleted By:</span>" ."&nbsp;&nbsp;". $row['deleter']."<br/>"; 
echo "<span style='color:#0033cc'>Size:</span>" ."&nbsp;&nbsp;". $row['size']."Kbs"."<br/>"; 
echo "<span style='color:#0033cc'>Reason for Delete:</span>" ."&nbsp;&nbsp;". $row['reason']."<br/>";
echo "<span style='color:#0033cc'>Date Deleted:</span>" ."&nbsp;&nbsp;". $row['del_date']."<br/><br/>"; 
echo "<a href='edms_restoredeletefile.php'><img src='images/back.png'>Go Back</a>"."&nbsp;&nbsp;"."<a href='restore.php?id=$id'><img src='images/revision.png'>Restore</a>"."&nbsp;&nbsp;"."<a href='delete.php?id=$id'><img src='images/delete.png'>Delete Permanently</a>"."<br/><br/>"; 
} 

mysqli_close(); //Make sure to close out the database connection
?>

</td></tr>
</table>
</center>
</div>
</div>
<div id="footer"><p style="float:right">*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p></div>
</body>
</html>