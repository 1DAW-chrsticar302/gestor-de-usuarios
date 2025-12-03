<?php

include_once('./libraries/functions.php');

//Inicialización
boot();
$servername = 'localhost';
$dbname = 'usuariosdb';
$usuario =  'usuario';
$passwd = 'passwd';

try{
    $db = new PDO('mysql:host='.$servername.';dbname='.$dbname,$usuario,$passwd);
}catch (PDOException $e){
    echo "No se ha podido conectar a la base de datos";
}

//Lógica de negocio
//Obtenemos id de la querystring
$id = filter_input(INPUT_GET,'id', FILTER_VALIDATE_INT);
if( $id !== false){
    //Lee CSV
    // $stmn = $db -> prepare('SELECT * FROM usuarios WHERE id ='.$id);
    // $stmn -> execute();

    // foreach ($stmn as $usuario) {
    //     print_r($usuario);
    // }

    $patata = $db-> prepare('SELECT * FROM users WHERE id = ' . $id);
    $patata -> execute();
    

    foreach($patata as $valor) {
        $usuario = $valor;
    }

    // $usuarios = getDataFromCSV('./data/users.csv', 'id');
    if ($usuario == 'usuario'){
        $usuario = null;
        echo '<a href="index_user.php">Volver al índice</a>';
    }


}


//Lógica de presentación
//Presenta el html a partir de los datos en el CSV
include_once('./templates/show_user.tpl.php');

?>