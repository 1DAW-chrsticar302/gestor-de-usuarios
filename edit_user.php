<?php

include_once('./libraries/functions.php');

//Inicialización
boot();

//Lógica de negocio
//Obtenemos id de la querystring
$id = filter_input(INPUT_GET,'id', FILTER_VALIDATE_INT);

if((isset($id))&&( $id !== false )){


    if(isset($_POST['actualizar'])){
    //Creamos usuario
    $userData = filter_input_array(INPUT_POST,[
        'nombre' => FILTER_DEFAULT,
        'email' => FILTER_VALIDATE_EMAIL,
        'rol' => FILTER_DEFAULT

    ]);
    if(!empty($userData)){
        //Actualizo el usuario
        //TODO Terminar esto
    }
    }
    //Lee CSV
    $usuarios = getDataFromCSV('./data/users.csv', 'id');
    if (isset($usuarios[$id])){
        $usuario = $usuarios[$id];
        
        
    }else{
        $usuario = null;
    }

}else{
    header("Location: ./index_user.php"); 
}


//Lógica de presentación
//Presenta el html a partir de los datos en el CSV
include_once('./templates/edit_user.tpl.php');
?>