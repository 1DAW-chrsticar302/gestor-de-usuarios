<?php
session_start();
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

//Lógica de negocio

//Lee CSV


$usuarios = $db -> prepare('SELECT * FROM users');
$usuarios->execute();

//$usuarios = getDataFromCSV('./data/users.csv', 'id');
//Lógica de presentación
//Presenta el html a partir de los datos en el CSV

if(isset($_SESSION)) {
    if($_SESSION['rol'] == 'ADMIN' || $_SESSION['rol'] == 'EDITOR') {
        include_once('./templates/index_users.tpl.php');
    }else{
        include_once('./templates/index_users_guests.tpl.php');
    }
}else {
    echo 'ERROR DE SESIÓN. INICIE SESIÓN PARA ENTRAR';
}






?>