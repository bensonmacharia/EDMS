<?php
include("session.php");
include ("connection.php");
if(!(isset($_SESSION['login_user'])&&$_SESSION['login_user']!="")){
    header("Location:index.php");
	}
if($type!='Administrator') 
      {
    echo "<script>alert(\"Access Denied for this class of user!!.\");</script>";
	echo "<script>location.href=\"files.php\";</script>";
      } 	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin| EDMS</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<!--[if IE ]> <link href="css/ie.css" rel="stylesheet" type="text/css" /> <![endif]-->
<style>
table {
    *border-collapse: collapse; /* IE7 and lower */
    border-spacing: 0;
    width: 100%;    
}
.bordered {
    border: solid #ccc 1px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0 1px 1px #ccc; 
    -moz-box-shadow: 0 1px 1px #ccc; 
    box-shadow: 0 1px 1px #ccc;         
}
.bordered tr:hover {
    background: #fbf8e9;
    -o-transition: all 0.1s ease-in-out;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -ms-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;     
}    
.bordered td, .bordered th {
    border-left: 1px solid #ccc;
    border-top: 1px solid #ccc;
    padding: 10px;
    text-align: left;    
}

.bordered th {
    background-color: #dce9f9;
	color:#000;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));
    background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:    -moz-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:     -ms-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:      -o-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:         linear-gradient(top, #ebf3fc, #dce9f9);
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
    border-top: none;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); 
}
.bordered td:first-child, .bordered th:first-child {
    border-left: none;
}
.bordered th:first-child {
    -moz-border-radius: 6px 0 0 0;
    -webkit-border-radius: 6px 0 0 0;
    border-radius: 6px 0 0 0;
}
.bordered th:last-child {
    -moz-border-radius: 0 6px 0 0;
    -webkit-border-radius: 0 6px 0 0;
    border-radius: 0 6px 0 0;
}

.bordered th:only-child{
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    border-radius: 6px 6px 0 0;
}

.bordered tr:last-child td:first-child {
    -moz-border-radius: 0 0 0 6px;
    -webkit-border-radius: 0 0 0 6px;
    border-radius: 0 0 0 6px;
}

.bordered tr:last-child td:last-child {
    -moz-border-radius: 0 0 6px 0;
    -webkit-border-radius: 0 0 6px 0;
    border-radius: 0 0 6px 0;
}
</style>
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
       <table class="bordered" cellpadding="5" cellspacing="5">
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
            <td><b><a href="http://localhost/edms/edms_allfiles.php">All Files Uploaded</a></b></td>
        </tr>
        <tr>
            <td><b><a href="http://localhost/edms/edms_allrevisions.php">Files for Revision</a></b></td>
        </tr>
        <tr>
            <td><b><a href="http://localhost/edms/edms_restoredeletefile.php">Files Deleted</a></b></td>
        </tr>
		 <tr>
            <td><b><a href="http://localhost/edms/archived_files.php">Archived Files</a></b></td>
        </tr>
    </tbody></table>
</td>
    <td>
    <!-- Reports Admin -->
    <table border="0" valign="top">
        <tbody><tr>
            <td><b><a href="http://localhost/edms/user_activity.php">Users Activity</a></b></td>
        </tr>
        <tr>
            <td><b><a href="#">Total Reviews</a></b></td>
        </tr>
        <tr>
            <td><b><a href="http://localhost/edms/expire_report.php">Expiry Report</a></b></td>
        </tr>
		        <tr>
            <td><b><a href="http://localhost/edms/download_report.php">Downloads</a></b></td>
        </tr>
    </tbody></table>
</td>
</tr> 
</tbody></table>
</table>
</center>
</div>
</div>
<div id="footer"><p style="float:right">*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p></div>
</body>
</html>