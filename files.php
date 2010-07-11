<?php

$fh = fopen('test.txt', 'r+') or print("echo failed to read file");

$text = fgets($fh);
fseek($fh,0, SEEK_END);
if (flock($fh, LOCK_EX)) {
	fwrite($fh, 'hello');
	flock($fh, LOCK_UN);
}


fseek($fh, 0, SEEK_SET);
//fwrite($fh, $text) or print("failed to append to fil");
echo "write succesS";
echo "<pre>";
echo "<br />".file_get_contents("http://oreilly.com");
echo "</pre>";
fclose($fh);

?>