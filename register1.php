
<?php
include "connection.php";
$uid = rand();
$fname = $_POST['fname'];
$sname = $_POST['sname'];
$full_name = $fname." ".$sname;
$email = $_POST['email'];
$password = md5($_POST['password']);
$position = $_POST['position'];
$class = $_POST['class'];
$y = "insert into users(uid,fname,sname,full_name,email,password,position,class) values('$uid','$fname','$sname','$full_name','$email','$password','$position','$class')";

if(mysqli_query($connection, $y)){
    //echo "Records inserted successfully.";
    echo "<script>alert(\"Account created successfully! Kindly check your email for confirmation.\");</script>";
    echo "<script>location.href=\"index.php\";</script>";
} else{
    echo "ERROR: Could not able to execute $y. " . mysqli_error($connection);
}
mysqli_close($connection);
?>

