<!--side menu-->
<?php 
//include("session.php");
if($type=='Technician')
{
$link = 'dash.php';
}
else
{
$link = 'dashboard.php';
}
?>
<ul>
<li><a href="<?php echo $link?>">Quick Dashboard</a></li></br>
<li><a href="revisions.php">My Revisions</a></li>
<li><a href="edms_search.php">Search Tool</a></li>
<li><a href="upload.php">Upload Documents</a></li>
<li><a href="edms_allfiles.php">All Documents</a></li>
<li><a href="manual.php">User Manual</a></li>

&nbsp;
&nbsp;
&nbsp;
</ul>
