<?php

include_once('./libraries/functions.php');

//Inicialización
boot();

//Lógica de negocio
$mensaje = '';


if(isset($_POST['crear'])){
    //Creamos usuario
    $userData = filter_input_array(INPUT_POST,[
        'nombre' => FILTER_DEFAULT,
        'email' => FILTER_VALIDATE_EMAIL,
        'rol' => FILTER_DEFAULT

    ]);
    if(!empty($userData)){
        

        $id = intval(getDataFromCSV('./data/last_id.csv')[0]['id']);
        $id+=1;       
        array_unshift($userData, $id);
        array_push($userData, date('d/M/Y'));
        
        putDataInCSV([$userData], './data/users.csv');

        //TODO: Crear funciones que permitan gestionar esto con una sola llamada
        clearFileContent('./data/last_id.csv');
        putDataInCSV([['id'],[$id]], './data/last_id.csv');
        

        $mensaje= 'Usuario creado';
    }
    
}
//Lógica de presentación
//Presenta el html a partir de los datos en el CSV
include_once('./templates/create_users.tpl.php');
?>