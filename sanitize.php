<?php
function sanitizeString($string) {
	$var = stripcslashes($string);
	$var = htmlentities($string);
	$var = strip_tags($string);
//	var_dump($var);
	return $var;
}

function sanitizeSqlString($string) {
	$var = sanitizeString($string);
	$var = mysql_real_escape_string($string);
	return $var;
}
?>