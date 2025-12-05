<?php

    $servername = 'localhost';
    $dbname = 'pruebasdb';
    $usuario = 'usuario';
    $password = 'passwd';

    try{

        $db = new PDO('mysql:host='.$servername.';dbname='.$dbname,$usuario,$password);
        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch (PDOExeption $e){
        die('No se ha podido encontrar la base de datos: ' . $e->getMessage());
    }

    $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

    $stmt = $db -> prepare("DELETE FROM usuarios WHERE id=:id");
    $stmt -> bindValue(':id',$id,PDO::PARAM_INT);
    $stmt -> execute();

    header('Location: ./index.php');

?>