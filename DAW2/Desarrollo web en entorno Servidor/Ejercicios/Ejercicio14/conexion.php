<?php
class conexion
{
    private $conex;
    private $bbdd;
    private $ruta;
    private $dbnam;
    private $usr;
    private $pwd;

    function __construct () {
        $data = file_get_contents("config.json");
        $config = json_decode($data, true);

        $this->bbdd = $config["bbdd"];
        $this->ruta = $config["ruta"];
        $this->dbnam = $config["dbname"];
        $this->usr = $config["usr"];
        $this->pwd = $config["pwd"];

        try {
            $user = $this->usr;
            $password = $this->pwd;
            $dbname = $this->dbnam;
            $dsn = "{$this->bbdd}:host={$this->ruta};dbname={$this->dbnam}";
            $this->conex = new PDO($dsn, $this->usr, $this->pwd);
        } catch (PDOException $e) {
            echo "<script>alert('Error de conexión.'); history.go(-1);</script>";
        }
    }

    function getConector() {
        return $this->conex;
    }
	
	function cerrar() {
        $this->bbdd=null;
        $this->ruta=null;
        $this->dbname=null;
        $this->usr=null;
        $this->pwd=null;
        $this->conex=null;

        unset($this->bbdd, $this->ruta, $this->dbname, $this->usr, $this->pwd, $this->conex);
	}
}
?>