<?php

include_once('./libraries/functions.php');

//Inicialización
boot();

//Lógica de negocio
//Obtenemos id de la querystring
$id = filter_input(INPUT_GET,'id', FILTER_VALIDATE_INT);
if( $id !== false){
    //Lee CSV
    $usuarios = getDataFromCSV('./data/users.csv', 'id');
    if (isset($usuarios[$id])){
        $usuario = $usuarios[$id];
    }else{
        $usuario = null;
    }

}


//Lógica de presentación
//Presenta el html a partir de los datos en el CSV
include_once('./templates/show_user.tpl.php');
?>