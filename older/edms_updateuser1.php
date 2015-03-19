<?php
include("session.php");

$error=''; // Variable To Store Error Message
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
<table border="1" bordercolor="#0c6500" >
<tr>
<td>
<center>
<h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">Delete User</b></h2><br/>
<form name="delete" method="POST">
	<table cellspacing="1" border="0" name="delete">
	  <tbody>
              
			  <tr>
                <td><b>Available Users*:</b></td>
                <td colspan="5">
				<select name="field">
                <?php 
                $sql = mysql_query("SELECT fname, sname FROM edms_user");
                 while ($row = mysql_fetch_array($sql)){
                ?>
                <option value="<?php echo $row['fname'];?>"><?php echo $row['fname'] ."&nbsp;&nbsp;". $row['sname']; ?></option>
                 <?php
               // close while loop 
                 }
                 ?>
				</td><td>
			<button class="positive" value="Delete" name="delete" type="Submit">UPDATE</button>
			<button class="negative" value="Cancel" name="cancel" type="Submit">CANCEL</button>
			<div id="error" style="color:#FF0000;"><?php echo $error; ?></div>
			</td></tr>
        </tbody></table>
   </form>
   <style>
  th {color:#0033cc}
</style>
</center>
<?php
if (isset($_POST['delete'])) {
$field = mysql_real_escape_string($_POST['field']);
 // Otherwise we connect to our Database 
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('edms') or die(mysql_error()); 
//
$data = mysql_query("select * FROM edms_user WHERE fname = '$field'"); 
 while($row = mysql_fetch_array($data))
 { 
 ?>
<form name = "updateform" method="POST" action="">
<table>
<tr>
<td>First Name:* </td> <td><input type = "text" name="fname" value="<?php echo $row['fname'];?>"/><br/> </td>
</tr>
<tr>
<td>Second Name:* </td> <td> <input type = "text" name="sname" value="<?php echo $row['sname'];?>"/><br/></td>
</tr>
<tr>
<td>Email Address:* </td> <td> <input type = "text" name="email" value="<?php echo $row['email'];?>"/><br/><br/></td>
</tr>
<tr>
<td> Password:* </td> <td> <b>Only users can change their passwords!</b><br/> <br/></td>
</tr>
<tr>
<td>User Class:*</td><td> <select name="class">
<option value="Administrator" selected="selected">Admin</option>
<option value="Technician">Technician</option>
<option value="Librarian">Librarian</option>
<option value="Visitor">Visitor</option>
</select>
</td>
</tr>
</tr>
</table>
<font color='red'> <DIV id="une"> </DIV> </font>
<input type = "submit" value="Update User" />
</form>
                 <?php
               // close while loop 
                 }
				 }
                 ?>


 
</td></tr>
</table>
</center>
<p>*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p>
</div>
</div>
</body>
</html>