<?php
include("session.php");
$x=mysqli_connect('127.0.0.1','root','','edms');
if(mysqli_connect_error())
{
echo"failed to connect:".mysqli_connect_error();
}
$category =$_POST['category'];
$description=$_POST['description'];
$auth_id = $user_id;//Display Author ID
$auth_name = $user_name;


$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
$target_file1 = $target_dir . basename($_FILES["fileToUpload"]["name"]);

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($FileType != "pdf" && $FileType != "PDF" && $FileType != "doc"
&& $FileType != "docx") {
    echo "Sorry, only pdf, docx files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error

		$filename= dirname(__FILE__).'/uploads/'.$uploader."_".$ct.".".$FileType;
		$file=$uploader."_".$ct.".".$FileType;
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $filename)) {
        echo "<script>alert(\"The file ". basename( $_FILES["fileToUpload"]["name"]). " has been successfully uploaded.\");</script>";
	    echo "<script>location.href=\"uploadform.php\";</script>";
		$size =($_FILES["fileToUpload"]["size"])/1000;
		
		//$filename= dirname(_FILE_).'/uploads/'.$uploader.$ct.".".$FileType;
		//$filename = basename($_FILES["fileToUpload"]["name"].$uploader.'.'.$FileType);
		
		$status="0";
//$sql="INSERT INTO upload(studentid, filename, size, catt, status, class) VALUES ('$userno','$file','$size', '$catt', '$status', '$class')";
//if (!mysql_query($sql,$con)){
  //die('Error: ' . mysql_error());
  //}else{
//echo "<script>alert(\"1 record added\");</script>";
//}

}
mysql_close($con)

?> 