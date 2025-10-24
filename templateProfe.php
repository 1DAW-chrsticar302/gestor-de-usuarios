<?php

include_once('./lib/funciones.php');

bootstrap();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
//Si se trata de una petición post, valida datos, crea el usuario y muestra el formulario de creación del usuario
    //TODO: Validar y sanear
    $user = [];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];
    $nombre = date("Y-m-d H:i:s");


}else {
//Si se trata de una peticion get, muestro el formulario de creación de usuario



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>