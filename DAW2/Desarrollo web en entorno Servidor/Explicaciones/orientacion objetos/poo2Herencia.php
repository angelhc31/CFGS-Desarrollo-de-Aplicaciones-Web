<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            class vehiculo{
                private $nombre;
                private $ruedas;
                private $matricula;
                public static $prueba;
                        
                function __construct($nombre, $ruedas, $matricula) {
                    $this->nombre = $nombre;
                    $this->ruedas = $ruedas;
                    $this->matricula = $matricula;
                    self::$prueba=5;
                }
                
                function getNombre() {
                    return $this->nombre;
                }

                function getRuedas() {
                    return $this->ruedas;
                }

                function getMatricula() {
                    return $this->matricula;
                }

                function setNombre($nombre) {
                    $this->nombre = $nombre;
                }

                function setRuedas($ruedas) {
                    $this->ruedas = $ruedas;
                }

                function setMatricula($matricula) {
                    $this->matricula = $matricula;
                }
                function mostrar(){
                    return "Mat: $this->matricula, Nom: $this->nombre, Ruedas: $this->ruedas Static: ".self::$prueba;
                }

            }
            
            class coche extends vehiculo{
                private $numAsientos;
                private $cilindrada;
                
                function __construct($numAsientos, $cilindrada,$nombre,$ruedas,$matricula) {
                    parent::__construct($nombre, $ruedas, $matricula);
                    $this->numAsientos = $numAsientos;
                    $this->cilindrada = $cilindrada;
                   
                }
                function getNumAsientos() {
                    return $this->numAsientos;
                }

                function getCilindrada() {
                    return $this->cilindrada;
                }

                function setNumAsientos($numAsientos) {
                    $this->numAsientos = $numAsientos;
                }

                function setCilindrada($cilindrada) {
                    $this->cilindrada = $cilindrada;
                }
                
                function mostrar(){
                    return  "Cil: $this->cilindrada, Asientos: $this->numAsientos ".parent::mostrar();
                      
                }

            }
            
            $pp=new coche(5,200,"pepe",6,"65676ty");
            echo $pp->mostrar();
            
        ?>
    </body>
</html>
