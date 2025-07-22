<?php
if(isset($_COOKIE["idioma_solicitado"])){
	if($_COOKIE["idioma_solicitado"]=="es")
		header("Location: espanyol.php");
 	else if($_COOKIE["idioma_solicitado"]=="en")
		header("Location: ingles.php");
	
}	
else
	echo "cookie no definida";

?>
