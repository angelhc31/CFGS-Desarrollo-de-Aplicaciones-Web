<?php
Class PaginaWeb {
	public $titulo;
		
	function setTitulo ($titulo= "título por defecto") {
		$this->titulo= $titulo;
	}
		
	function getTitulo () {
		return $this->titulo;
	}

	Function __construct ($t) {
		$this->setTitulo ($t);
	}
	
	function __destruct() {
		echo "adios";
	}

	function cabecera () {
		echo ("<html><head><title>");
		echo $this->titulo;
		echo ("</title></head><body>");
	}

	function cuerpo () {
		echo ("<p>Este es el cuerpo de la web</p>");
	}
	
	function pie() {
		echo ("</body></html>");
	}
	
	function mostrarPagina () {
		$this->cabecera();
		$this->cuerpo();
		$this->pie();
	}
}


	$pagina=new PaginaWeb("prueba");
	
	$pagina->mostrarPagina();
?>
