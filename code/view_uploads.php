<?php
include("session.php");
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
<h2 style="font-family:Verdana, Arial, Helvetica, sans-serif"><b style="color:#0c6500">Documents Uploaded</b></h2><br/>
<form name="browser_sort" method="POST">
	<table cellspacing="1" border="0" name="browser">
	  <tbody>
	   <tr>
	    <td><b>Filter by:</b></td>
	     <td nowrap="" rowspan="0">
		   <select name="options">
             <option selected="" id="0">Select one</option>
			   <option value="doc_id" id="1">Document Index</option>
                 <option value="filename" id="2">File Name</option>
                       <option value="category" id="3">File Category</option>
					    <option value="size" id="4">Size</option>
                            <option value="date_upload" id="5">Upload Date</option>
							<option value="auth_name" id="5">Author Name</option>
                                </select>
           </td>
		   <td>
		   <label><b>Show </b><select name="filetable_length" aria-controls="filetable" class="">
		   <option value="5">5</option>
		   <option value="10">10</option>
		   <option value="25">25</option>
		   <option value="50">50</option></select> <b>entries</b>
		   </label>
		   </td>
		   <td>
		   <input type = "submit" value="View" name="sort" />
		   </td>
		   </tr>
        </tbody></table>
   </form>
</center>
<style>
th {
    background-color: green;
    color: white;
}
</style>
<?php
if (isset($_POST['sort'])) {
$sort=$_POST['options'];
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('edms');
$query = "SELECT * FROM uploads WHERE status = 1 ORDER BY '$sort'"; //You don't need a ; like you do in SQL
$result = mysql_query($query);
echo "<table border='1px solid green'>"; // start a table tag in the HTML
//echo "Docuemnts sorted by:" ."&nbsp;&nbsp;".$sort;
echo "<tr>"; echo "<th>Index </th>";echo "<th>Name </th>";echo "<th>Category </th>";echo "<th>Author </th>"; echo "<th>Size(KB) </th>"; echo "<th>Date/Time upload </th>"; echo "<th>Details</th>"; echo "</tr>";
while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['doc_id'] . "</td><td>" .$row['filename'] . "</td><td>" . $row['category'] ."</td><td>" . $row['auth_name'] ."</td><td>". $row['size'] . "</td><td>" . $row['date_upload'] ."</td><td>";
?>
<form action="edms_view.php" method="post"> 
<input type="hidden" name="action" value="view" />
<input type="hidden" name="id" value="<?php echo $row['doc_id'] ?>" />
<!--<input type="submit" value="Details" />-->
<input type="image" src="images/submit.png" alt="submit" />
</form>
<?php
"</td></tr>"; 
//$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML
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