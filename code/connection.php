<?php

$connection=mysqli_connect('127.0.0.1','root','','edms');
if(mysqli_connect_error())
{
echo"failed to connect:".mysqli_connect_error();
}

?>