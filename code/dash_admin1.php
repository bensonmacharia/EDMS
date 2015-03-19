
<?php
include("connection.php");
?>
<style TYPE="text/css">
       table.admin
	   {
        background: #fff;
		border-spacing: 5px;
       }
	   table.admin th 
	   {
	   background: #fff;
	   color:#0033cc;
	   }
	   table.admin td a hover 
	   {
	   color:#000000;
	   background-color:#83a9f7;
	   }
	   table th, td { padding: 5px; }

</style>
       <table class="admin" cellpadding="5" cellspacing="5">
		<tr>
		<th> Manage Users</th>
		<th> Manage Record/ Category</th>
		<th> Manage Files</th>        
		<tr>
            <td>
                <table border="0">
                    <tr>
                     <td><b><a href="http://localhost/edms/edms_adduser.php" style="font-weight:500; line-height:15px">Add Users</a></b></td>
                    </tr>
                    <tr>
                        <td><b><a href="http://localhost/edms/edms_deleteuser.php" style="font-weight:500; line-height:15px">Delete Users</a></b></td>
                    </tr>
                    <tr>
                        <td><b><a href="http://localhost/edms/edms_updateuser.php" style="font-weight:500; line-height:15px">Update Users</a></b></td>
                    </tr>
                    <tr>
                        <td><b><a href="http://localhost/edms/edms_userdisplay.php" style="font-weight:500; line-height:15px">Display Users</a></b></td>
                    </tr>
                </table>
            </td>
<td>
    <!-- Category Admin -->
    <table border="0">
        <tr>
            <td><b><a href="http://localhost/edms/edms_addcategory.php" style="font-weight:500; line-height:15px">Add Category</a></b></td>
        </tr>
        <tr>
            <td><b><a href="http://localhost/edms/edms_deletecategory.php" style="font-weight:500; line-height:15px">Delete Category</a></b></td>
        </tr>
        <tr>
            <td><b><a href="http://localhost/edms/edms_updatecategory.php" style="font-weight:500; line-height:15px">Update Category</a></b></td>
        </tr>
        <tr>
            <td><b><a href="http://localhost/edms/edms_displaycategory.php" style="font-weight:500; line-height:15px">Display Categories</a></b></td>
        </tr>
    </table>
</td>
<td>
    <!-- Files Admin -->
    <table border="0" valign="top">
        <tr>
            <td><b><a href="http://localhost/edms/edms_allfiles.php" style="font-weight:500; line-height:15px">All Files</a></b></td>
        </tr>
        <tr>
            <td><b><a href="http://localhost/edms/edms_forapproval.php" style="font-weight:500; line-height:15px">Files to Approve</a></b></td>
        </tr>
        <tr>
            <td><b><a href="http://localhost/edms/edms_allrevisions.php" style="font-weight:500; line-height:15px">Files for Revision</a></b></td>
        </tr>
        <tr>
            <td><b><a href="http://localhost/edms/edms_restoredeletefile.php" style="font-weight:500; line-height:15px">Files Deleted</a></b></td>
        </tr>
    </table>
</td>
    <td>
</td>
</tr> 
</table>
<span style="color:#0033cc">Generate Quick Reports:</span></br>
<a href="user_activity.php" style="font-weight:500; line-height:15px">User Activity</a>

