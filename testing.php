<?php


include_once('./libraries/functions.php');

boot();


//$conexion = new PDO('mysql:host=localhost;dbname=crud_mysql', 'crud_mysql', 'crud_mysql');

Class Persona{
    public $nombre;

    function __construct($nombre){
        $this->nombre = $nombre;
    }
}

$persona = new Persona('Pedro');
dump($persona);
dumpObjectStructure($persona);

?>  