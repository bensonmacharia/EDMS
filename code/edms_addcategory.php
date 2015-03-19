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
        <?php include 'topmenu.php';?>
      </div>
    </header>
  </div>
</div>
<div id="container">
  <div id="main1">
    <center>
      <table >
        <tr>
          <td><center>
              <h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">Add Category</b></h2>
              <br/>
              <form name="add" method="POST">
                <table cellspacing="1" border="0" name="add">
                  <tbody>
                    <tr>
                      <td colspan="2"><input type="text" maxlength="20" class="required" name="category" placeholder="e.g. Method (METH)"required></td>
                      <td colspan="5"><input type="text" maxlength="40" class="required" name="full_name" placeholder="Full Name e.g. SOPs for analytical methods"required></td>
                      <td><input type="submit" value="ADD" name="submit" />
                        &nbsp;
                        
                        &nbsp;
                        
                        &nbsp;
                        <input type="button" value="CANCEL" onClick="document.location.href='home.php';" />
                      </td>
                    </tr>
                  </tbody>
                </table>
              </form>
            </center>
            <?php
if (isset($_POST['submit'])) {
$category = mysqli_real_escape_string($_POST['category']);
$sql = mysqli_query("select * from categories where name = '$category'");
   if($row = mysqli_fetch_array($connection,$sql)){
    echo"<script>alert(\"Caegory already exists!Back.\");</script>";
     echo"<script>location.href=\"edms_addcategory.php\";</script>";
      }
	  else{
	       $y = "insert into categories(name) values('$category')"; 
           if(!mysqli_query($connection,$y))
            {
             die('Error occured:'.mysqli_error());
            }
           else
             {
          echo"<script>alert(\"Caegory added successfully!Back Home.\");</script>";
          echo"<script>location.href=\"home.php\";</script>";
             }
			}
 }
 ?>
          </td>
        </tr>
      </table>
    </center>
  </div>
</div>
<div id="footer">
  <p style="float:right">*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p>
</div>
</body>
</html>
