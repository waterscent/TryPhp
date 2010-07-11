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
	$inputPassword = sanitizeSqlString($_SERVER['PHP_AUTH_PW']);
	
	$query = "SELECT * FROM users WHERE userName = '$inputUsername'";
	
	if (!($result = mysql_query($query))) {
		die("failed to query").mysql_error()."<br />";
	}

	if (mysql_num_rows($result)) {
	/*	if ($tempToken == $row[3]) {
			echo "equal works"."<br />";
		}*/
		$row = mysql_fetch_row($result);
		var_dump($row);
		echo "<br />";
		var_dump(md5($salt1.$inputPassword.$salt2));
		echo "<br />";
		var_dump($row[3]);
		echo "<br />";
		$tempToken = md5($salt11.$inputPassword.$salt2);
		if ($tempToken == $row[3]) {
			session_start();
			$_SESSION['forename'] = $row[0];
			$_SESSION['surename'] = $row[1];
			$_SESSION['username'] = $row[2];
			$_SESSION['password'] = $row[3];
			echo "welcome:".$row[0]." ".$row[1]."<br />";
			echo "You are logged in as".$row[2]."<br />";
			echo "Please <a href='continue.php'> click here </a> to continue";
		}
	}
}else {
	header('WWW-Authenticate:Basic realm="Restricted Section"');
	header('HTTP 1.0 401 Unauthorized');
	die("please enter correct username and password");	
}


?>