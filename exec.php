<?php
$cmd = "ls";

exec(escapeshellcmd($cmd), $output, $status);

if ($stauts) {
	echo "ls failed";
} else {

	echo "<pre>";
	foreach($output as $line) {
		echo $line."<br />";
	}
	echo "</pre>";
}


?>