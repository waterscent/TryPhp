<?php
$legitUser='boss';
$legitPass='boss';

if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) { 
	$user = $_SERVER['PHP_AUTH_USER'];
	$pass = $_SERVER['PHP_AUTH_PW'];
	
	if ($user == $legitUser && $pass == $legitPass){
		echo "Welcome user: ".$user."<br />";
		echo "using the pass: ".sha1(hjasijojjfjfjrrrpo.$pass)."<br />";
	} else {
		die("wront pass or username");
	}
	
	
} else {
	header('WWW-Authenticate:Basic realm="Restricted Section"');
	header('HTTP 1.0 401 Unauthorized');
	die("Please enter your username and password");
}




?>