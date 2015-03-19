<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("edms", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select * from users where email='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['fname']."&nbsp;". $row['sname'];
$type = $row['class'];
$user_id = $row['uid']; 
$user_name = $row['fname']."-".$row['sname'];

if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Pages
}

//if(isset($_SESSION['login_user'])&&(time() - $_SESSION['login_user']> 60)){
//session_unset();
//session_destroy();
//}
//$_SESSION['login_user']=time();

?>