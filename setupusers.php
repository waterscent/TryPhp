<?php

require_once 'login.php';

$db_server = mysql_connect($db_host, $db_username, $db_password) or
	die("failed to connect to server").mysql_error()."<br />";
mysql_select_db($db_database) or 
	die("failed to select db").mysql_error()."<br />";
	
$query = "CREATE TABLE users(
		  foreName VARCHAR(32) NOT NULL,
		  sureName VARCHAR(32) NOT NULL,
		  userName VARCHAR(32) NOT NULL UNIQUE,
		  password VARCHAR(32) NOT NULL)";

if (!mysql_query($query)) {
	die("failed to create table").mysql_error()."<br />";
}

$salt1 = "f%h&#@d";
$salt2 = "ghj09@@$5%";

$forename ='bas';
$surename = 'vas';
$username = 'basvas';
$password = 'vasbas';
$mixpassword = md5($salt1.$password.$salt2);
add_user($forename, $surename, $username, $mixpassword);

$forename ='raj';
$surename = 'maj';
$username = 'rajmaj';
$password = 'majraj';
$mixpassword = md5($salt1.$password.$salt2);
add_user($forename, $surename, $username, $mixpassword);

function add_user($fn, $sn, $un, $ps ) {
	$query = "INSERT INTO users VALUES('$fn','$sn','$un','$ps')";
	if (!mysql_query($query)) {
		die("insert failed").mysql_error()."<br />";
	}
}

?>