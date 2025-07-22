<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

</head>

<body>
	
<?php
	$num=10;
	function prueba(){
            global $num;
            echo "<br>";
            $num=5;
            echo $num;
	}
	echo "<br>";
        echo $num;
	prueba($num);
        echo "<br>";
        echo $num;
	
?>
	
</body>

</html>
