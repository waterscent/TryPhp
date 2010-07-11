<?php // upload.php
echo <<<_END
<html><head><title>PHP Form Upload</title></head><body>
<form method='post' action='upload.php' enctype='multipart/form-data'>
Select File of type jpg, png : <input type='file' name='filename' size='10' />
<input type='submit' value='Upload' />
</form>
_END;
if ($_FILES) {
	$name = $_FILE['filename']['name'];
	
	switch ($_FILES['filename']['type']) {
		case 'image/jpeg' : $ext = 'jpg'; break;
		case 'image/png' : $ext = 'png'; break;
		default : $ext = null; break; 
	}
	if ($ext) {
		$text = "image.$ext";
		$name = $_FILE['filename']['name'];
		move_uploaded_file($_FILES['filename']['tmp_name'], $text);
		echo "<img src='$text' />";
	} else {
	echo "Invalid file type!";
	}
} else {
	echo "No file uplodaded yet!";
}




/*$name = $_FILES['filename']['name'];
move_uploaded_file($_FILES['filename']['tmp_name'], $name);
echo "Uploaded image '$name'<br /><img src='$name' />";*/

echo "</body></html>";
?>
