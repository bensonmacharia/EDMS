<?php
include("session.php");
include ("connection.php");
if(!(isset($_SESSION['login_user'])&&$_SESSION['login_user']!="")){
    header("Location:index.php");
	}
if($type!='Librarian') 
      {
    echo "<script>alert(\"Access Denied!!.\");</script>";
	echo "<script>location.href=\"home.php\";</script>";
      } 	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin| EDMS</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<!--[if IE ]> <link href="css/ie.css" rel="stylesheet" type="text/css" /> <![endif]-->
     <style TYPE="text/css">
       table.admin
	   {
        background: #CCCCCC;
		border-spacing: 5px;
       }
	   table.admin th 
	   {
	   background: #83a9f7;
	   color:#FFFFFF;
	   }
	   table.admin td a hover 
	   {
	   color:#000000;
	   background-color:#83a9f7;
	   }
	   table th, td { padding: 5px; }

</style>
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
<tbody>
<tr><td>
   <table cellpadding="5" cellspacing="5"><tr><td>
     <center>
      <h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">Administartor's Panel</b></h2><br/>
      </center>
      <b>Permission: >> <span style="color:#0033cc"><?php echo "" . $type . "" ?>.</span></b>
     </td></tr>
	 </table>
</td></tr>
<tr><td>
       <table class="admin" cellpadding="5" cellspacing="5">
		<tr>
		<th> Users</th>
		<th> Category</th>
		<th> File</th>        
		<th> Reports</th></tr>
		<tr>
            <td>
                <!-- User Admin -->
                <table border="0">
                    <tbody><tr>
                        <td><b><a href="http://localhost/edms/edms_adduser.php">Add</a></b></td>
                    </tr>
                    <tr>
                        <td><b><a href="http://localhost/edms/edms_deleteuser.php">Delete</a></b></td>
                    </tr>
                    <tr>
                        <td><b><a href="http://localhost/edms/edms_updateuser.php">Update</a></b></td>
                    </tr>
                    <tr>
                        <td><b><a href="http://localhost/edms/edms_userdisplay.php">Display</a></b></td>
                    </tr>
                </tbody></table>
            </td>
<td>
    <!-- Category Admin -->
    <table border="0">
        <tbody><tr>
            <td><b><a href="http://localhost/edms/edms_addcategory.php">Add</a></b></td>
        </tr>
        <tr>
            <td><b><a href="http://localhost/edms/edms_deletecategory.php">Delete</a></b></td>
        </tr>
        <tr>
            <td><b><a href="http://localhost/edms/edms_updatecategory.php">Update</a></b></td>
        </tr>
        <tr>
            <td><b><a href="http://localhost/edms/edms_displaycategory.php">Display</a></b></td>
        </tr>
    </tbody></table>
</td>
<td>
    <!-- Files Admin -->
    <table border="0" valign="top">
        <tbody><tr>
            <td><b><a href="http://localhost/edms/edms_allfiles.php">All Files</a></b></td>
        </tr>
        <tr>
            <td><b><a href="http://localhost/edms/edms_forapproval.php">Files to Approve</a></b></td>
        </tr>
        <tr>
            <td><b><a href="http://localhost/edms/edms_allrevisions.php">Rejected for Revision</a></b></td>
        </tr>
        <tr>
            <td><b><a href="http://localhost/edms/edms_restoredeletefile.php">Files Deleted</a></b></td>
        </tr>
    </tbody></table>
</td>
    <td>
    <!-- Reports Admin -->
    <table border="0" valign="top">
        <tbody><tr>
            <td><b><a href="#">Delete/Undelete</a></b></td>
        </tr>
        <tr>
            <td><b><a href="#">Reviews</a></b></td>
        </tr>
        <tr>
            <td><b><a href="#">Rejections</a></b></td>
        </tr>
        <tr>
            <td><b><a href="#">Check Expiration</a></b></td>
        </tr>
		        <tr>
            <td><b><a href="#">Downloads</a></b></td>
        </tr>
    </tbody></table>
</td>
</tr> 
</tbody></table>
</table>
</center>
<p>*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p>
</div>
</div>
</body>
</html>