<?php
include("session.php");
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
<style type="text/css">
input[type=text]
{
  border: 1px solid #ccc;
  border-radius: 3px;
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  width:250px;
  min-height: 5px;
  padding: 4px 20px 4px 8px;
  font-size: 12px;
  -moz-transition: all .2s linear;
  -webkit-transition: all .2s linear;
  transition: all .2s linear;
}
input[type=text]:focus
{
  width: 250px;
  border-color: #51a7e8;
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1),0 0 5px rgba(81,167,232,0.5);
  outline: none;
}
#description {
    resize: none;
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
      <td><center>
          <h2 style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:18px"><b style="color:#0c6500">Upload File.</b></h2>
        </center>
        <b>Note: Maximum upload size, 5MB </b><br>
        <br>
        <div style=" color:#ff0000; font-size:0.9em">* required fields</div>
        <div id="form">
          <form name=myform ENCTYPE="multipart/form-data" method="post" action="act_upload.php">
            <table align="center" width=80%>
              <INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="5000000">
              <!--<input id="email" name="email" type="text" placeholder="Author Email"><br><br>-->
              <tr>
                <td><span style="color:#0033cc;">Upload Document: *</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <INPUT NAME="uploaded_file" TYPE="file">
                  <br>
                  <br></td>
              </tr>
              <tr>
                <td><span style="color:#0033cc;">Record Type: * </span>&nbsp;&nbsp;
                  <select name="record">
                    <?php 
            $sql = mysql_query("SELECT name FROM categories");
             while ($row = mysql_fetch_array($sql)){
              ?>
                    <option value="<?php echo $row['name'];?>"><?php echo $row['name']; ?></option>
                    <?php
               // close while loop 
                 }
                 ?>
                  </select>
                  <br></td>
              </tr>
              <tr>
                <td><span style="color:#0033cc;">Code: * </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input name="code" type="text" placeholder="unique code e.g. METH 02V01" required>
                  <br></td>
              </tr>
              <tr>
                <td><span style="color:#0033cc;">Version: * </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input name="version" type="text" placeholder="e.g. 01" required>
                  <br></td>
              </tr>
              <tr>
                <td><span style="color:#0033cc;">Effective Per: * </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input name="effective_per" type="date" placeholder="2015-12-31" required>
                  <br></td>
              </tr>
              <tr>
                <td><span style="color:#0033cc;">Evaluate Before: * </span>
                  <input name="evaluate_before" type="date" placeholder="2015-12-31" required>
                  <br></td>
              </tr>
              <tr>
                <td><span style="color:#0033cc;">Distributed to: * </span>&nbsp;
                  <input name="distributed_to" type="text" placeholder="e.g. CN Lab1 and CN Lab2" required>
                  <br></td>
              </tr>
              <tr>
                <td><span style="color:#0033cc;">Authors: * </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input name="authors" type="text" placeholder="e.g. John-Doe for all authors" required>
                  &nbsp;&nbsp; <br></td>
              </tr>
              <tr>
                <td><span style="color:#0033cc;">Verifiers: * </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input name="verifiers" type="text" placeholder="e.g. Jack-Jil(position)" required>
                  <br></td>
              </tr>
              <tr>
                <td><span style="color:#0033cc;">Authorizers: * </span>&nbsp;&nbsp;&nbsp;&nbsp;
                  <input name="authorizers" type="text" placeholder="e.g. Mercy-Nyambura(position)" required>
                  <br></td>
              </tr>
              <tr>
                <td><span style="color:#0033cc;">Continued Per: </span>
                  <input name="continued_per" type="text" placeholder="Continued Per" required>
                  <br></td>
              </tr>
              <tr>
                <td><span style="color:#0033cc;">Remarks: </span>&nbsp;&nbsp;
                  <textarea rows="3" cols="45" name="remarks" placeholder="Enter few remarks."></textarea>
                  <br></td>
              </tr>
              <tr>
                <td><input type=submit name=submit value="Upload">
                  &nbsp;&nbsp;&nbsp;
                  <input type="button" value="CANCEL" onClick="document.location.href='home.php';" />
                </td
>
              </tr>
            </table>
          </form>
        </div>
        </center>
        <!--<p style="color:#0033cc; font-size:14px">Upload Instructions</p>
<ul>
<li>Browse the file to upload from your PC.</li>
<li>Once the file is selected, click on open in the window the appears,</li>
<li>Click on the upload button to upload the selected file to the server.</li>
</ul>-->
        <p>Incase you need help, Kindly contact the <a href="contact.php">System Administrator.</a></p>
  </table>
</center>
  </div>
</div>
<div id="footer">
  <p style="float:right">*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p>
</div>
</body>
</html>
