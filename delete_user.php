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
    // echo "Conected";
}catch (PDOException $e){
    echo "No se ha podido conectar a la base de datos";
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (isset($_POST['delete'])) {

    $stmn = $db -> prepare('DELETE FROM usuarios WHERE id=' . $id);
    $stmn -> execute();
    header("Location: index_user.php");
    exit();

}



include_once('./templates/delete_user.tpl.php');
?>