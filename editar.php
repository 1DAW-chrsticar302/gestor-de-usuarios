<?php

function leerArchivoCSV($rutaArchivoCSV) {
    $tablero = [];  
    if (($puntero = fopen($rutaArchivoCSV, "r")) !== FALSE) {
        while (($datosFila = fgetcsv($puntero)) !== FALSE) {
            $tablero[] = $datosFila;
        }
        fclose($puntero);
    }
    return $tablero;
}


function getProperties($id) {
    $usuario;
    $lista[] = leerArchivoCSV("data/users.csv");
    
    foreach($lista as $clave => $user) {
        if ($clave == $id) {
            $usuario = $user;
        }
    }
    return $usuario;
}

$userId = $_GET['id'];
$user = getProperties($_GET['id']);


function getEditMarkup($usuario) {
    
    //Aquí poner el mismo cuestionario que en el user_create, luego cambiar paea que se autil
    //Aquí va el imprimir y ver los datos en el placeholder
    //Enviará lo puesto en post a otro php para editar el usuario, pasándole el nuevo usuario
    // y el id
    
    $output = '

    ';
}



?>