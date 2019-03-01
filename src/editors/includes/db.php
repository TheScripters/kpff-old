<?php
$db_password = 'kpff';
$db_name = 'kpfan_kpff';
$db_username = 'kpfan_kpff';

$connect = mysql_connect("localhost",$db_username,$db_password) or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db($db_name,$connect);
?>
