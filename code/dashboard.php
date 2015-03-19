<?php
include("session.php");
include("connection.php");
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
  <div id="leftMain1">  
  <span style='color:#000; font-weight:600; line-height:20px; font-size:14px; padding:100px 20px 20px 10px;'><u>Notifications:</u></span><br/>
  <?php
  if($type=='Administrator') 
      {
	   include 'dash_admin.php'; 
	   echo"</br></br></br></br>";
      } 
	 if($type=='Technician'){
	  echo"<span style='color:#000; font-weight:600; line-height:20px'>Requires Attention:</span><br/>";
	  }
	 if($type=='Guest'){
	  echo"You can request for document download < a href=''>here</a>.";
	  }
	 if($type=='Librarian'){
	  echo"<span style='color:#000; font-weight:600; line-height:20px'>Requires Attention:</span><br/>";
	  }
  ?>
  </div>
  <div id="main">
    <center>
      <table>
        <tbody>
          <tr>
            <td><table cellpadding="5" cellspacing="5">
                <tr>
                  <td><center>
                      <h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">QUICK LINKS.</b></h2>
                      <br/>
                    </center>
                    <b>You are a(an):</b>&nbsp; &nbsp;<span style="color:#0033cc"><?php echo "" . $type . "" ?>.</span><br/>
                    <br/>
                    <?php
	 if($type=='Administrator') 
      {
	   include 'dash_admin1.php'; 
      } 
	 if($type=='Technician'){
	  echo"<span style='color:#000; font-weight:600; line-height:20px'>Requires Attention:</span><br/>";
	  }
	 if($type=='Guest'){
	  echo"You can request for document download < a href=''>here</a>.";
	  }
	 if($type=='Librarian'){
	  echo"<span style='color:#000; font-weight:600; line-height:20px'>Requires Attention:</span><br/>";
	  }
	  ?>
                  </td>
                </tr>
              </table></td>
        </tbody>
      </table>
     
    </center>
  </div>
</div>
<div id="footer"><p style="float:right">*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p></div>
</body>
</html>
