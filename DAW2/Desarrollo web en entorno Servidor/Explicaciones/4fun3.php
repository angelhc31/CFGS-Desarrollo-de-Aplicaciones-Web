<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

</head>

<body>
	
<?php
	
	function area($n1){
		function radio($r){
			return pow($r,2);
		}
		return radio($n1)*pi();
	}
	
	
	
	
	echo "El area es: ".area(5);
	echo "<br>";

	
	
?>
	
</body>

</html>
