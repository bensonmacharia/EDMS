<?php
include("session.php");
include ("connection.php");

$record =$_POST['record'];
$code =$_POST['code'];
$version =$_POST['version'];
$effective_per =$_POST['effective_per'];
$evaluate_before =$_POST['evaluate_before'];
$distributed_to =$_POST['distributed_to'];
$authors =$_POST['authors'];
$verifiers =$_POST['verifiers'];
$authorizers =$_POST['authorizers'];
$continued_per=$_POST['continued_per'];
$remarks=$_POST['remarks'];
//$auth_id = $user_id;//Display Author ID
$uploaded_by = $user_name;

$uploaded=0;
//$ext="";

//generate unique file name using time:

$newfilename= md5(rand() * time());


//do we have a file?
if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0))
{

   $filename =strtolower(basename($_FILES['uploaded_file']['name']));
  //$ext = substr($filename, strrpos($filename, '.') + 1);
  $FileType = pathinfo($filename,PATHINFO_EXTENSION);
   

   if ((($FileType == "jpg")
      ||($FileType == "JPG")
	  ||($FileType == "png")
	  ||($FileType == "gif")
	  ||($FileType == "pdf")
	  ||($FileType == "PDF")
	  ||($FileType == "doc")
	  ||($FileType == "docx")
	  ||($FileType == "xlsx")
	  ||($FileType == "xls")
	  ||($FileType == "txt")
	  ||($FileType == "ppt")) 
	  &&($_FILES["uploaded_file"]["size"]< 5000000)
	  &&(($_FILES["uploaded_file"]["type"] =="image/jpeg")
	  ||($_FILES["uploaded_file"]["type"] == "image/pjpeg")
	  ||($_FILES["uploaded_file"]["type"] == "image/png")
	  ||($_FILES["uploaded_file"]["type"] == "image/gif")
	  ||($_FILES["uploaded_file"]["type"] == "application/pdf")
	  ||($_FILES["uploaded_file"]["type"] == "text/pdf")
	  ||($_FILES["uploaded_file"]["type"] == "application/msword")
	  ||($_FILES["uploaded_file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
	  ||($_FILES["uploaded_file"]["type"] == "application/excel")
	  ||($_FILES["uploaded_file"]["type"] == "application/vnd.ms-excel")
	  ||($_FILES["uploaded_file"]["type"] == "text/plain")
	  ||($_FILES["uploaded_file"]["type"] == "application/powerpoint")))
   {
   //Determine the path to which we want to save this file
   //$ext=".".$ext;
   $newname = dirname(__FILE__).'/upload/'.$filename;
   
      // Check if file already exists
     if (file_exists($newname)) {
	   echo "<script>var r=confirm(\"Sorry, file already exists! Do you want to add a newer version of the same.\");</script>";
	   echo "<script>if(r==true){location.href=\"confirm_delete_user.php?field=$field\";}else{location.href=\"edms_deleteuser.php\";}</script>";
       $uploaded = 0;
       }
       elseif ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname)))
         {
	   $size =($_FILES["uploaded_file"]["size"])/1000;
	   $title = $filename;
	   $y="insert into documents(record,code,title,version,effective_per,evaluate_before,distributed_to,authors,verifiers,authorizers,continued_per,size,uploaded_by,remarks) values('$record','$code','$title','$version','$effective_per','$evaluate_before','$distributed_to','$authors','$verifiers','$authorizers','$continued_per','$size','$uploaded_by','$remarks')";
	   if(!mysqli_query($x,$y))
                {
                  die('Error occured:'.mysql_error());
                }
                else
                {
                 }
                mysqli_close($x);
	   echo"<script>alert(\"File uploaded successfully!Upload another file.\");</script>";
	   //print('<p>File uploaded successfully!</p>');
	   //print('<p><a href="upload.php">upload another file</a></p>');
	   echo"<script>location.href=\"upload.php\";</script>";
	   
       //echo "File uploaded successfully!";
	   //print('<p><a href="upload.php">upload another file</a></p>');
	   //print('<p><a href="view_uploads.php">View uploaded files</a></p>');
	   //print('<p><a href="home.php">Back Home</a></p>');
       $uploaded=1;
       }
       else
       {
        echo "Error:!";
        print('<p><a href="upload_file.php?">Back</a></p>');
       }
   } else {
   echo "File type not supported or file exceeds 5MB!";
   print('<p><a href="upload.php">Back</a></p>');
   }
} else {
echo "Error! File is not uploaded!";
print('<p><a href="upload.php">Back</a></p>');
}

?>
