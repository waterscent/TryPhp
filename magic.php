<?php

require_once 'login.php';
$db_Server = mysql_connect($db_hostname, $db_username, $db_password)
	or die("failed to establish connection").mysql_error();
	
mysql_select_db($db_database);

$query = 'PREPARE statement FROM "INSERT INTO classics VALUES (?,?,?,?,?)"';
mysql_query($query);
echo mysql_error();
$query = 'SET @author = "Emily Brontë",' .
		'@title = "Wuthering Heights",' .
		'@category = "Classic Fiction",' .
		'@year = "1847",' .
		'@isbn = "9780553212587"';

mysql_query($query);
echo mysql_error();
$query = "EXECUTE statement USING @author, @title, @category, @year, @isbn";

mysql_query($query);
echo mysql_error();
$query = "DEALLOCATE PREPARE statement";

mysql_query($query);
echo mysql_error();
mysql_close($db_server);

?>