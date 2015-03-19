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
   <div style="width: 783px; height: 52px; background: url(images/bak_top.jpg) no-repeat;">
       <?php 
		if(($type=='Administrator')|| ($type=='Technician'))
      {
	   include 'topmenu.php'; 
      }
	  else
	  {
       include 'topmenu1.php';
      }
      ?>
   
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
<h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">Documents Search</b></h2><br/>
<form name="search" method="POST">
	<table cellspacing="1" border="1" name="browser">
	  <tbody>
              <tr>
                <td valign="top"><b>Search term:</b></td>
                <td><input type="Text" size="50" name="find"></td>
              </tr>
			  <tr><td></td></tr>
			  <tr>
                <td valign="top"><b>Search By:</b></td>
                <td><select name="field">
                        <option selected="" value="title">Document Title</option>
                        <option value="code">Document Code</option>
						<option value="record">File Type</option>
                        <option value="authors">Authors</option>
						<option value="verifiers">Verifiers</option>
						<option value="authorizers">Authorizers</option>
						<option value="date_upload">Date Uploaded</option>
						<option value="distributed_to">Location</option>
                    </select></td>
            </tr>
			<tr><td><br /></td></tr>
			<tr><td>
			<input type="hidden" name="searching" value="yes" />
			<input type = "submit" value="Search" name="submit" /> 
			
			</td></tr>
        </tbody></table>
   </form>
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
</center>
<?php

if (isset($_POST['submit'])) {
$searching = mysql_real_escape_string($_POST['searching']); // sanitized just to be consistant.  
$find = mysql_real_escape_string($_POST['find']);  
$field = mysql_real_escape_string($_POST['field']);

if ($searching =="yes")   
 {   
  //echo $_SERVER['PHP_SELF'];
  echo "<p><h2>Results</h2></p>";  
 if ($find == "") 
 { 
 echo"<p style='color:red'>You forgot to enter a search term</p>"; 
 exit; 
 } 
 
 // Otherwise we connect to our Database 

 
 // We preform a bit of filtering 
 $find = strtoupper($find); 
 $find = strip_tags($find); 
 $find = trim ($find); 

 //Now we search for our search term, in the field the user specified 
$data = mysqli_query($connection,"SELECT * FROM documents WHERE upper($field) LIKE'%$find%'"); 
 //And we display the results 
echo "<table class='bordered'>"; // start a table tag in the HTML
echo "<tr>"; echo "<th>Code </th>";echo "<th>Title </th>";echo "<th>Record </th>";echo "<th>Authors </th>"; echo "<th>Date/Time </th>";  echo "<th>Size </th>"; echo "</tr>";
 while($row = mysqli_fetch_array($data))
 { 
 $filename= $row['title'];
 $code= $row['code'];
 $authors = $row['authors'];
echo "<tr><td>". "<a href='document_details.php?code=$code'>" . $code. "</a></td><td>". $filename."</td><td>" . $row['record'] ."</td><td>" . $authors."</td><td>" . $row['date_upload']. "</td><td>" . $row['size'] ."kbs". "</td></tr>" ;  //$row['index'] the index here is a field name
}
 
 //This counts the number or results - and if there wasn't any it gives them a little message explaining that 
 $anymatches=mysqli_num_rows($data); 
 if ($anymatches == 0) 
 { 
 echo "Sorry, but we can not find an entry to match your query<br><br>"; 
 } 
 
 //And we remind them what they searched for 
 echo "<b>Searched For:</b> " .$find; 
 } }
 //
 ?> 
</td></tr>
</table>
</center>
  </div>
</div>
<div id="footer">
  <p style="float:right">*Disclaimer: <span style="color:red">All rights reserved by World Agroforestry Center (ICRAF).</span></p>
</div>
</body>
</html>