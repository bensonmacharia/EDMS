<?php
if(isset($_SESSION['login_user'])&&(time() - $_SESSION['login_user']> 60)){
session_unset();
session_destroy();
}
$_SESSION['login_user']=time();

?>