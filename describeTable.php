<?php

require_once 'login.php';

$db_server = mysql_connect($db_hostname, $db_username, $db_password)
	or die("failed to connect to database").mysql_error()."<br />";
	
mysql_select_db($db_database) or die("failed to select db").mysql_error()."<br />";

$query = "DESCRIBE cats";

$result = mysql_query($query);

if (!$result) {
	echo "failed to query the db".mysql_error()."<br />";
}

$rows = mysql_num_rows($result);

echo "<table> <tr> <th>Column</th> <th> Type</th> <th> NULL</th> <th>Key</th> </tr>";

for ($i = 0; $i < $rows; $i++) {
	
	$row = mysql_fetch_row($result);
	echo "<tr>";
	for ($k = 0; $k < 4; $k++) {
		echo "<td>$row[$k]</td>";
	}
	echo "</tr>";	
}

$query = "INSERT INTO cats VALUES(NULL, 'Lynx', 'Stumpy', 5)";

if (!($result = mysql_query($query))) {
	die("update failed").mysql_error()."<br />";
}

echo "Insert id was: ".mysql_insert_id()."<br />";

echo  "</table>";

echo "<table><tr> <th>id</th><th>family</th><th>name</th><th>age</th></tr>";

$query = "SELECT * FROM cats";
$result = mysql_query($query);
if (!$result) {
	die( "query failed").mysql_error()."<br />";
}

$rows = mysql_num_rows($result);
for ($i = 0; $i < $rows; $i++) {
	$row = mysql_fetch_row($result);
	echo "<tr>";
	for ($k = 0; $k < 4; $k++) {
		echo "<td>$row[$k]</td>";
	}
	echo "</tr>";
	
}
echo "</table>";
mysql_close($db_server);
?>