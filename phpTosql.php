<?php
require_once 'login.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);

if (!$db_server) {
	die("failed to connected").mysql_error();
}
else echo "connected"."<br />";

mysql_select_db($db_database) or die("failed to connect to db").mysql_errno();

$query = "SELECT * FROM classics";
$response = mysql_query($query);

if (!$response) {
	die("failed to query").mysql_errno();
} //else print_r($response); 

$rows = mysql_num_rows($response);

/*for ( $i = 0 ; $i < $rows; $i++) {
	echo "Author: ". mysql_result($response, $i, 'author')."<br />";
	echo 'Title: '. mysql_result($response, $i, 'title')."<br />";
	echo 'Categroy: '. mysql_result($response, $i, 'category')."<br />";
	echo 'Year: '. mysql_result($response, $i, 'Year')."<br />";
	echo 'ISBN: '. mysql_result($response, $i, 'isbn')."<br />"."<br />";
}*/

for ( $i = 0 ; $i < $rows; $i++) {
	$row = mysql_fetch_row($response);
	echo "Author: ".   $row[0]."<br />";
	echo 'Title: '.    $row[1]."<br />";
	echo 'Categroy: '. $row[2]."<br />";
	echo 'Year: '.     $row[3]."<br />";
	echo 'ISBN: '.     $row[4]."<br />"."<br />";
	
}

mysql_close($db_server);
?>