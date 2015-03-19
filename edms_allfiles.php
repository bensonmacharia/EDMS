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
      
  <header id="title">
  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; <span id='ct' style=" float: left;"></span>
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
          <td><center>
              <h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">All Documents Uploaded</b></h2>
              <br/>
              <form name="browser_sort" method="POST">
                <table cellspacing="1" border="0" name="browser">
                  <tbody>
                    <tr>
                      <td><b>Filter by (Select one):</b></td>
                      <td nowrap="" rowspan="0"><select name="options">
                          <option selected="" value="doc_id" id="0">Document Index</option>
                          <option value="record" id="1">Record File</option>
						  <option value="title" id="2">Title</option>
                          <option value="code" id="3">Document Code</option>
                          <option value="distributed_to" id="4">Location</option>
                          <option value="size" id="5">Size</option>
                          <option value="date_upload" id="6">Upload Date</option>
                          <option value="authors" id="7">Authors</option>
                        </select>
                      </td>
                      <td><label><b>Show </b>
                        <select name="count" aria-controls="filetable" class="">
                          <option value="5">5</option>
                          <option value="10">10</option>
                          <option value="25">25</option>
                          <option value="50">50</option>
                        </select>
                        <b>entries</b> </label>
                      </td>
                      <td><input type = "submit" value="View" name="sort" />
                      </td>
                    </tr>
                  </tbody>
                </table>
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
if (isset($_POST['sort'])&&($_POST['count'])) {
$sort=$_POST['options'];
$count=$_POST['count'];
$query = "SELECT * FROM documents ORDER BY $sort LIMIT $count"; //You don't need a ; like you do in SQL
$result = mysqli_query($connection,$query);
echo "<table class='bordered'>"; // start a table tag in the HTML
//echo "Docuemnts sorted by:" ."&nbsp;&nbsp;".$sort;
echo "<tr>"; echo "<th>Code </th>";echo "<th>Title </th>";echo "<th>Record/File </th>";echo "<th>Authors </th>"; echo "<th>Size </th>"; echo "</tr>";
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
$code=$row['code'];
echo "<tr><td><a href='document_details.php?code=$code'>" .$row['code'] . "</a></td><td>" .$row['title'] . "</td><td>" . $row['record'] ."</td><td>" . $row['authors']."</td><td>". $row['size'] . "&nbsp;Kbs</td></tr>";
//$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML
echo"<br/>";
echo"<a href='print.php?count=$count&&sort=$sort'>Print List</a>";
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
