<?php

/***** Inicialización del entorno ******/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('./lib/funciones.php');


/***** Lógica de negocio ******/
$usuarioData = leerImput();
$loginData = leerArchivoCSV("../data/login.csv");


//*****Lógica de presentación****MARKUPS*****
$loginMarkup = getLoginMarkup($loginData);



?>