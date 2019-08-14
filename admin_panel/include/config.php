<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "minku@20";
$mysql_database = "craftsvatika";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) 
or die();
mysql_select_db($mysql_database, $bd) or die();
?>