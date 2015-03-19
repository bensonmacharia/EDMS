<?php
include("session.php");
include("connection.php");

//check if user is logged in else direct to login page.
if(!(isset($_SESSION['login_user'])&&$_SESSION['login_user']!="")){
    header("Location:index.php");
	}
else{
    $result = mysqli_query($connection,"SELECT * FROM users");
    $row=mysqli_fetch_array($result);

// Check to see if user is admin
    
    if($type=='Administrator') {
        header('Location:edms_admin.php');
        exit;
        } 
    if($type=='Technician') {
        header('Location:edms_tech.php');
        exit;
         } 
	 if($type=='Librarian') {
          header('Location:edms_lib.php');
          exit;
          } 
	 if($type=='Guest') {
        header('Location:edms_out.php');
        exit;
         } 
	 }



?>