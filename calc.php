<?php
if ((isset($_POST['earn'])) && (isset($_POST['years'])) && (isset($_POST['rate']))) {
	$rate=$_POST['rate'];
	$years=$_POST['years'];
	$earn=$_POST['earn'];
	$calc = ($earn*$year*$rate)/100;
	echo $calc;
}
echo <<< _END
<html>
	<head>
		<title>Loan calculator</title>
	<head>
	<body>
	<form method="post" action="calc.php"/> <pre>
	How much you earn?	<input type="text" name="earn"/>
	How long you want to work? <input type="text" name="years"/>
	Choose the rate: <input type="text" name="rate" value="3"/>%
					 <input type="submit"/>
	<input type="texT" size="100" maxlength="50"/>
	want it? <input type="checkbox" name="evil" value="laugh" />
	<label>1<input type="radio" name="want" value="1"/></label><label> 2 <input type="radio" name="want" value="2"/></label> <label>3 <input type="radio" name="want" value="3" checked="checked"/></label>
	<textarea name"area" cols="20" rows="20" wrap="type"></textarea>
	<select size="5" name="county" multiple="multiple">
	<option value="usa">USA</option>
	<option value="germany">Germany</option>
	<option value="poland">Poland</option>
	<option  value="italy" selected="selected">Italy</option>
	</select>
	<input type="submit" name="pic" src="image.png"/>
	</pre>
	</form>
	</body>
</html>
_END;

?>