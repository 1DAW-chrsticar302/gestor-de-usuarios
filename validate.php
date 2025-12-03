<?php
    session_start();

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


    $validacion = $db -> prepare('SELECT * FROM users WHERE email = "'.$_SESSION['user']['email'].'" AND password = "'.$_SESSION['user']['password'].'"');
    $validacion -> execute();

    foreach($validacion as $valor) {
        echo var_dump($valor);
        if($valor != null) {
            $id = $valor['id'];
            $rol = $valor['rol'];
        }
    }

    unset
?>