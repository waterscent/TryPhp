<?php
require_once 'login.php';
require_once 'sanitize.php';
$salt1 = "f%h&#@d";
$salt2 = "ghj09@@$5%";

$db_server = mysql_connect($db_server, $db_username, $db_password);
if (!$db_server) {
	die("failed to connect to server").mysql_error()."<br />";
}

if (!mysql_select_db($db_database)) {
	die("failed to select database").mysql_error()."<br />";
}

if (isset($_SERVER['PHP_AUTH_PW']) && isset($_SERVER['PHP_AUTH_USER'])) {
	$inputUsername = sanitizeSqlString($_SERVER['PHP_AUTH_USER']);
	$inputPassword = md5($salt1.sanitizeSqlString($_SERVER['PHP_AUTH_PW'].$salt2));
	
	$query = "SELECT * FROM users WHERE userName = '$inputUsername' AND password='$inputPassword'";
	
	if (!($result = mysql_query($query))) {
		die("failed to query").mysql_error()."<br />";
	}
	//var_dump($result);
	//var_dump(mysql_num_rows($result));
	//var_dump(mysql_fetch_row($result));
	if (mysql_num_rows($result)) {
		$row = mysql_fetch_row($result);
		echo "welcome:".$row[0]." ".$row[1];
	} else {
		print("invalid username");
		header('WWW-Authenticate:Basic realm="Restricted Section"');
	}
} else {
	header('WWW-Authenticate:Basic realm="Restricted Section"');
	header('HTTP 1.0 401 Unauthorized');
	die("please enter correct username and password");	
}


?>