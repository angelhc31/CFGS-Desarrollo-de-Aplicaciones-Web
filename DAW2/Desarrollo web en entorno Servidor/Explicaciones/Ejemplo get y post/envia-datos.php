<?php
	if(isset($_GET["enviar_btn"])){
		echo "Los datos enviados por GET son:El nombre es: ".$_GET["nombre_txt"]."<br/>El password es: ".$_GET["password_txt"];
	} else if(isset($_POST["enviar_btn"])){
		echo "Los datos enviados por POST son:El nombre es: ".$_POST["nombre_txt"]."<br/>El password es: ".$_POST["password_txt"];
	}
?>
