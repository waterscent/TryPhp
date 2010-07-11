<?php
require_once 'login.php';
$db_Server = mysql_connect($db_hostname, $db_username, $db_password)
	or die("failed to establish connection").mysql_error();
	
mysql_select_db($db_database);

function mysql_fix_string($string) {
	if (get_magic_quotes_gpc()) {
		$string = stripslashes($string);
	}
	return mysql_real_escape_string($string);
}

function mysql_entities_fix_string($string) {
	return htmlentities(mysql_fix_string($string));
}

echo mysql_entities_fix_string("<th>hello</th>");
?>