<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>sin título</title>
<meta name="generator" content="Geany 1.35" />
</head>

<body>
	 <h2>Familias</h2>
	 <FORM METHOD='GET' ACTION='modificar_familias.php' name='modificacion'>
		<INPUT TYPE='HIDDEN' NAME='action' value='1' id='oculto'>
		<INPUT TYPE='SUBMIT'  VALUE='Insertar'>
	 </FORM>
	 <br>
	 <FORM METHOD='GET' ACTION='modificar_familias.php' name='modificacion'>
		<INPUT TYPE='HIDDEN' NAME='action' value='3' id='oculto'>
		Familia:<INPUT TYPE='text' NAME='familia' value='' id='familia'>
		<INPUT TYPE='SUBMIT'  VALUE='Modificar'>
	 </FORM>
	  <br>
	  <FORM METHOD='GET' ACTION='modificar_familias.php' name='modificacion'>
		<INPUT TYPE='HIDDEN' NAME='action' value='5' id='oculto'>
		Familia:<INPUT TYPE='text' NAME='familia' value='' id='familia'>
		<INPUT TYPE='SUBMIT'  VALUE='Eliminar'>
	 </FORM>
	
</body>

</html>
