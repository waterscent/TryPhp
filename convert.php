<?php

if (isset($_POST['c'])) {
	$c = sanitizeString($_POST['c']);
}

if (isset($_POST['f'])) {
	$f = sanitizeString($_POST['f']);
}


if ($c != '') {
	echo $c."C in F equals ".(intval((9 / 5) * $c + 32))."<br />";
}else if ($f != '') {
 	echo $f."F in C equals ".intval((5 / 9) * ($f - 32))."<br />";
}


echo <<< _END
<html>
	<head>
		<title>C TO F</title>
	</head>
	<body><pre>
		<form method="post" action="convert.php">
			Celcius = <input type="text" name="c" size="6"/>
			Farenheit = <input type="text" name="f" size="6"/>
			<input type="submit" value="Convert"/>
	</pre>	</form>
	</body>
</html>
_END;

function sanitizeString($string) {
	$var = stripcslashes($string);
	$var = htmlentities($string);
	$var = strip_tags($string);
	return $var;
}

function sanitizeSqlString($string) {
	$var = sanitizeString($string);
	$var = mysql_real_escape_string($string);
}

?>