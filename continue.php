<?php
require_once 'sanitize.php';

if (isset($_SESSION['username']) &&
	isset($_SESSION['password']) &&
	isset($_SESSION['forename']) &&
	isset($_SESSION['surename'])) {

		$username = sanitizeString($_SESSION['username']);
		$password = sanitizeString($_SESSION['password']);
		$forename = sanitizeString($_SESSION['forename']);
		$surename = sanitizeString($_SESSION['surename']);
		
		echo "Here you are again:".$forename." ".$surename."<br />";
		echo "you used username: ".$username." and password: ".$password."<br />";
	} else {
		echo "please <a href='authenticate2.php> click here</a> to login";
	}

?>