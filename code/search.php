<?php
include('session.php');
include("connection.php");
if(!(isset($_SESSION['login_user'])&&$_SESSION['login_user']!="")){
    header("Location:index.php");
	}
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
$searching = mysql_real_escape_string($_POST['searching']); // sanitized just to be consistant.  
$find = mysql_real_escape_string($_POST['find']);  
$field = mysql_real_escape_string($_POST['field']);

if ($searching =="yes")   
 {   
  echo $_SERVER['PHP_SELF'];
  echo "<p><h2>Results</h2></p>";  
 if ($find == "") 
 { 
 echo"<p>You forgot to enter a search term"; 
 exit; 
 } 
 
 // Otherwise we connect to our Database 

 
 // We preform a bit of filtering 
 $find = strtoupper($find); 
 $find = strip_tags($find); 
 $find = trim ($find); 
 
 //Now we search for our search term, in the field the user specified 
$data = mysqli_query($connection,"SELECT * FROM uploads WHERE upper($field) LIKE'%$find%'"); 

 //And we display the results 
 while($row = mysqli_fetch_array($data))
 { 
echo "<table>"; // start a table tag in the HTML
echo "<tr>"; echo "<th>Index </th>";echo "<th>Title </th>";echo "<th>Category </th>";echo "<th>Author Id. </th>"; echo "<th>Date/Time </th>";  echo "<th>Size(KB) </th>"; echo "<th>View/Download </th>"; echo "</tr>";
echo "<tr><td>" . $row['doc_id'] . "</td><td>" . $row['title'] . "</td><td>" . $row['category'] ."</td><td>" . $row['auth_id'] ."</td><td>" . $row['date_upload']. "</td><td>" . $row['size'] . "</td><td>" . $row['download'] . "</td></tr>" ;  //$row['index'] the index here is a field name
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