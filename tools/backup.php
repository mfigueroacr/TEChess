<?php
include ("settings.php"); 	
$username = USER;
$password = PASSWORD;
$hostname = SERVER;
$database = DB;
$username =escapeshellcmd($username);
$password =escapeshellcmd($password);
$hostname =escapeshellcmd($hostname);
$database =escapeshellcmd($database);
$backupFile='C:\Users\Leo\Desktop\Backup'. date("Y-m-d-H-i-s").$database.'.sql';
$command = "mysqldump -u $username -p$password -h$hostname $database > $backupFile";
system($command, $result);
echo $result;
?>
