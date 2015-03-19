<?php
$directory="upload";
if ($handle=opendir($directory.'/')){

while($file=readdir($handle)){
	if ($file !='.'&& $file!='..'){
	echo '<a href="'.$directory.'/'.$file.'"">'.$file.'</a></br>';


}
}
}
?>