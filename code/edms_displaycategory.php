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
<h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">View Category Details</b></h2><br/>
<form name="display" method="POST">
	<table cellspacing="1" border="0" name="delete">
	  <tbody>
              
			  <tr>
                <td><b>Available Categories*:</b></td>
                <td colspan="5">
				<select name="field">
                <?php 
                $sql = mysqli_query($connection,"SELECT * FROM categories");
                 while ($row = mysqli_fetch_array($sql)){
                ?>
                <option value="<?php echo $row['cat_id'];?>"><?php echo $row['name']; ?></option>
                 <?php
               // close while loop 
                 }
                 ?>
				 </select>
				</td><td>
			          <input type="submit" value="VIEW" name="display" />
                        &nbsp;
                        
                        &nbsp;
                        
                        &nbsp;
                        <input type="button" value="CANCEL" onClick="document.location.href='files.php';" />
			</td></tr>
        </tbody></table>
   </form>
  
</center>
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
<?php
if (isset($_POST['display'])) {
$field = mysqli_real_escape_string($_POST['field']);
$category = mysqli_real_escape_string($row['category']); 

$data = mysqli_query($connection,"select * FROM categories WHERE cat_id = '$field'"); 

 if($row = mysqli_fetch_array($data))
 { 
 echo "<table>";
 echo "<tr><td><span style='color:#0c6500;'>Category Name: </span>&nbsp;" . $row['name'] . "</td></tr>";
 echo "<tr><td><span style='color:#0c6500;'>Category ID: </span>&nbsp;" . $row['cat_id'] . "</td></tr>";
 echo "<tr><td><span style='color:#0c6500;'>Full Category Title: </span>&nbsp;" . $row['full_name'] . "</td></tr>";
 echo "<tr><td>&nbsp;</td></tr>";
 echo "<th style='color:#0033cc'>Documents in this class:" ."</th>";
 echo "</table>";
 
 echo "<table class='bordered'>"; // start a table tag in the HTML
 echo "<tr>"; echo "<th>Code </th>";echo "<th>Title </th>";echo "<th>Authors </th>";echo "<th>Category </th>"; echo "<th>size </th>"; echo "</tr>";
 $category_name=$row['name'];
 $sql=mysqli_query($connection,"select * FROM documents WHERE record = '$category_name'");
 
      while($row1 = mysqli_fetch_array($sql))
       {
       $code=$row1['code'];
       echo "<tr><td><a href='approve.php?code=$code'>" . $code . "</a></td><td>" .$row1['title'] . "</td><td>" . $row1['authors'] ."</td><td>" . $row1['record'] ."</td><td>" . $row1['size']."</td></tr>";
       }
      echo "</table>"; //Close the table in HTML
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