 <?php
   $x=mysqli_connect('127.0.0.1','root','','edms');
   if(mysqli_connect_error())
   {
   echo"failed to connect:".mysqli_connect_error();
   }
    $name = mysql_real_escape_string($_POST['cat_update']);
	$title = mysql_real_escape_string($_POST['full_name']);
    $y="update categories SET name ='$name', full_name='$title' WHERE name = '$name' ";
	      if(!mysqli_query($x,$y))
           {
            die('Error occured:'.mysql_error());
			}
         else{
            echo"<script>alert(\"Category updated Successfully!. Go Back\");</script>";
            echo"<script>location.href=\"home.php\";</script>";
            }


?>