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

    $stmt = $db->prepare("INSERT INTO usuarios(nombre,rol) VALUES ('UsuarioNuevo','CREADO')");
    $stmt -> execute();

    header('Location: ./index.php');

?>