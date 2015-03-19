<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'edms';

$db = mysql_connect($dbhost, $dbuser, $dbpass) or die ("Error connecting to database.");
	mysql_select_db($dbname, $db) or die ("Couldn't select the database.");
	
$date = date('Y-m-d-H-i-s');

$backupFile = 'C:\\wamp\www\EDMS\Backup_Database\db_backup'.$date.'.sql';
$mysqldumppath = '"C:\\wamp\bin\mysql\mysql5.6.12\bin\mysqldump.exe"';
$command = "$mysqldumppath --opt -h$dbhost -u$dbuser -p$dbpass $dbname > $backupFile";

system($command);
phpinfo();
?>


	
	