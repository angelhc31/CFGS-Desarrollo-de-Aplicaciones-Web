<?php

	setcookie("idioma_solicitado",$_GET["idioma"],time()+86400);
	header("Location: usar-cookie.php"); //envia una cabecera limpia http
	 //envia una cabecera limpia http con location redirige
?>
