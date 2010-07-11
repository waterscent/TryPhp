<?php

require_once 'login.php';

$db_server =mysql_connect($db_host, $db_username, $db_password)
	or die("failed to connect").mysql_error()."<br />";
	
mysql_select_db($db_database) or die("failed to select database").mysql_error()."<br />";

$query = "CREATE TABLE cats(
		id SMALLINT NOT NULL AUTO_INCREMENT,
		family VARCHAR(32) NOT NULL,
		name VARCHAR(32) NOT NULL,
		age TINYINT NOT NULL,
		PRIMARY KEY(id))";

$result = mysql_query($query);

if (!$result) { 
	echo " failed to query the database" . mysql_error()."<br />";
}

mysql_close($db_server);

?>