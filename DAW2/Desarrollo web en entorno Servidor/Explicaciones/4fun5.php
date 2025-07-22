<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

</head>

<body>
	
<?php
	$num=10;
	function prueba(){
         
            echo "<br>";
            $GLOBALS['num']=5;
           
	}
        
        function prueba2(){
            
            static $num=0;
            echo $num;
            echo "<br>";
            $num++;
        
	}
	echo "<br>";
        echo $num;
	prueba($num);
        echo "<br>";
        echo $num;
        
//        prueba2();
//        prueba2();
//        prueba2();
	
?>
	
</body>

</html>
