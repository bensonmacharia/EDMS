<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect('localhost', 'bmacharia', '12qwaszxasqw12', 'edms');
// Selecting Database
//$db = mysqli_select_db("edms", $connection);
session_start(); // Starting Session
// Storing Session
$user_check = $_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql = mysqli_query($connection, "select * from users where email='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['fname'] . "&nbsp;" . $row['sname'];
$type = $row['class'];
$user_id = $row['uid'];
$user_name = $row['fname'] . "-" . $row['sname'];

if (!isset($login_session)) {
    mysqli_close($connection); // Closing Connection
    header('Location: index.php'); // Redirecting To Home Pages
}

//if(isset($_SESSION['login_user'])&&(time() - $_SESSION['login_user']> 60)){
//session_unset();
//session_destroy();
//}
//$_SESSION['login_user']=time();
