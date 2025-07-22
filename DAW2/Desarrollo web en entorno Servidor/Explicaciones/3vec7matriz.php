<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

</head>

<body>
	
<?php
	
	$vec=array(array());
	
	for($i=0;$i<=5;$i++)
		for($j=0;$j<=10;$j++)
			$vec[$i][$j]="*";
	
		
	for($i=0;$i<count($vec);$i++){
		for($j=0;$j<count($vec[0]);$j++)
			echo $vec[$i][$j];
		echo "<br>";
	}
	
?>
	
</body>

</html>
