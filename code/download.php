<?php
include("session.php");
// grab the requested file's name


$code = $_GET['code'];

//downloads counter
include ("connection.php");
$m=mysqli_query("select * from documents WHERE code = '$code'");
$row = mysqli_fetch_array($connection,$m);
$value=$row['downloads'];
$file = $row['title'];
//echo $value;
$value++;
//echo $new;
$y="update documents SET downloads ='$value' WHERE code = '$code'";
if(!mysqli_query($connection,$y))
{
die('Error occured:'.mysqli_error());
}

//$hit_count = @file_get_contents('count.txt');
//$hit_count++;
//@file_put_contents('count.txt', $hit_count);


function download($file){
$dir = './upload/';

$path = $dir.$file;

// make sure the file exists!		
if(!file_exists($path)){
die('File does not exist!');
}
else{
// required for IE
	if(ini_get('zlib.output_compression')) { ini_set('zlib.output_compression', 'Off');	}
	
// get the file mime type using the file extension
	switch(strtolower(substr(strrchr($path, '.'), 1))) {
		case 'pdf': $mime = 'application/pdf'; break;
		case 'zip': $mime = 'application/zip'; break;
		case 'docx': $mime = 'application/octet-stream'; break;
		case 'zip': $mime = 'text/pdf'; break;
		case 'jpeg': $mime = 'image/pjpeg'; break; 
		case 'jpeg': $mime = 'image/jpeg'; break;
		case 'jpg': $mime = 'image/jpg'; break;
		case 'gif': $mime = 'image/gif'; break;
		default: $mime = 'application/force-download';
		}
		
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename='.basename($path));
header('Content-Type: '.$mime);
header('Expires: 0');//no cache
header('Cache-Control: must-revalidate');
header('Cache-Control: private',false);
header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($file)).' GMT');
header('Pragma: public');//required
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($path));//provide file size
ob_clean();
ob_start();
flush();
readfile($path);//download
exit;
}
}

download($file);



?>

